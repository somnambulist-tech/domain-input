<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain\Contracts;

use Somnambulist\Components\Domain\Contracts\DomainInput as DomainInputContract;

/**
 * Interface DomainInputMapper
 *
 * @package    Somnambulist\Components\Domain\Contracts
 * @subpackage Somnambulist\Components\Domain\Contracts\DomainInputMapper
 */
interface DomainInputMapper
{

    /**
     * Maps the domain input into the Entity
     *
     * @param DomainInputContract $input
     * @param object              $entity
     *
     * @return void
     */
    public function map(DomainInputContract $input, object $entity): void;

    /**
     * Returns true if the mapper supports this entity
     *
     * @param object $entity
     *
     * @return boolean
     */
    public function supports(object $entity): bool;
}
