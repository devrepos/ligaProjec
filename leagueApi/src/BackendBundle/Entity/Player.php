<?php

namespace BackendBundle\Entity;

/**
 * Player
 */
class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $nacionality;

    /**
     * @var \DateTime
     */
    private $dateBirth;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \BackendBundle\Entity\Club
     */
    private $club;

    /**
     * @var \BackendBundle\Entity\Position
     */
    private $position;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Player
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Player
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set nacionality
     *
     * @param string $nacionality
     *
     * @return Player
     */
    public function setNacionality($nacionality)
    {
        $this->nacionality = $nacionality;

        return $this;
    }

    /**
     * Get nacionality
     *
     * @return string
     */
    public function getNacionality()
    {
        return $this->nacionality;
    }

    /**
     * Set dateBirth
     *
     * @param \DateTime $dateBirth
     *
     * @return Player
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    /**
     * Get dateBirth
     *
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Player
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Player
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Player
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Player
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set club
     *
     * @param \BackendBundle\Entity\Clubs $club
     *
     * @return Player
     */
    public function setClub(\BackendBundle\Entity\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \BackendBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set position
     *
     * @param \BackendBundle\Entity\Position $position
     *
     * @return Player
     */
    public function setPosition(\BackendBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \BackendBundle\Entity\Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get PlayersByClub
     *
     * @param integer $clubId
     *
     * @return array
     */
    public  function  getPlayersByClub(\Doctrine\ORM\EntityManager $em,$clubId){

        $query = $em->createQuery("SELECT p,c,t FROM BackendBundle:Player p 
                                   JOIN p.club c
                                   LEFT JOIN p.position t
                                   WHERE c.id = ".$clubId);
        $players = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return $players;

    }

    /**
     * Get PlayerArray
     *
     * @param integer id
     *
     * @return array
     */
    public  function  getPlayerById(\Doctrine\ORM\EntityManager $em,$id){

        $query = $em->createQuery("SELECT p,c,t FROM BackendBundle:Player p 
                                   JOIN p.club c
                                   LEFT JOIN p.position t
                                   WHERE p.id = ".$id);
        $player = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        $player = current($player);
        return $player;

    }
}

