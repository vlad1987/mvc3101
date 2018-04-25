<?php

namespace Controller;

use Framework\Request;
use Framework\Controller;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('index.phtml');
    }
}