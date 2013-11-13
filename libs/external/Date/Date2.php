<?php
/* 	Date class modified version from source: http://lwest.free.fr/doc/php/lib/date-en.html
	provides an object oriented way to manipulate date and time
	
@BUGS
	As Date class uses Unix timetamp underlyingly, Date is only functionning on period :
	01 Jan 1970 00:00:00 +0000 to 19 Jan 2038 03:14:07 +0000
*/
 
define('FMT_DATEFR', '%d/%m/%Y');
define('FMT_DATEUS', '%m/%d/%Y');
define('FMT_DATEISO', '%Y%m%dT%H%M%S');
define('FMT_DATELDAP', '%Y%m%d%H%M%SZ');
define('FMT_DATEMYSQL', '%Y-%m-%d %H:%M:%S');
define('FMT_DATERFC822', '%a, %d %b %Y %H:%M:%S');
define('FMT_TIME', '%H:%M');
define('WDAY_SUNDAY',    0);
define('WDAY_MONDAY',    1);
define('WDAY_TUESDAY',   2);
define('WDAY_WENESDAY',  3);
define('WDAY_THURSDAY',  4);
define('WDAY_FRIDAY',    5);
define('WDAY_SATURDAY',  6);
define('SEC_MINUTE',    60);
define('SEC_HOUR',    3600);
define('SEC_DAY',    86400);

class Date02 {
	/* unix timestamp */
	protected $timestamp;	//timestamp
	protected $year;		//Year
	protected $month;		//Month
	protected $day;		//Day
	protected $hours;		//hours
	protected $minutes;	//minutes
	protected $seconds; 	//seconds
	protected $change = 0; // 1 if date needs recalculation
		
	public function Date($timestamp = "") {
		if ($timestamp) {
			$this->setTimestamp($timestamp);
		} 
		else {
			$this->setTimestamp(time());
		}
	}

	/****
	 *	Build a date from an ISO datetime string
	 * @params $datetime string the iso-X datetime with both date and time components
	 * @static @factory
	 * @return a Date object if ok, NULL otherwise
	 *
	 * tolerant: accepts format variants with or without separators: "-" for date and ":" for time
	 *	20010801123059 => OK
	 *	20010801T123059Z => OK
	 *	2001-08-01T12:30:59 => OK
	 *	20010801T12:30:59Z => OK
	 * 2001-08-01 => error
	 * 2001-08-01T01:30 => error
	 * 2001-08-01T1:30:59 => error
	 *	timezone code is yet ignored (not handled)
	 */
	static function fromDatetime($datetime) {
		if (!preg_match("/^(\d{4})-?(\d{2})-?(\d{2})T?(\d{2}):?(\d{2}):?(\d{2})(.?)$/", $datetime, $a)) {
			return NULL;
		}
		
		$obj = new Date();
		$obj->setDate($a[1], $a[2], $a[3]);
		$obj->setTime($a[4], $a[5], $a[6]);
		
		return $obj;
	}	

	public function toString($argFormat){
		return strftime($argFormat, $this->getTimestamp());
	}
	
	static function format($argFormat, $timestamp){
		return strftime($argFormat, $timestamp);
	}

	public function getYear() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->year; 
	}
	
	public function getMonth() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->month; 
	}
	
	public function getDay() { 
		if ($this->change) {
			$this->_calc();
		}
			
		return $this->day; 
	}

	public function getWeekday() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->weekday; 
	}

	public function getYearDay() {
		if ($this->change) {
			$this->_calc();
		}
		
		return date("z", $this->timestamp);
	}

	public function getHours() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->hours; 
	}

	public function getMinutes() { 
		if ($this->change) {
			$this->_calc();
		}
			
		return $this->minutes; 
	}

	public function getSeconds() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->seconds; 
	}

	public function getSecondsInDay() { 
		if ($this->change) {
			$this->_calc();
		}
		
		$timestamp1 = mktime(0, 0, 0, $this->month, $this->day, $this->year);
		
		return $this->timestamp - $timestamp1; 
	}

	// return Unix timestamp (seconds since epoch)
	public function getTimestamp() { 
		if ($this->change) {
			$this->_calc();
		}
		
		return $this->timestamp; 
	}
	
	public function daysInMonth() {
		if ($this->change) {
			$this->_calc();
		}
		
		return date("t", $this->timestamp);
	}
	
	public function daysInYear() {
		if ($this->change) {
			$this->_calc();
		}
		
		return date("t", $this->timestamp);
	}
	
	public function DaysTo($date) {
		if (! is_object($date) || get_class($date) != "Date") {
			return false;
		}
			
		$deltaTS = $date->getTimestamp() - $this->getTimestamp();
		
		if ($deltats > 0) {
			return (int) floor($deltaTS / SEC_DAY);
		}
		else {
			return (int) ceil($deltaTS / SEC_DAY);
		}
	}
	
	public function compareTo($date) {
		if (! is_object($date) || get_class($date) != "Date") {
			return false;
		}
		
		return $this->getTimestamp() - $date->getTimestamp();
	}
	
	public function addDays($numdays) {
		$this->day += $numdays;
		$this->_calc();
	}

	public function addMonths($num) {
		$this->month += $num;
		$this->_calc();
	}
	
	public function addYears($num) {
		$this->year += $num;
		$this->_calc();
	}
	
	public function addHours($num) {
		$this->hours += $num;
		$this->_calc();
	}

	public function addMinutes($num) {
		$this->minutes += $num;
		$this->_calc();
	}
	
	public function addSeconds($num){
		$this->seconds += $num;
		$this->_calc();
	}
			
/**************************************************** SETTERS ****/
	
	public function setTimestamp($timestamp) {
		// TODO : basic validation
		$this->timestamp = $timestamp;
		$a = getdate($this->timestamp);
		$this->year = $a['year'];
		$this->month = $a['mon'];
		$this->day = $a['mday'];
		$this->hours = $a['hours'];
		$this->minutes = $a['minutes'];
		$this->seconds = $a['seconds'];
		$this->weekday = $a['wday'];
		$this->change = 0;
		unset($a);
	}

	public function setDate($year, $month, $day = 1) {
		$this->year = $year;
		$this->month = $month;
		$this->day = $day;
		$this->change = 1;
	}

	public function setTime($hours, $minutes, $seconds = 0) {
		$this->hours = $hours;
		$this->minutes = $minutes;
		$this->seconds = $seconds;
		$this->change = 1;
	}
	
	public function setHours($val) {
		$this->hours = $val;
		$this->change = 1;
	}
	
	public function setMinutes($val) {
		$this->minutes = $val;
		$this->change = 1;
	}
	
	public function setSeconds($val) {
		$this->seconds = $val;
		$this->change = 1;
	}
	
	public function setYear($val) {
		$this->year = $val;
		$this->change = 1;
	}

	public function setMonth($val) {
		$this->month = $val;
		$this->change = 1;
	}
	
	public function setDay($val) {
		$this->day = $val;
		$this->change = 1;
	}

	// setWeekday([0-6]) 
	public function setWeekday($weekday) {
		$this->day += ($weekday - $this->weekday);
		$this->change = 1;
	}

	public function isValid() {
		if (! checkdate($this->month, $this->day, $this->year)) {
			return false;
		}
		
		if ($this->year < 1970 || $this->year > 2038) {
			return false;
		}
		
		if ($this->hours < 0 || $this->hours > 23 || $this->minutes < 0 
			|| $this->minutes > 59 || $this->seconds < 0 || $this->seconds > 59) {
			return false;
		}
		
		return true;
	}

	protected function _calc() {
		$this->timestamp = mktime($this->hours, $this->minutes, 
								  $this->seconds, $this->month, 
								  $this->day, $this->year);
		$a = getdate($this->timestamp);
		$this->year = $a['year'];
		$this->month = $a['mon'];
		$this->day = $a['mday'];
		$this->hours = $a['hours'];
		$this->minutes = $a['minutes'];
		$this->seconds = $a['seconds'];
		$this->weekday = $a['wday'];
		$this->change = 0;
	}
}
?>
