<?php
/**
 * Created by PhpStorm.
 * User: maria.perez
 * Date: 28/1/18
 * Time: 13:10
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackendBundle\Entity\Club;

class LoadClubData extends AbstractFixture implements OrderedFixtureInterface
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
        $dbh->executeQuery('TRUNCATE TABLE clubs');
        $dbh->executeQuery('SET FOREIGN_KEY_CHECKS = 1');



        $data = array('Real Madrid','FC Barcelona','Atletico de Madrid',
                      'Sevilla FC','Valencia FC','Villareal FC','RC Celta','SD Eibar',
                      'Getafe FC','Real Betis','Atletic Club');

        foreach ($data as $d){
            $club = new Club();
            $club->setName($d);
            $image = str_replace(' ','-' ,strtolower($d));
            $image = $image.'.png';
            $club->setLogo($image);
            $manager->persist($club);
            $manager->flush();
        }

    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}