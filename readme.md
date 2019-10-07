# Contact manager - weekend project
It is a Laravel SPA built for playing with vue-router and vuex.
## Installing 
Clone the repository.
In project folder:

    composer install
    php artisan key:generate
    php artisan jwt:secret
    npm run dev
In database folder make a file `database.sqlite`. Or if you want mysql edit `.env` according.

    php artisan migrate
Create your user in the database. (I didn't do the register function)

    php artisan tinker
    \App\User::create(['name'=>'John Doe','email'=>'john@example.com','password'=>bcrypt('password')]);
You can also make some dummy contacts from tinker

    factory(\App\Contact::class, 30)->create();
## More informations
[Visit blog post about this project](https://www.acoz.ro/contacts-manager-laravel-spa/)
