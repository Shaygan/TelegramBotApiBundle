<?php

namespace Shaygan\TelegramBotApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('shaygan_telegram_bot_api');


        $rootNode
                ->children()
                    ->scalarNode("token")->isRequired()->end()
                    ->scalarNode("bot_name")->end()
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
