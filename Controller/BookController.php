<?php

namespace Controller;

use Framework\Request;
use Framework\Controller;

class BookController extends Controller
{
    public function indexAction(Request $request)
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
    
    public function showAction(Request $request)
    {
        // var_dump($_GET);
        return $request->get('id');
    }
}