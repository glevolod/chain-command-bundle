<?php

namespace Glevolod\ChainCommandBundle;

use Glevolod\ChainCommandBundle\DependencyInjection\ChainCommandPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChainCommandBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ChainCommandPass());
    }
}