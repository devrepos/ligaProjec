<?php
/**
 * Created by PhpStorm.
 * User: maria.perez
 * Date: 26/1/18
 * Time: 18:28
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\Player;

class PlayerController extends Controller
{
    public function indexAction(Request $request,$clubId)
    {
        $em = $this->getDoctrine()->getManager();
        $player = new Player();
        $players = $player->getPlayersByClub($em,$clubId);
        $query = $em->createQuery("SELECT c FROM BackendBundle:Club c WHERE c.id = ".$clubId);
        $clubs = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $club = current($clubs);
        return new JsonResponse(array('code'=>200,'players'=>$players,'club'=>$club));
    }

    public  function  newAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $clubId = $request->get('club_id');
        $name = $request->get('name');
        $positionId = $request->get('position_id');
        $number = $request->get('number');
        $dateBirth = $request->get('date_birth');
        $height = $request->get('height');
        $weight = $request->get('weight');

        try{
            $position = $em->getRepository('BackendBundle:Position')->find($positionId);
            $club = $em->getRepository('BackendBundle:Club')->find($clubId);

            $player = new Player();
            $player->setClub($club);
            $player->setName($name);
            $player->setPosition($position);
            $player->setNumber($number);
            $player->setDateBirth($dateBirth);
            $player->setHeight($height);
            $player->setWeight($weight);

            $file = $request->files->get('image', null);
            if ($file != null && !empty($file)) {
                $ext = $file->guessExtension();
                $file_name = time() . "." . $ext;
                $path_of_file = "uploads/club_".$club->getId()."/";
                if(!file_exists($path_of_file)){
                    mkdir($path_of_file, 0777, true);
                }
                $file->move($path_of_file, $file_name);

                $player->setImage($file_name);
            }
            $em->persist($player);
            $em->flush();

            $newPlayer = $player->getPlayerById($em,$player->getId());
            return new JsonResponse(array('code'=>200,'player'=>$newPlayer));
        }catch (\Exception $e){
            return new JsonResponse(array('code'=>500,'message'=>'Error guardando Jugador'));
        }






    }

}