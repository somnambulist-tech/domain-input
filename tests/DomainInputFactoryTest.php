<?php

namespace Somnambulist\Tests\Domain;

use PHPUnit\Framework\TestCase;
use Somnambulist\Domain\DomainInput;
use Somnambulist\Domain\DomainInputFactory;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DomainInputFactoryTest
 *
 * @package    Somnambulist\Tests\Domain
 * @subpackage Somnambulist\Tests\Domain\DomainInputFactoryTest
 */
class DomainInputFactoryTest extends TestCase
{

    /**
     * @var DomainInputFactory
     */
    protected $factory;

    protected function setUp(): void
    {
        $this->factory = new DomainInputFactory();
    }

    protected function tearDown(): void
    {
        $this->factory = null;
    }

    public function testCreate()
    {
        $input = $this->factory->create();

        $this->assertInstanceOf(DomainInput::class, $input);
    }

    public function testCreateFromHttpRequest()
    {
        $input = $this->factory->createFromHttpRequest(Request::createFromGlobals());

        $this->assertInstanceOf(DomainInput::class, $input);
    }
}
