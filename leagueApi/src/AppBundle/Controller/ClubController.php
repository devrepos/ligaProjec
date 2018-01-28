<?php
/**
 * Created by PhpStorm.
 * User: maria.perez
 * Date: 26/1/18
 * Time: 18:15
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClubController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT c FROM BackendBundle:Club c ");
        $clubs = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return new JsonResponse(array('code'=>200,'clubs'=>$clubs));
    }

    public function clubAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT c FROM BackendBundle:Club c WHERE c.id = ".$id);
        $clubs = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $club = current($clubs);
        return new JsonResponse(array('code'=>200,'club'=>$club));
    }



}