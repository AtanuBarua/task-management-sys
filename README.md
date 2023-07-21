noTask Management System. Users can create task and assign to another user. Assignee user will get notification email.

1. composer install
2. npm install
3. cp .env.example .env
4. php artisan key:generate
5. setup db and mailtrap in env
6. QUEUE_CONNECTION=database in .env
7. php artisan migrate
8. php artisan queue:work
