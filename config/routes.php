<?php

return [
    
    'default' => [
        'controller' => 'DefaultController',
        'action' => 'indexAction',
        'pattern' => '/'
    ],
    
    'book_list' => [
        'controller' => 'BookController',
        'action' => 'indexAction',
        'pattern' => '/books'
    ],
    
    'book_page' => [
        'controller' => 'BookController',
        'action' => 'showAction',
        'pattern' => '/books/{id}',
        'parameters' => [
            'id' => '[0-9]+'
        ]
    ],
    
    'feedback' => [
        'controller' => 'FeedbackController',
        'action' => 'contactAction',
        'pattern' => '/feedback'
    ]
    
];