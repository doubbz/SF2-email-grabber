<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller needed for FOSRest in order to generate REST routes
 *
 * @author doubbz
 */
class EmailGrabbedRestController extends Controller
{
    /**
     * Store grabbed email on DB
     * 
     * @param Request $request
     */
    public function postEmailGrabbedAction(Request $request)
    {
        $this->get('email.grabbed.handler')->storeGrabbedEmail($request);
    }
    
    
}
