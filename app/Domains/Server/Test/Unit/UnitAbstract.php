<?php declare(strict_types=1);

namespace App\Domains\Server\Test\Unit;

use App\Domains\Server\Model\Server as Model;
use App\Domains\SharedApp\Test\Unit\UnitAbstract as UnitAbstractShared;

abstract class UnitAbstract extends UnitAbstractShared
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
}
