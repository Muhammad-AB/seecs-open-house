# seecs-open-house

SEECS Open House Management is a web application designed to streamline the management of the open house event. The application incorporates user authentication with different roles, including students, evaluators, and administrators. It uses Laravel to handle routes, middleware, and database interactions.

### About:
The application supports user account creation with different roles (students, evaluators, administrators), allowing for distinct capabilities based on user roles. The platform also facilitates project assignment and evaluation processes, enabling admin to assign evaluators, and evaluators to assess projects. The routes and functionalities related to project submission and evaluation are well-defined. Efficiency of the FYP evaluation process is enhanced through features that automate workflows and streamline communication between evaluators, project groups and admin. This includes the ability to manage projects effectively. The application incorporates mechanisms to ensure fairness and anonymity in the assessment process by making sure students cannot see how many marks each evaluator has given and who the evaluators are, but can just view how many evaluators have marked their project and the accumulative marks they have received. Different dashboards are provided based on user roles, ensuring that each stakeholder (students, evaluators, administrators) has access to relevant information and functionalities upon logging in. Middleware groups, such as 'web' for common web features, are appropriately applied to routes. The 'auth' middleware ensures that only authenticated users can access specified routes, contributing to the overall security of the system.

## How to Setup:
1.	Clone the repository from https://github.com/Muhammad-AB/seecs-open-house.git
2.	Open the code file in your code editor.
3.	Install the dependencies by running “composer install” command and "npm install" command in the project in the terminal.
4.	Setup the .env file, by duplicating the .env.example file and rename it to .env file
5.	Setup the database in your .env file, by going to the code representing your database connections, and updating the values according to your own database.
6.	Run the “php artisan key:generate” command to generate the encryption key for your project.
7.	Migrate and seed the database by running “php artisan migrate --seed” command.
8.	Run "php artisan serve" command to run the application.
9.	To sign in as Admin, use email "admin@example.com", and password "password".
10.	To sign in as Evaluator, use email "evaluator@example.com", and password "password".
11.	To sign in as Student, use email "student@example.com", and password "password".

### Functionalities:
1.	User Authentication
2.	Role-Based Dashboards
3.	Project Management
4.	Evaluation System
5.	Category and Location Management
6.	Student Project Interaction
7.	Logout Functionality
8.	Middleware for Security and Verification
9.	Password Reset Mechanism
10.	Profile Management
11.	Project Marking and Editing

### Models:
1.	Admin.php
2.	Category.php
3.	Evaluation.php
4.	Evaluator.php
5.	Location.php
6.	Product.php
7.	Student.php
8.	User.php

### Routes:
Global Middleware manages global and route-specific functionalities. Specific routes utilize specialized middleware to enforce authentication and email verification requirements. The ‘auth’ middleware ensures that users are authenticated before accessing certain routes, while the ‘verified’ middleware confirms the verification status of a user’s email, functioning in conjunction with ‘auth’.  The root route (‘/’) directs users to the login view, and serves as the entry point to the application. The ‘/logout’ route, when accessed, triggers the ‘Auth::logout()’ method to log out the user and redirects them to the root path. The ‘/dashboard’ route integrates both ‘auth’ and ‘verified’ middlewares. It dynamically checks the user’s role and redirects them to distinct dashboards accordingly. The ‘/project/{id}’ route provides a detailed view of a project for evaluation purposes. The ‘/edit-project/{id?}’ route allows users to access a form for editing project details. The ‘/admin-edit-project/{id}’ route serves administrators by presenting detailed project information.
