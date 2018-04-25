<?php

namespace Controller;

use Framework\Controller;

class BookController extends Controller
{
    public function indexAction()
    {
        // get DB connection (model)
        // get books from model
        
        $books = [1, 2, 3];
        $authors = 'ddf dfgdfg';
        
        return $this->render('index.phtml', [
            'books' => $books,
            'authors' => $authors
        ]);
    }
}