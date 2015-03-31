<?php

namespace Bootcamp\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  
   public function indexAction(Job $job)
{
    $em    = $this->get('doctrine.orm.entity_manager');
    $dql   = "SELECT createdAT FROM BootcampJobeetBundle:Job createdAT";
    $query = $em->createQuery($dql);

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $job->query->get('page', 1)/*page number*/,
        10/*limit per page*/
    );

    // parameters to template
    return $this->render('BootcampJobeetBundle:Default:index.html.twig', array('pagination' => $pagination));
}
    public function dealsAction($page=1)
        {
        $jobs = $this->getDoctrine()
    		->getRepository('BootcampJobeetBundle:Job')
    		->findAll();
    	
    	   // return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    	$paginator  = $this->get('knp_paginator');
        $pages = $paginator->paginate(
            $jobs,
            $page,
            5
            );
    	

        return $this->render('BootcampJobeetBundle:Default:deals.html.twig', array(
            'pages'  => $pages));
    }
        
}

