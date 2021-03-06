<?php

namespace Bootcamp\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bootcamp\JobeetBundle\Form\JobType;
use Bootcamp\JobeetBundle\Entity\Job;

class JobController extends Controller
{
    public function listAction($page)
    {
        $user = $this->getUser();
        $jobs = $this->getDoctrine()->getRepository('BootcampJobeetBundle:Job')
            ->findBy(array(
               'user'   => $user
            ));
        
        $paginator  = $this->get('knp_paginator');
        $pages = $paginator->paginate(
            $jobs,
            $page,
            5
                );
                
        return $this->render('BootcampPanelBundle:Job:list.html.twig', array(
            'pages'  => $pages
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
    
    public function deleteAction($id)
    {
        $job = $this->getDoctrine()
    		->getRepository('BootcampJobeetBundle:Job')
    		->find($id);
    	
    	if (!$job) {
    		$this->get('session')->getFlashBag()
    		->add('notice', 'Brak ofert');
    	    return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    	    
    	}
    	
    	$em = $this->getDoctrine()->getManager();
    	$em->remove($job);
    	$em->flush();
    	
    	$this->get('session')->getFlashBag()
    		->add('notice', 'Oferta została usunięta');
    		
        return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    }
    public function editAction($id)
    {
    	$request = $this->getRequest();
    	
    	$job = $this->getDoctrine()
    	->getRepository('BootcampJobeetBundle:Job')
    	->find($id);
    	 
    	if (!$job) {
    		$this->get('session')->getFlashBag()
    		->add('notice', 'Brak ofert');
    		return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    			
    	}
    	$form =$this->createForm(new JobType(), $job );
    	$form->handleRequest($request);
    	
    	if($form->isValid()) {
    		$job = $form->getData();
    		$em = $this->getDoctrine()->getManager();
    		$em->flush();
    		$this->get('session')->getFlashBag()->add('notice', "Oferta zostala zmieniona");
    		
    		return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    	}
    	
    	
        return $this->render('BootcampPanelBundle:Job:edit.html.twig', array(
               'form' => $form->createView()
            ));
        }
    public function detailsAction($slug)
   {
        $request = $this->getRequest();
    	
    	$job = $this->getDoctrine()
    	->getRepository('BootcampJobeetBundle:Job')
    	->findOneBy([
                'slug' => $slug
            ]);;
    	
    	  
        if (!$job) {
            throw $this->createNotFoundException('Oferta nie istnieje');
        }
    		return $this->redirect($this->generateUrl('bootcamp_panel_details', array(
                    'slug' => $job->getSlug())
                ));
    			
    
    
    {
    	$form =$this->createForm(new JobType(), $job);
    	$form->handleRequest($request);
    } 

    return $this->render('BootcampPanelBundle:Job:details.html.twig', array(
            'job' =>$job, 
            'form' => $form->createView()
            ));
 
    }
}
