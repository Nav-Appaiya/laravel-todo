
## Todo App with Laravel 8

Demo: https://phplaravel-664318-2249917.cloudwaysapps.com/  
username: demo@todo-app.local  
password: demodemo

### Features
- 2 Models with one-to-many relationship: User & Todo
- 1 form field to create a new todo item (/todo/create)
- 1 'Mailable' Email class on Todo deletion
- Adding deletion emails to the Job Queues (configured with database to see the jobs)

### Features that didn't make it into this:
- Retaining the deleted model (wanted to use softdeletes)
- Deletion through relationship (Deleting user would delete their todos)
- Unit tests

## Used lib/tools to build this
- Used Laravel Resources for easy CRUD actions on Todo items
- Laravel Breeze authentication (User model & Auth pages)
- used SMTP with mailhog locally, demo has no smtp-transport configured
- Job Queue with database configuration, so you can keep track of scheduled jobs
- no Redis or Beanstalkd so run the Job queue with php artisan queue:work (demo app uses cron each hour to process)

## Installation

1. Run ``git clone git@github.com:Nav-Appaiya/laravel-todo.git``
2. Install composer dependencies: ``composer install``
3. create your database, and configure your .env settings with database, email and type of queue configuration
4. Run the migration: ``php artisan migrate``
5. Run additional seeding: ``php artisan db:seed``
6. Serve your app and visit your local app-url: ``php artisan serve``
## Routes
| URL  | Function |  
| ------------- | ------------- |  
| /login  | Login as user  |  
| /register  | Register as user  |  
| /todo  | Overview of your todos and other users |  
| /todo/create  | Create a todo  |  
| /todo/{todo_id}  | View a todo  |  


## commands

php artisan make:migration create_todo_table --create=todo  
php artisan make:controller TodoController --resource --model=Todo