<?php
namespace Crawler\CrawlerBundle\Tests\DependencyInjection;

use Crawler\CrawlerBundle\DependencyInjection\CrawlerExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class AbstractCrawlerExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new CrawlerExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    abstract protected function loadConfiguration(ContainerBuilder $container, $resource);

    public function testWithoutConfiguration()
    {
        // An extension is only loaded in the container if a configuration is provided for it.
        // Then, we need to explicitely load it.
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        $this->assertFalse($this->container->has('crawler'));
    }

    public function testTwitterdConfiguration()
    {
        $this->loadConfiguration($this->container, 'crawler');
        $this->container->compile();

        $this->assertFalse($this->container->has('crawler.test'));
    }

}