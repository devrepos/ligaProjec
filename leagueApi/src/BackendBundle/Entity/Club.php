<?php

namespace BackendBundle\Entity;

/**
 * Club
 */
class Club
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
     * @var string
     */
    private $nacionality;

    /**
     * @var string
     */
    private $coach;

    /**
     * @var string
     */
    private $coachImg;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var \DateTime
     */
    private $createdAt;


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
     * @return Club
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
     * Set nacionality
     *
     * @param string $nacionality
     *
     * @return Club
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
     * Set coach
     *
     * @param string $coach
     *
     * @return Club
     */
    public function setCoach($coach)
    {
        $this->coach = $coach;

        return $this;
    }

    /**
     * Get coach
     *
     * @return string
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * Set coachImg
     *
     * @param string $coachImg
     *
     * @return Club
     */
    public function setCoachImg($coachImg)
    {
        $this->coachImg = $coachImg;

        return $this;
    }

    /**
     * Get coachImg
     *
     * @return string
     */
    public function getCoachImg()
    {
        return $this->coachImg;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Club
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Club
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
}

