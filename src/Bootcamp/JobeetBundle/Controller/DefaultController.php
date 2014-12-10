<?php

namespace Bootcamp\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($pages=1)
    {
     
        $jobs = $this->getDoctrine()
    		->getRepository('BootcampJobeetBundle:Job')
    		->findAll();
    	
    	   // return $this->redirect($this->generateUrl('bootcamp_panel_list'));
    	$paginator  = $this->get('knp_paginator');
        $pages = $paginator->paginate(
            $jobs,
            $pages,
            5
            );
    	

        return $this->render('BootcampJobeetBundle:Default:index.html.twig', array(
            'pages'  => $pages));
    	
    }
        
}

