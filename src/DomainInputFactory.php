<?php declare(strict_types=1);

namespace Somnambulist\Components\Domain;

use Somnambulist\Components\Collection\MutableCollection as Collection;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DomainInputFactory
 *
 * Creates domain input transfer objects from various contexts / sources.
 *
 * @package    Somnambulist\Components\Domain
 * @subpackage Somnambulist\Components\Domain\DomainInputFactory
 */
class DomainInputFactory
{

    public function create(Collection $inputs = null, Collection $files = null): DomainInput
    {
        return new DomainInput($inputs, $files);
    }

    public function createFromHttpRequest(Request $request): DomainInput
    {
        $inputs = new Collection($request->request->all() + $request->query->all());
        $files  = new Collection($request->files->all());

        return new DomainInput($inputs, $files);
    }
}
