<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Payment\CoreBundle\Entity\PaymentInstruction;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @ORM\OneToOne(targetEntity="JMS\Payment\CoreBundle\Entity\PaymentInstruction")
//     */
//    private $paymentInstruction;

    /**
     * @var bool
     *
     * @ORM\Column(name="validate", type="boolean")
     */
    private $validate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;

    /**
     * @var array
     *
     * @ORM\Column(name="commande", type="array")
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $users;

//    /**
//    * @ORM\Column(type="decimal", precision=10, scale=5)
//    */
//    private  $amount;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

//    public function getPaymentInstruction()
//    {
//        return $this->paymentInstruction;
//    }
//
//    public function setPaymentInstruction(PaymentInstruction $instruction)
//    {
//        $this->paymentInstruction = $instruction;
//    }

    /**
     * Set validate.
     *
     * @param bool $validate
     *
     * @return Commande
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate.
     *
     * @return bool
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set reference.
     *
     * @param int $reference
     *
     * @return Commande
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return int
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set commande.
     *
     * @param array $commande
     *
     * @return Commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande.
     *
     * @return array
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set users.
     *
     * @param \Users\UsersBundle\Entity\Users|null $users
     *
     * @return Commande
     */
    public function setUsers(\Users\UsersBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users.
     *
     * @return \Users\UsersBundle\Entity\Users|null
     */
    public function getUsers()
    {
        return $this->users;
    }

//    public function getAmount()
//    {
//        return $this->amount;
//    }
}
