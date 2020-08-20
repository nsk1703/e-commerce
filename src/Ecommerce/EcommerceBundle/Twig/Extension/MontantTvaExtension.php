<?php

namespace Ecommerce\EcommerceBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MontantTvaExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('montant_tva', [$this, 'calculMontantTva'])
        ];
    }

    public function calculMontantTva($priceHT, $tva)
    {
        return round( ($priceHT / $tva) - $priceHT, 2);
    }
}