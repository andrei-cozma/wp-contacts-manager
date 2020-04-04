# Contact manager - weekend project
Laravel SPA built for playing with vue-router and vuex.
## Installing 
Clone the repository.
In project folder:

    composer install
    php artisan key:generate
    php artisan jwt:secret
    npm run dev
    touch database/database.sqlite
    php artisan migrate
Add your user in the database.

    php artisan tinker
    \App\User::create(['name'=>'John Doe','email'=>'john@example.com','password'=>bcrypt('password')]);
You can also make some dummy contacts from tinker

    factory(\App\Contact::class, 30)->create();
Enjoy.

## Contributing
If you want to contribute to this project you can contact me at [andrei@acoz.ro](mailto:andrei@acoz.ro)
