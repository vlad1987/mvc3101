<?php

return [
    
    'default' => [
        'controller' => 'DefaultController',
        'action' => 'indexAction',
        'path' => '/'
    ],
    
    'book_list' => [
        'controller' => 'BookController',
        'action' => 'indexAction',
        'path' => '/books'
    ],
    
    'feedback' => [
        'controller' => 'FeedbackController',
        'action' => 'contactAction',
        'path' => '/feedback'
    ]
    
];