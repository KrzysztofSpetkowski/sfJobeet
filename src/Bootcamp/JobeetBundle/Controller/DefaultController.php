<?php

namespace Bootcamp\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller 

{
    public function indexAction($page=1)
    {
    // wyszukiwanie 5 najnowszych rekordów
        
    $jobrepository=$this->getDoctrine()->getRepository('BootcampJobeetBundle:Job');
        $query = $jobrepository->createQueryBuilder('p')
            ->setMaxResults(5)
            ->orderBy('p.createdAt', 'desc')
            ->getQuery();
        $jobs = $query->getResult();

        return $this->render('BootcampJobeetBundle:Default:index.html.twig', array(
            'jobs' => $jobs,
            'page' => $page
       
        ));
    }
    public function dealsAction($page=1)
        {
        $jobs = $this->getDoctrine()
    		->getRepository('BootcampJobeetBundle:Job')
    		->findAll();

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

