<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Domain\DomainInput;
use Somnambulist\Components\Domain\DomainInputFactory;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DomainInputFactoryTest
 *
 * @package    Somnambulist\Components\Domain\Tests
 * @subpackage Somnambulist\Components\Domain\Tests\DomainInputFactoryTest
 */
class DomainInputFactoryTest extends TestCase
{

    protected ?DomainInputFactory $factory = null;

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
