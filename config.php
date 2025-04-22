<?php

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'PHP 30',
    'description' => 'PHP turns 30!',
    'getText' => function ($page) {
        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        return trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );
    },
    'collections' => [
        'acronyms' => [],
        'stories' => [],
        'friends' => [
            'sort' => 'order',
        ],
    ],
];
