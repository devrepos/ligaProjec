<?php
/**
 * Created by PhpStorm.
 * User: maria.perez
 * Date: 28/1/18
 * Time: 12:10
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BackendBundle\Entity\Position;



class LoadPositionData extends AbstractFixture  implements OrderedFixtureInterface
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
        $dbh->executeQuery('TRUNCATE TABLE positions');
        $dbh->executeQuery('SET FOREIGN_KEY_CHECKS = 1');

        $data = array('PORTERO', 'DEFENSA', 'CENTROCAMPISTA', 'DELANTERO');

        foreach ($data as $d){
            $position = new Position();
            $position->setName($d);
            $manager->persist($position);
            $manager->flush();
        }

    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

}