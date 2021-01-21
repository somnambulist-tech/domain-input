<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\FrozenCollection as Immutable;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Domain\DomainInput;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class DomainInputTest
 *
 * @package    Somnambulist\Components\Domain\Tests
 * @subpackage Somnambulist\Components\Domain\Tests\DomainInputTest
 */
class DomainInputTest extends TestCase
{

    public function testGetInput()
    {
        $input = new DomainInput(new Collection(['foo' => ['bar' => 'baz']]));

        $this->assertEquals('baz', $input->get('foo.bar'));
        $this->assertEquals('baz', $input->input('foo.bar'));
    }

    public function testGetInputReturnsDefault()
    {
        $input = new DomainInput(new Collection(['foo' => ['bar' => 'baz']]));

        $this->assertEquals('baz', $input->get('bar', 'baz'));
        $this->assertEquals('baz', $input->input('bar', 'baz'));
    }

    public function testGetInputReturnsWrappedCollection()
    {
        $input = new DomainInput(new Collection(['foo' => new Collection(['bar' => 'baz'])]));

        $this->assertInstanceOf(DomainInput::class, $input->get('foo'));
    }

    public function testHasInput()
    {
        $input = new DomainInput(new Collection(['foo' => ['bar' => 'baz']]));

        $this->assertTrue($input->has('foo'));
        $this->assertFalse($input->has('example'));
    }

    public function testGetFile()
    {
        $input = new DomainInput(new Collection(), new Collection([
            'file' => new UploadedFile(__FILE__, __FILE__, 'plain/text'),
        ]));

        $this->assertInstanceOf(UploadedFile::class, $input->file('file'));
    }

    public function testGetFileReturnsNullIfDoesNotExist()
    {
        $input = new DomainInput(new Collection([
            'file' => new UploadedFile(__FILE__, __FILE__, 'plain/text'),
        ]));

        $this->assertNull($input->file('bar'));
    }

    public function testPassedCollectionsAreConvertedToImmutable()
    {
        $input = new DomainInput(new Collection(), new Collection());

        $this->assertInstanceOf(Immutable::class, $input->inputs());
        $this->assertInstanceOf(Immutable::class, $input->files());
    }
}
