<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserBundle\Form\RegistrationType;

use UserBundle\Entity\User;

/**
 * This is the main controller for actions concerning the users
 * Next to do would be to put most of this logic on 1 user service
 */

class UserController extends Controller
{
    /**
     * Action rendering registration form
     * 
     * @Route("/signup")
     * @Template("UserBundle:Registration:registration.html.twig")
     */
    public function registrationAction()
    {
        $user = new User();
        $form = $this->createForm(new RegistrationType(),$user, array(
            'action' => $this->generateUrl('signup_account')
        ));
        return array('form'=>$form->createView());
    }
    
    /**
     * Action handling new account creation after submitting form
     * 
     * @param Request $request
     * 
     * @Template("UserBundle:Registration:registration.html.twig")
     */
    public function signupAccountAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        
        $form = $this->createForm(new RegistrationType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();
            $user->setEnabled(true);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('signup_succes');
        }
        return array('form' => $form->createView());
    }
    
    /**
     * Action for template success after registration
     * 
     * @param Request $request
     * 
     * @Route("/signup/success")
     * @Template("UserBundle:Registration:registrationSuccess.html.twig")
     */
    public function signupSuccessAction()
    {
        return;
    }
}
