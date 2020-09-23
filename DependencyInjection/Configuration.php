<?php

namespace Shaygan\TelegramBotApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('shaygan_telegram_bot_api');
        $rootNode = $treeBuilder->getRootNode();


        $rootNode
                ->children()
                    ->scalarNode("token")->isRequired()->end()
                    ->scalarNode("bot_name")->end()
                    ->booleanNode("legacy")->defaultValue(true)->end()
                    ->arrayNode("webhook")
                    ->children()
                        ->scalarNode("domain")->end()
                        ->scalarNode("path_prefix")->end()
                        ->scalarNode("update_receiver")->defaultValue("shaygan.my_update_receiver")->end()
                    ->end()
                    ->end()
                ->end();


        return $treeBuilder;
    }

}
