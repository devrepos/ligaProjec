<?php
/**
 * Created by PhpStorm.
 * User: maria.perez
 * Date: 28/1/18
 * Time: 14:16
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackendBundle\Entity\Player;


class LoadPlayerData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //$dbh = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();

        $dbh = $manager->getConnection();
        $dbh->executeQuery('SET FOREIGN_KEY_CHECKS = 0');
        $dbh->executeQuery('TRUNCATE TABLE players');
        $dbh->executeQuery('SET FOREIGN_KEY_CHECKS = 1');
        $position = $manager->getRepository('BackendBundle:Position')->find(2);


        for ($i=1;$i<6;$i++){

            for ($j=1;$j<=3;$j++){

                $club = $manager->getRepository('BackendBundle:Club')->find($i);
                $player = new Player();
                $player->setName("Jugador ".$j);
                $player->setClub($club );
                $player->setPosition($position);
                $manager->persist($player);
                $manager->flush();

            }

        }

    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }

}