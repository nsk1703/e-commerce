<?php


namespace Ecommerce\EcommerceBundle\Services;

class GetReference
{
    private $entityManager;
    private $securityToken;

    public function __construct($securityToken, $entityManager)
    {
        $this->securityToken = $securityToken;
        $this->entityManager = $entityManager;
    }

    public function reference()
    {
        $reference = $this->entityManager->getRepository('EcommerceEcommerceBundle:Commande')->findOneBy(array('validate' => 1),
            array('id' => 'DESC'), 1,1);

        if(!$reference)
            return 1;
        else
            return $reference->getReference() + 1;
    }
}