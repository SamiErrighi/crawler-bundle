<?php

namespace Crawler\CrawlerBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('crawler');
        $rootNode
            ->children()
                ->arrayNode('crawler_twitter')
                    ->children()
                        ->scalarNode('consumer_key')
                            ->isRequired()
                        ->end()
                        ->scalarNode('consumer_secret')->isRequired()->end()
                        ->scalarNode('access_token')->isRequired()->end()
                        ->scalarNode('access_token_secret')->isRequired()->end()
                    ->end()
                ->end()
                ->arrayNode('crawler_insta')
                    ->children()
                        ->scalarNode('consumer_key')->isRequired()->end()
                        ->scalarNode('consumer_secret')->isRequired()->end()
                        ->scalarNode('access_token')->isRequired()->end()
                        ->scalarNode('access_token_secret')->isRequired()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
