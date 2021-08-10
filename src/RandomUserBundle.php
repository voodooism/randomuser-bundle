<?php
declare(strict_types=1);

namespace Voodooism\RandomUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Voodooism\RandomUserBundle\DependencyInjection\RandomUserExtension;

class RandomUserBundle extends Bundle
{
    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new RandomUserExtension();
        }

        return $this->extension;
    }
}