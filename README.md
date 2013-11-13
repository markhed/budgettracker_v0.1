budgettracker
=============

PHP project (with Smarty, MySQL and Javascript/JQuery)

Developed by Mark Jason Harun (markharun@gmail.com) for the purpose of self-training. You may use the source code for the same purpose.

Objectives:
- To be able to develop a dynamic budget tracker website using PHP and Javascript/JQuery.
- To be able to develop a project from scratch; from requirements gathering to design to implementation of the database-related functionality, application logic, and user interface, acquiring further knowledge of the aforementioned technologies and, hopefully, other more in the process

Current project status:
- Basic application functionality and GUI is implemented

To be done:
- More application logic (e.g. automatic budget cycle creation, basic validation, etc.)
- Advanced GUI (more client-side programming using JQuery as much as possible, with extensive use of CSS)
- Code-refactoring
- Separation of layers - persistence, domain, application, presentation (apply a design pattern)

============
To begin:

1. Download the following:
   - XAMPP (version used is 1.8.1 - though I dont think using any other version would cause any issue)
   - Smarty-3.1.13 (update: this is included in the repository already)
   - Any IDE for PHP (I used Dreamweaver, but you may use anything you prefer - search online for options)
   - GUI application for MySQL (I used SQLyog version 812)
   
2. Setup
   - Install XAMPP and then start MySQL and Apache services
   - Create a database named "budget_tracker"
   - Create the tables needed (see BudgetTracker\database\scripts.txt)
   
3. Test and Code and, hopefully, contribute!
