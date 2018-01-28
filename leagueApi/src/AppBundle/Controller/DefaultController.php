<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function positionsAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p FROM BackendBundle:Position p");
        $positions = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return new JsonResponse(array('code'=>200,'positions'=>$positions));

    }
}
