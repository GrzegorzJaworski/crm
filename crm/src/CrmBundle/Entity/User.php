<?php

namespace CrmBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Animals", mappedBy="owner")
     */
    private $animals;

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="owner")
     */
    private $orders;
    
    /**
     * @ORM\OneToMany(targetEntity="Visits", mappedBy="employee")
     */
    private $visits;

    public function __construct() {
        parent::__construct();
        $this->animals = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->visits = new ArrayCollection();
    }


    /**
     * Add animals
     *
     * @param \CrmBundle\Entity\Animals $animals
     * @return User
     */
    public function addAnimal(\CrmBundle\Entity\Animals $animals)
    {
        $this->animals[] = $animals;

        return $this;
    }

    /**
     * Remove animals
     *
     * @param \CrmBundle\Entity\Animals $animals
     */
    public function removeAnimal(\CrmBundle\Entity\Animals $animals)
    {
        $this->animals->removeElement($animals);
    }

    /**
     * Get animals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Add orders
     *
     * @param \CrmBundle\Entity\Orders $orders
     * @return User
     */
    public function addOrder(\CrmBundle\Entity\Orders $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \CrmBundle\Entity\Orders $orders
     */
    public function removeOrder(\CrmBundle\Entity\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add visits
     *
     * @param \CrmBundle\Entity\Visits $visits
     * @return User
     */
    public function addVisit(\CrmBundle\Entity\Visits $visits)
    {
        $this->visits[] = $visits;

        return $this;
    }

    /**
     * Remove visits
     *
     * @param \CrmBundle\Entity\Visits $visits
     */
    public function removeVisit(\CrmBundle\Entity\Visits $visits)
    {
        $this->visits->removeElement($visits);
    }

    /**
     * Get visits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisits()
    {
        return $this->visits;
    }
}
