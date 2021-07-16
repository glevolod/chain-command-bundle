<?php

namespace Glevolod\ChainCommandBundle;

use Glevolod\ChainCommandBundle\Custom\ChainedCommandInterface;
use Glevolod\ChainCommandBundle\DependencyInjection\ChainCommandPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChainCommandBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ChainCommandPass());
        $container->registerForAutoconfiguration(ChainedCommandInterface::class)->addTag('glevolod.chained_command');
    }
}