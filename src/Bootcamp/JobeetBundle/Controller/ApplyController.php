<?php

namespace Bootcamp\JobeetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bootcamp\JobeetBundle\Form\ApplyType;
use Bootcamp\JobeetBundle\Entity\Apply;
use Symfony\Component\HttpFoundation\Request;
use Bootcamp\JobeetBundle\Entity\Job;


/**
 * apply controller.
 *
 */
class ApplyController extends Controller
{
    
    public function applyAction(Request $request)
    {
        $user = $this->getUser();
        $apply = new Apply($request);
        $apply->setCreatedBy($user);
        
        $form = $this->createForm(new ApplyType(), $apply);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            
            // zapisuje pliki
            $em = $this->getDoctrine()->getManager();
            $em->persist($apply);
            $em->flush();
            
            $this->get('session')->getFlashbag()
                    ->add('notice', "Twoja aplikacja została przesłana do pracodawcy");
            
            return $this->redirect($this->generateUrl('bootcamp_jobeet_homepage'));
        }
        
        
        return $this->render('BootcampJobeetBundle:Apply:apply.html.twig', array(
            'form'  => $form->createView(),
            
        ));
    }
}
