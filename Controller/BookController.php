<?php

namespace Controller;

use Framework\Controller;

class BookController extends Controller
{
    public function indexAction()
    {
        $books = [1, 2, 3];
        $authors = 'ddf dfgdfg';
        
        return $this->render('index.phtml', [
            'books' => $books,
            'authors' => $authors
        ]);
    }
}