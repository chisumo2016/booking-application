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
         php artisan make:migration create_users_table
         php artisan make:migration create_business_table
         php artisan make:migration create_services_table
         php artisan make:migration create_bookings_table
         php artisan make:migration create_reviews_table

    Models 
        php artisan make:model Business
        php artisan make:model Service
        php artisan make:model Booking
        php artisan make:model Review

# BUSINESS AND USER CONTROLLERS
    Put in folder called Admin
         php  artisan make:controller Admin/BusinessController -r
         php  artisan make:controller Admin/UserController -r   
    Route for business and users
        Route::apiResource('user', UserController::class);
        Route::apiResource('business', BusinessController::class);

    TEST VIA POSTAMAN
        By create  a new user 0K
       POST:  http://127.0.0.1:8000/api/user
       DELETE:  http://127.0.0.1:8000/api/user/1
        BODY
        

# SERVICE AND BOOKING
    php  artisan make:controller Business/ServiceController -r
    php artisan make:controller BookingController  -r
    logged in services as 



















