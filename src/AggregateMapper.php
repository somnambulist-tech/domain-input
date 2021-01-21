<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain;

use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Domain\Contracts\DomainInput as DomainInputContract;
use Somnambulist\Components\Domain\Contracts\DomainInputMapper as DomainInputMapperContract;

/**
 * Class AggregateMapper
 *
 * Allows a collection of input mappers to be run in sequence on an Entity and
 * DomainInput. This allows the mappers to be kept small and very specific to the
 * data they are mapping e.g. this could be a collection of:
 *
 *  * collection mapping
 *  * image/file handling
 *  * encryption/decryption etc.
 *
 * @package    Somnambulist\Components\Domain
 * @subpackage Somnambulist\Components\Domain\AggregateMapper
 */
class AggregateMapper implements DomainInputMapperContract
{

    private Collection $mappers;

    public function __construct(array $mappers = [])
    {
        $this->mappers = new Collection();

        foreach ($mappers as $mapper) {
            $this->addMapper($mapper);
        }
    }

    public function map(DomainInputContract $input, object $entity): void
    {
        foreach ($this->mappers as $mapper) {
            if ($mapper->supports($entity)) {
                $mapper->map($input, $entity);
            }
        }
    }

    public function supports(object $entity): bool
    {
        return true;
    }

    public function getMappers(): Collection
    {
        return $this->mappers;
    }

    public function addMapper(DomainInputMapperContract $mapper): self
    {
        $this->mappers->add($mapper);

        return $this;
    }

    public function removeMapper(DomainInputMapperContract $mapper): self
    {
        $this->mappers->remove($mapper);

        return $this;
    }
}
