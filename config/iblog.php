<?php
return [

    'google-tag_env' => env('GOOGLE_TAG_ID', null),

    'admins' => explode(',' , env('ADMINS')),

    'admin-prefix_env' => env('URL_ADMIN_PREFIX', 'root'),

    'blog-prefix_env' => env('URL_BLOG_PREFIX', 'articles'),
];
