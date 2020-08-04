<?php

namespace Users\UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Users extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userAddress = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\Commande", mappedBy="users", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\UsersAddress", mappedBy="users", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $userAddress;

    /**
     * Add commande.
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Commande $commande
     *
     * @return Users
     */
    public function addCommande(\Ecommerce\EcommerceBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande.
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Commande $commande
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommande(\Ecommerce\EcommerceBundle\Entity\Commande $commande)
    {
        return $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add userAddress.
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UsersAddress $userAddress
     *
     * @return Users
     */
    public function addUserAddress(\Ecommerce\EcommerceBundle\Entity\UsersAddress $userAddress)
    {
        $this->userAddress[] = $userAddress;

        return $this;
    }

    /**
     * Remove userAddress.
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UsersAddress $userAddress
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUserAddress(\Ecommerce\EcommerceBundle\Entity\UsersAddress $userAddress)
    {
        return $this->userAddress->removeElement($userAddress);
    }

    /**
     * Get userAddress.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }
}
