<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain;

use Somnambulist\Components\Collection\Contracts\Immutable;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Domain\Contracts\DomainInput as DomainInputContract;
use Somnambulist\Components\Domain\Contracts\DomainResponse as DomainResponseContract;

/**
 * Class DomainResponse
 *
 * @package    Somnambulist\Components\Domain
 * @subpackage Somnambulist\Components\Domain\DomainResponse
 */
class DomainResponse implements DomainResponseContract
{

    private DomainInputContract $input;
    private Immutable $data;
    private Immutable $messages;
    private mixed $status;

    public function __construct(DomainInputContract $input, Collection $data, Collection $messages, $status)
    {
        $this->input    = $input;
        $this->data     = $data->freeze();
        $this->messages = $messages->freeze();
        $this->status   = $status;
    }

    public function __set($name, $value): void
    {
    }

    public function __unset($name): void
    {
    }

    public function data(): Immutable
    {
        return $this->data;
    }

    public function get(string $key): mixed
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

    public function status(): mixed
    {
        return $this->status;
    }
}
