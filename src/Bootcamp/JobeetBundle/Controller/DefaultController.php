<?php

namespace Bootcamp\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller 

{
   public function indexAction($page=1)
{
//    $em    = $this->get('doctrine.orm.entity_manager');
//    $sql   = "SELECT created_at FROM Job ";
//    $query = $em->createQuery($sql);
//
//    $paginator  = $this->get('knp_paginator');
//    $pagination = $paginator->paginate(
//        $query,
//        $job,
//        5/*limit per page*/
//    );
        $sql = "SELECT * FROM Job WHERE created_at";
    // parameters to template
    return $this->render('BootcampJobeetBundle:Default:index.html.twig', array('page' => $page));
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

