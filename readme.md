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

- Search Area
- Dropdown component
- Dashboard View
- Google Analytic API for dashboard
- Admin Middleware dosent work
- slug uniqueable
- Prefix for admin and blog is config file and each one have a helper for call
- add addTag method in post model

[]-Write more test case

[]- Refactor Post addTag method

[]- visual config file and setting

- admin email address is an array in config file

- change admin middleware and remove is_admin in user table

- modify isAdmin method

[]-routes clean up

- Remove some colomn on post table

[]-Category & Tag C.R.U.D

[]-Delete old image after post updating

[]-User Profile section

[]-Change Login page to login modal

[]-Pages Model & CRUD

[]-Comment ?!

[]-Installation command like: php artisan iblog:install

[]-Responsive layout

[]-Cache

[]-Social login(if comment section will be internal)

[]-RTL version ?! Translation ?! Maybe!!

[]-And of course the blog theme

[]-tooltips for icon button







## Google analytic for dashboard

i will write later becuase i dident finished yet. 