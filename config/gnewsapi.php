<?php

return [
    'api_key' => env('GNEWS_API_KEY'),

    'endpoint' => 'https://gnews.io/api/v4',

    'languages' => [
        'ar', 'de', 'el', 'en', 'es', 'fr', 'he', 'hi', 'it', 'ja', 'ml', 'mr', 'nl', 'no',
        'pt', 'ro', 'ru', 'sv', 'ta', 'te', 'uk', 'zh'
    ],

    'countries' => [
        'au', 'br', 'ca', 'ch', 'cn', 'de', 'eg', 'es', 'fr', 'gb', 'gr', 'hk', 'ie', 'il', 'in', 'it', 'jp', 'nl',
        'no', 'pe', 'ph', 'pk', 'pt', 'ro', 'ru', 'se', 'sg', 'tw', 'ua', 'us'
    ],

    'topics' => [
        'breaking-news', 'world', 'nation', 'business', 'technology', 'entertainment', 'sports', 'science', 'health'
    ],

    'sort' => [
        'relevance', 'publishedAt'
    ]
];
