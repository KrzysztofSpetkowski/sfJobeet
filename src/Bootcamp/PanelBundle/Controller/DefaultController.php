<?php

namespace Bootcamp\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BootcampPanelBundle:Default:index.html.twig', array());
    }
    public function regulationsAction()
    {
        return $this->render('BootcampPanelBundle:Default:regulations.html.twig', array());
    }
}
