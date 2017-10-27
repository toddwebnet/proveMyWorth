Overview
Create a basic website that a user logs in to and can view/save their profile.

Project Requirements
1.    Setup new git repository 
    a.  track your code changes as you go (There is no need for complicated branches, pull requests, merges, etc. You can just commit everything to a master branch if you want)
2.    Setup Laravel 5.5 on PHP 7
    a.    setup queues: we'd like to see the database driver working with an actual queue worker, but if you can't get that going correctly, just use the sync driver
    b.    setup email to send: we use mailtrap.io for our development, but you can use whatever you want (just make sure you aren't sending out email for real). If you can't getting anything working, just use the "log" driver for mail
    c.    feel free to use any packages you need, even if it directly solves one of the requirements below without you having to do anything
    d.    setup local mysql database: 
        i.    use database migrations
        ii.    seed an admin user
3.    Create some unit/integration/feature tests throughout the project (don't go overboard, just show a few basic examples of each that work with your code)
4.    Setup/Enable User workflows
a.    Registration
b.    Login
c.    Logout
d.    reset password
e.    BONUS: try to set up email confirmation code process when registering
5.    Create User Profile as a related model with the following data:
a.    birthdate (field on profile)
b.    phone number (field on profile)
c.    full address (as a polymorphic relationship)
i.    street
ii.    city
iii.    state
iv.    zip
v.    latitude
vi.    longitude
6.    Create homepage that doesn’t require login
a.    default laravel or plain bootstrap template is fine. We do no care what it looks like.
b.    make sure to use blade templates
7.    Create user profile page that requires login for the user to view and edit their profile
a.    again, we don't care what this looks like, just plain bootstrap is fine
b.    make sure errors are displayed if returned by server side
c.    BONUS: create a close account/delete account button that will delete the user data and all related tables data (no soft deletes)
8.    When saving the user profile:
a.    validate the data before saving to the database
b.    make sure the logged-in user is only modifying their profile, and not someone else's profile
c.    save to the database
d.    create a queued job for geocoding the address
9.    Create a class for geocoding an address
a.    if you can't find a free geocoding service you like, check out https://geocod.io
b.    bind the geocoding class in the IoC container (even if there are no constructor dependencies)
10.    Create queue worker to handle the geocoding queued jobs
a.    take the street address and geocode it
b.    save the lat, lng to the user profile
c.    fire an event when geocoding is complete
11.    Create an event listener for the "geocoded" event
a.    use a "Laravel Notification" to email the user that his address has been successfully geocoded
12.    Build deployment script to test you application from scratch:
a.    Ex.
git clone //git/new-repo
cd new-repo
cp .env.example .env
composer install
php artisan migrate
php artisan db:seed


13.    BONUS: Create a page that lists all users. Use a middleware to restrict access to this page to only admins (hint: you might need a new field on the user to store an admin flag).

14.    If you complete everything else BONUS: Setup "Laravel Passport" to get the default user api route working
