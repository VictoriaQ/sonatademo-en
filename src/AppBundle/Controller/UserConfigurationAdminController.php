<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class UserConfigurationAdminController extends Controller
{
    public function myEditAction(Request $request = null)
    {
        $this->admin->checkAccess('edit');        
   
        $id = 1;
        $object = $this->admin->getObject($id);
   
        $this->admin->setSubject($object);
   
        $form = $this->admin->getForm();
        $form->setData($object);
        $form->handleRequest($request);        
   
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($config);            
            $em->flush();
        }
   
        return $this->render($this->admin->getTemplate('myEdit'), array(
            'action'     => 'myEdit',
            'form'       => $form->createView(),
            'object' => $object,
        ), null, $request);
    }  
}
