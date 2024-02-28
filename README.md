### Summary of this Project ###

<<<<< This is laravel " Blog " project >>>>>

There are two sections in this project.The user section and admin section.

First User Section;
In User section,there are two types of user such as register user and non register user.Non register user can read blog but they can't create their blog , comment and others .Register user can do blog , comment ,connect with admin , hide and report There are two types of user and so on.

Second Admin Section;
In Admin section,admin has got admin dashboard  to manage users.Admin Dashboard contains "Category","Users","Comments","Approve","Reports","Advertisements","Announcement","Message","Email" and "Setting" tabs . So admin can control user,post,comment and everything about website .

--------------------------------------------------

### Follow this instruction to run this project ###

- put your own (.env) file to this project

In .env file,change this part for mail system.

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

- put your own mail part. If you don't know how to do that watch this video => https://youtu.be/WI5dHACiOjQ?list=PLm8sgxwSZofdIdWQxDhg3HUplNJIZRjqb

- start watch 30:40 to 33:00 and do like that tutorial .


### Run these commends step by step

- composer install

- composer dump-autoload

- npm install

- npm run build

- php artisan migrate

- php artisan serve

### Accounts 

*** This is  "User" account for this project.You can also create your own  user account by Sign Up .

email : bob@gmail.com
password : 12345678

email : cathazine@gmail.com
password : 12345678

*** This is  "Admin" account for this project

email : alice@gmail.com
password : 12345678

email : admin@gmail.com
password : 12345678



##### Errors #####
if you got any error while running my project.Please run these commends.

- php artisan migrate:fresh --seed
- php artisan serve
