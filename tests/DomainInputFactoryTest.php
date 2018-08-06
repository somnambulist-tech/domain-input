<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

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

    protected function setUp()
    {
        $this->factory = new DomainInputFactory();
    }

    protected function tearDown()
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