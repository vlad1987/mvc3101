<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\Form;

class FeedbackController extends Controller
{
    public function contactAction(Request $request)
    {
        // $request
        
        // $form = new FeedbackForm(1,2,3);
        // get form object
        // process form
        // redirect or render page
        
        return $this->render('contact.phtml');
    }
}