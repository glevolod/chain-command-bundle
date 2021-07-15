<?php

namespace Glevolod\ChainCommandBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ChainCommandPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('glevolod_chain_command.command_chain')) {
            return;
        }
        $definition = $container->findDefinition('glevolod_chain_command.command_chain');
        $taggedServices = $container->findTaggedServiceIds('glevolod.chained_command');
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addCommand', [new Reference($id)]);
        }
    }
}