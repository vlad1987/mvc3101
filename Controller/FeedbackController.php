<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\Form\FeedbackForm;

class FeedbackController extends Controller
{
    public function contactAction(Request $request)
    {
        $form = new FeedbackForm(
            $request->post('email'),
            $request->post('name'),
            $request->post('message')
        );
        
        if ($request->isPost()) {
            if ($form->isValid()) {
                $sth = $this->pdo->prepare('insert into feedback values (:x,:y,:z)');
                $sth->execute(
                // $form->email $form->name etc
                );
                // save to db
                
                // flash message
                // redirect:
                $this->router->redirect('/');
            }
        }
        
        return $this->render('contact.phtml', ['form' => $form]);
    }
}