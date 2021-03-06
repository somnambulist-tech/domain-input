<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Contracts;

use Somnambulist\Components\Collection\Contracts\Immutable;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class DomainInput
 *
 * Input transfer object abstracting request method (http, cli etc) from
 * the input / files. This container is read-only and should not be modified
 * once created.
 *
 * @package    Somnambulist\Components\Domain
 * @subpackage Somnambulist\Components\Domain\DomainInput
 */
interface DomainInput
{

    /**
     * The input collection / array of input data
     *
     * @return Immutable
     */
    public function inputs(): Immutable;

    /**
     * The uploaded files collection / array
     *
     * @return Immutable
     */
    public function files(): Immutable;

    /**
     * Alias for input
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed;

    /**
     * Fetch an input parameter
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function input(string $key, mixed $default = null): mixed;

    /**
     * Get an uploaded file by parameter name
     *
     * @param string $key
     *
     * @return UploadedFile|null
     */
    public function file(string $key): ?UploadedFile;
}
