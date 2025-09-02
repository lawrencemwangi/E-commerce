<?php

return [
    'site_name' => 'Lawnet Decor',
    'logo' => 'assets/images/logo.jpeg',
    'site_url' => env('APP_URL', 'https://lawnetdecor.com'),
    'email' => 'info@lawnetdecor.com',
    'contact' => '+254799509242',
    'address' => 'Nairobi, Kenya',

    'social_links' => [
        'facebook' => 'https://facebook.com/lawnetsolutions',
        'youtube' => 'https://www.youtube.com/@lawnetDecor/',
        'instagram' => 'https://www.instagram.com/lawrenzo.mwangi/',
        'whatapp' => 'http://wa.me/254799509242?text=Hello ' . config('site_settings.site_name'),
    ],

    'maintenance_mode' => false, 
];
