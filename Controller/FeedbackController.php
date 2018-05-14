<?php

namespace Controller;

use Framework\Controller;
use Framework\Request;
use Model\Form\FeedbackForm;
use Model\Entity\Feedback;

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

                $feedback = (new Feedback())
                    ->setEmail($form->email)
                    ->setName($form->name)
                    ->setMessage($form->message)
                ;

                $this->feedbackRepository->save($feedback);
                $this->session->setFlash('Feedback saved');
                $this->router->redirect('/feedback');
            }
        }
        
        return $this->render('contact.phtml', ['form' => $form]);
    }
}