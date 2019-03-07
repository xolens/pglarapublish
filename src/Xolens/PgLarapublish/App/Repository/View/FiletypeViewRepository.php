<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Filetype;
use Xolens\PgLarapublish\App\Model\View\FiletypeView;
use Xolens\PgLarapublish\App\Repository\View\FiletypeViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class FiletypeViewRepository extends AbstractReadableRepository implements FiletypeViewRepositoryContract
{
    public function model(){
        return FiletypeView::class;
    }
}
