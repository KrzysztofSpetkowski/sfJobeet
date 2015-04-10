<?php

namespace Bootcamp\JobeetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bootcamp\JobeetBundle\Entity\Job;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{

    /**
     * Lists all Job entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BootcampJobeetBundle:Job')->findAll();

        return $this->render('BootcampJobeetBundle:Job:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Job entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BootcampJobeetBundle:Job')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }

        return $this->render('BootcampJobeetBundle:Job:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
    public function searchAction()
    {
        $search= $_POST['position'];
        $searchrepository=$this->getDoctrine()->getRepository('BootcampJobeetBundle:Job');
        $query = $searchrepository->createQueryBuilder('p')
            ->where('p.position LIKE :position')
            ->setParameter('position', "%$search%")
            ->getQuery();
        $job = $query->getResult();
        return $this->render('BootcampJobeetBundle:Job:search.html.twig', array(
                'jobs' => $job,
        )); 
    }
}
