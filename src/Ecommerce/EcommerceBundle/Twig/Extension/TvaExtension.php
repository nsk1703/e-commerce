<?php

namespace Ecommerce\EcommerceBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TvaExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('tva', [$this, 'calculTva'])
        ];
    }

    public function calculTva($priceHT, $tva)
    {
        return round( $priceHT / $tva, 2);
    }
}