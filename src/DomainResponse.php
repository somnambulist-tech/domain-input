<?php declare(strict_types=1);

namespace Somnambulist\Domain;

use Somnambulist\Collection\Contracts\Immutable;
use Somnambulist\Collection\MutableCollection as Collection;
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

    private DomainInputContract $input;
    private Immutable $data;
    private Immutable $messages;

    /**
     * @var mixed
     */
    private $status;

    public function __construct(DomainInputContract $input, Collection $data, Collection $messages, $status)
    {
        $this->input    = $input;
        $this->data     = $data->freeze();
        $this->messages = $messages->freeze();
        $this->status   = $status;
    }

    public function __set($name, $value)
    {

    }

    public function __unset($name)
    {

    }

    public function data(): Immutable
    {
        return $this->data;
    }

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

    public function status()
    {
        return $this->status;
    }
}
