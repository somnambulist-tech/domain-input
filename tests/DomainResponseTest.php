<?php

namespace Somnambulist\Tests\Domain;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\FrozenCollection as Immutable;
use Somnambulist\Domain\DomainInput;
use Somnambulist\Domain\DomainResponse;

/**
 * Class DomainResponseTest
 *
 * @package    Somnambulist\Tests\Domain
 * @subpackage Somnambulist\Tests\Domain\DomainResponseTest
 * @author     Dave Redfern
 */
class DomainResponseTest extends TestCase
{

    public function testCreateResponse()
    {
        $response = new DomainResponse(new DomainInput(), new Collection(['foo' => 'bar']), new Collection(), 'ok');
        
        $this->assertInstanceOf(\Somnambulist\Domain\Contracts\DomainResponse::class, $response);
        $this->assertTrue($response->has('foo'));
        $this->assertEquals('ok', $response->status());
        $this->assertEquals('bar', $response->get('foo'));
        $this->assertInstanceOf(\Somnambulist\Domain\Contracts\DomainInput::class, $response->input());
        $this->assertInstanceOf(Immutable::class, $response->data());
        $this->assertInstanceOf(Immutable::class, $response->messages());
    }
}
