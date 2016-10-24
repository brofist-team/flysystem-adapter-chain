<?php

namespace BrofistTest\Flysystem\Adapter;

use Brofist\Flysystem\Adapter\Chain;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Config;
use PHPUnit_Framework_TestCase;

class ChainTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Chain
     */
    protected $chain;

    /**
     * @var AdapterInterface
     */
    protected $adapter1;

    /**
     * @var AdapterInterface
     */
    protected $adapter2;

    /**
     * @before
     */
    public function initialize()
    {
        $this->adapter1 = $this->prophesize(AdapterInterface::class);
        $this->adapter2 = $this->prophesize(AdapterInterface::class);
        $this->chain = new Chain([$this->adapter1->reveal()]);
        $this->chain->append($this->adapter2->reveal());
    }

    /**
     * @test
     */
    public function implementsAdapterInterface()
    {
        $this->assertInstanceOf(AdapterInterface::class, $this->chain);
    }

    /**
     * @test
     */
    public function delegatesWriteToAllAdapters()
    {
        $config = new Config();

        $this->adapter1->write('foo', 'bar', $config)->willReturn(['foo']);
        $this->adapter2->write('foo', 'bar', $config)->willReturn(['bar']);

        $return = $this->chain->write('foo', 'bar', $config);

        $this->assertTrue($return);
    }

    /**
     * @test
     */
    public function delegatesWriteToAllAdaptersAndReturnsFalseCaseOneOrMoreFails()
    {
        $config = new Config();

        $this->adapter1->write('foo', 'bar', $config)->willReturn(false);
        $this->adapter2->write('foo', 'bar', $config)->willReturn(['foo']);

        $return = $this->chain->write('foo', 'bar', $config);

        $this->assertFalse($return);
    }

    /**
     * @test
     */
    public function hasReturnFalseWhenEitherReturnFalse()
    {
        $this->adapter1->has('foo')->willReturn(false);
        $this->adapter2->has('foo')->willReturn(true);

        $this->assertFalse($this->chain->has('foo'));
    }

    /**
     * @test
     */
    public function hasReturnsTrueIfAllAreTrue()
    {
        $this->adapter1->has('foo')->willReturn(true);
        $this->adapter2->has('foo')->willReturn(true);

        $this->assertTrue($this->chain->has('foo'));
    }
}
