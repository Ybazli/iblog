<?php
return [

    'google-tag' => env('GOOGLE_TAG_ID', null),

    'admins' => explode(',' , env('ADMINS')),

    'admin-prefix' => env('URL_ADMIN_PREFIX', 'root'),

    'blog-prefix' => env('URL_BLOG_PREFIX', 'articles'),
];
