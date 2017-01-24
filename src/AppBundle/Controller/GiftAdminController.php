<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GiftAdminController extends Controller
{
    public function sendEmailAction()
    {
        $gift = $this->admin->getSubject(); 
    
            $email = $gift->getAddressee()->getEmail();
    
            // ...
            // Code to send email
            // ...
    
            $this->addFlash('sonata_flash_success', 'Email sent to '.$email);
    
            return new RedirectResponse($this->admin->generateUrl('list'));
    
        }
    }
