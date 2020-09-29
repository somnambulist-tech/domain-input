<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\FrozenCollection as Immutable;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Components\Domain\DomainInput;
use Somnambulist\Components\Domain\DomainResponse;

/**
 * Class DomainResponseTest
 *
 * @package    Somnambulist\Components\Domain\Tests
 * @subpackage Somnambulist\Components\Domain\Tests\DomainResponseTest
 */
class DomainResponseTest extends TestCase
{

    public function testCreateResponse()
    {
        $response = new DomainResponse(new DomainInput(), new Collection(['foo' => 'bar']), new Collection(), 'ok');
        
        $this->assertInstanceOf(\Somnambulist\Components\Domain\Contracts\DomainResponse::class, $response);
        $this->assertTrue($response->has('foo'));
        $this->assertEquals('ok', $response->status());
        $this->assertEquals('bar', $response->get('foo'));
        $this->assertInstanceOf(\Somnambulist\Components\Domain\Contracts\DomainInput::class, $response->input());
        $this->assertInstanceOf(Immutable::class, $response->data());
        $this->assertInstanceOf(Immutable::class, $response->messages());
    }
}
