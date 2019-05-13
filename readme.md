# #iBlog

iBlog is a minimal Blog application base on the Laravel & Vue js and Tailwind css.

**Note** : its not compelete yet  buti working on it to finish it ASAP.



Its easy to use like every laravel application just follow thease steps:

first clone it go to directory and run:

`composer install`

dont forget to make a .env file and put it database connection details. now generate app key with:

`php artisan key:generate`

after set your database details in your .env file now migrate tables if you want to put some dummy data in database use with —seed flag:

`php artisan migrate --seed`

now go to iblog.test/blog and surf in it. 

here some good point form iblog:

-Quill rich text editor with image uploader and image droper upload and also image resize.

-Good and minimalistic UI with Tailwind

-no treditional html table elements

-TDD test 

-and some more will came in feature



Coming soon:

[]-Remove some colomn on post table

[]-Search Area

[]-Dropdown component

[]-Category & Tag C.R.U.D

[]-Delete old image after post updating

[]-User Profile section

[]-Refactor Login page to login modal

[]-Pages Model

[]-Dashboard View

[]-Comment ?!

[]-Admin Middleware dosent work

[]-Installation command like: php artisan iblog:install

[]-Responsive layout

[]-Google Analytic API for dashboard

[]-Cache

[]-Social login(if comment section will be internal)

[]-Write more test case

[]-RTL version ?! Translation ?! Maybe!!

[]-And of course the blog theme