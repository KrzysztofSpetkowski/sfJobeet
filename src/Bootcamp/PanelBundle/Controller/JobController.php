<?php

namespace Bootcamp\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bootcamp\JobeetBundle\Form\JobType;
use Bootcamp\JobeetBundle\Entity\Job;

class JobController extends Controller
{
    public function listAction()
    {
        $user = $this->getUser();
        $jobs = $this->getDoctrine()->getRepository('BootcampJobeetBundle:Job')
            ->findBy(array(
               'user'   => $user
            ));
                
        return $this->render('BootcampPanelBundle:Job:list.html.twig', array(
            'jobs'  => $jobs
        ));    
        
    }
    public function newAction()
    {
        $request = $this->getRequest();
        $user = $this->getUser();
        
        $job = new Job();
        $job->setUser($user);
        
        $form = $this->createForm(new JobType(), $job);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            
            $job = $form->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Oferta została pomyślnie dodana');
            // $this->addFlash('notice', 'Oferta została pomyślnie dodana');
            
            return $this->redirect($this->generateUrl('bootcamp_panel_list'));
        }
        
        return $this->render('BootcampPanelBundle:Job:new.html.twig', array(
           'form'   => $form->createView()
        ));
    }

}
