<?php

declare(strict_types=1);

namespace Somnambulist\Domain;

use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\FrozenCollection as Immutable;
use Somnambulist\Domain\Contracts\DomainInput as DomainInputContract;
use Somnambulist\Domain\Contracts\DomainResponse as DomainResponseContract;

/**
 * Class DomainResponse
 *
 * @package    Somnambulist\Domain
 * @subpackage Somnambulist\Domain\DomainResponse
 */
class DomainResponse implements DomainResponseContract
{

    /**
     * @var Immutable
     */
    private $data;

    /**
     * @var DomainInputContract
     */
    private $input;

    /**
     * @var Immutable
     */
    private $messages;

    /**
     * @var mixed
     */
    private $status;

    /**
     * Constructor.
     *
     * @param DomainInputContract $input
     * @param Collection          $data
     * @param Collection          $messages
     * @param mixed               $status
     */
    public function __construct(DomainInputContract $input, Collection $data, Collection $messages, $status)
    {
        $this->input    = $input;
        $this->data     = $data->freeze();
        $this->messages = $messages->freeze();
        $this->status   = $status;
    }

    public function data(): Immutable
    {
        return $this->data;
    }

    /**
     * @param string $key
     *
     * @return null|mixed
     */
    public function get(string $key)
    {
        return $this->data->get($key);
    }

    public function has(string $key): bool
    {
        return $this->data->has($key);
    }

    public function input(): DomainInputContract
    {
        return $this->input;
    }

    public function messages(): Immutable
    {
        return $this->messages;
    }

    /**
     * @return mixed
     */
    public function status()
    {
        return $this->status;
    }
}
