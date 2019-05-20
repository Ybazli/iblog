# #iBlog

iBlog is a minimal Blog application base on the Laravel & Vue js and Tailwind css.

**Note** : its not compelete yet  buti working on it to finish it ASAP.



Its easy to use like every laravel application just follow thease steps:

first clone it go to directory and run:

```bash
composer instal
```



dont forget to make a .env file and put it database connection details. now generate app key with:

```bach
php artisan key:generate
```



after set your database details in your .env file now migrate tables if you want to put some dummy data in database use with —seed flag:

```ba
php artisan migrate --seed
```



now go to iblog.test/blog and surf in it. 

here some good point form iblog:

- Quill rich text editor with image uploader and image droper upload and also image resize.
- Open sourse project

- Good and minimalistic UI with Tailwind css

- No treditional html table elements

- TDD test 

- Some more will came in feature



### Tasks:(updatable)



- [x] Search Area
- [x] Dropdown component
- [x] Dashboard View
- [x] Google Analytic API for dashboard
- [x] Admin Middleware dosent work
- [x] slug uniqueable
- [x] Prefix for admin and blog is config file and each one have a helper for call
- [x] add addTag method in post model

- [x] Write more test case

- [] Refactor Post addTag method

- [] visual config file and setting

- [x] admin email address is an array in config file

- [x] change admin middleware and remove is_admin in user table

- [x] modify isAdmin method

- [] routes clean up

- [x] Remove some colomn on post table

- [x] Category & Tag C.R.U.D

- [x] Delete old image after post updating

- [] User Profile section

- [] Change Login page to login modal

- [] Pages Model & CRUD

- [] Comment ?!

- [x] Installation command like: php artisan iblog:install

- [] Responsive layout

- [] Cache

- [] Social login(if comment section will be internal)

- [] RTL version ?! Translation ?! Maybe!!

- [] And of course the blog theme

- [] tooltips for icon button

- [] Special menu for admin user

- [] delete confirmation

- [x] breadcrumb must have dedicated view and pass the data
- [] scss create component style on dedicated file and remove class







## Google analytic for dashboard

its not finished yet. 





## Install command(not ready yet)

```bash
php artisan iblog:install
```

- [] create env file

- [] get some data from user in command line for create admin user/prefixs details/app name 

- [] generate app key

- [] put the data in env file

- [] migrate database and seed some table

