# API RESOURCE - BOOKING
    Create the AuthController
    php artisan make:controller AuthController
    Create the routes

    TEST VIA POSTIMAN 
        .create a new user
            POST:  http://127.0.0.1:8000/api/register
            body ->.select form-data
                name:
                email:
                password:

                PASSED
    Login to get the access token
        POST:  http://127.0.0.1:8000/api/login
            body ->.select form-data
                email:
                password:
        {
            "token": "1|45dgRwAM5WCUi813PDgHEJEUvxhsx6MPF8m8SH3n55ac458b"
        }

    TEST OUR MIDDLEWARE COMES WITH LARAVEL TO BE ABLE TO LOGIN
        GET  :  http://127.0.0.1:8000/api/user
        Authorization:
            Type: Bearer Token: 2|dAoumKUrF0YGyKjlp6vUx9ZY3z6JkamJBHloqXiH49751d45

    PASSED

# MAKING THE DATABASE MIIGRATION
    Business table
     php artisan make:migration create_business_table























