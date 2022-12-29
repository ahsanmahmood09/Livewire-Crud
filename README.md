## About This Crud Application

I have used Livewire to complete this crud. This crud application includes Roles for different Users and Based on those roles the user can Login. For Now, only administrator can log in to the application and see the details of all Other Users.

Please Follow Below Steps For Project Setup
- 
- Run composer install
- Run npm install
- change .env file accordingly.
- Run 'php artisan migrate:fresh --seed' command to run the migrations and seeders.

## Other Information

- Please copy of .env.example file to .env file and make changes accordingly
- You can log into the application using the admin@solidarity.co.za email address and "12345678" as password
- Only the above user has permission to log into the application and see the other users.
- Every created user will have a default password of "12345678" but they won't be able to login because only administrator can log into the application.