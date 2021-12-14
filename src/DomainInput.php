<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain;

use Somnambulist\Components\Collection\Contracts\Immutable;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Domain\Contracts\DomainInput as DomainInputContract;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class DomainInput
 *
 * Domain input transfer object abstracting request method (http, cli etc) from
 * the input / files. This container is read-only and should not be modified
 * once created.
 *
 * @package    Somnambulist\Components\Domain
 * @subpackage Somnambulist\Components\Domain\DomainInput
 */
class DomainInput implements DomainInputContract
{

    private Immutable $inputs;
    private Immutable $files;

    public function __construct(Collection $inputs = null, Collection $files = null)
    {
        if (!$inputs) $inputs = new Collection();
        if (!$files)  $files  = new Collection();

        $this->inputs = $inputs->freeze();
        $this->files  = $files->freeze();
    }

    public function __set($name, $value): void
    {

    }

    public function __unset($name): void
    {

    }

    public function inputs(): Immutable
    {
        return $this->inputs;
    }

    public function files(): Immutable
    {
        return $this->files;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->input($key, $default);
    }

    public function has(string $key): bool
    {
        return $this->inputs->has($key);
    }

    public function input(string $key, mixed $default = null): mixed
    {
        $return = $this->inputs->get($key, $default);

        if ($return instanceof Collection) {
            return new static($return);
        }

        return $return;
    }

    public function file(string $key): ?UploadedFile
    {
        return $this->files->get($key);
    }
}
