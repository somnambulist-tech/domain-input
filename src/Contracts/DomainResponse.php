<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Contracts;

use Somnambulist\Components\Collection\Contracts\Immutable;

/**
 * Interface DomainResponse
 *
 * The implementation should be read-only with the domain response not being modified directly.
 * Modifications should be made by presenters / filters in the responder layer.
 *
 * Both data and messages should be immutable collections.
 *
 * @package    Somnambulist\Components\Domain\Contracts
 * @subpackage Somnambulist\Components\Domain\Contracts\DomainResponse
 */
interface DomainResponse
{

    /**
     * Returns the full domain data in the response
     *
     * @return Immutable
     */
    public function data(): Immutable;

    /**
     * Gets a single piece of data from the response
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * Returns true if response has this data
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has(string $key): bool;

    /**
     * Returns the originating DomainInput object
     *
     * @return DomainInput
     */
    public function input(): DomainInput;

    /**
     * Returns the collection of messages generated by the domain
     *
     * @return Immutable
     */
    public function messages(): Immutable;

    /**
     * A status representation that the domain processed and set
     *
     * @return mixed
     */
    public function status(): mixed;

}
