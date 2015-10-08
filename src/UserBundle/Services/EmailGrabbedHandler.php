<?php


namespace UserBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use UserBundle\Entity\EmailGrabbed;
use UserBundle\Entity\User;

/**
 * Service used to handle grabbed emails from form
 *
 * @author doubbz
 */
class EmailGrabbedHandler {
    
    /**
     * Entity Manager
     * @var EntityManager
     */
    private $em;
    
    /**
     * The constructor of the service
     * 
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
   /**
    * Function used to store an email address giving the request
    * 
    * @param Request $request
    */ 
    public function storeGrabbedEmail(Request $request)
    {
        if ($request->getMethod() == 'POST' && !$this->isEmailAlreadyGrabbed($request->request->get('email'))) {
            $email = new EmailGrabbed();
            $email->setEmail($request->request->get('email'));
            
            $this->em->persist($email);
            $this->em->flush();
        }
    }
    
    /**
     * Function used to remove email from DB when needed
     */
    public function removeGrabbedEmailUser(User $user)
    {
        $grabbedEmail = $this->isEmailAlreadyGrabbed($user->getEmail());
        if ($grabbedEmail){
            $this->em->remove($grabbedEmail);
            $this->em->flush();
        }
        return;
    }

    /**
     * Used to check if grabbed email address is already on DB
     * 
     * @param string $email
     * @return EmailGrabbed
     */
    private function isEmailAlreadyGrabbed($email) {
        return $this->em->getRepository('UserBundle:EmailGrabbed')->findOneBy(array(
            'email'=>$email
        ));
    }
    
    /**
     * Function used to check validity of email format
     * 
     * EDIT: This function isn't used currently
     * 
     * @param string $email
     * @return type
     */
    private function isEmailValid($email)
    {
        //We could handle email format validation here
    }
}
