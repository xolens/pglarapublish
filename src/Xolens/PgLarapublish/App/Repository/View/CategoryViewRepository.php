<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Category;
use Xolens\PgLarapublish\App\Model\View\CategoryView;
use Xolens\PgLarapublish\App\Repository\View\CategoryViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class CategoryViewRepository extends AbstractReadableRepository implements CategoryViewRepositoryContract
{
    public function model(){
        return CategoryView::class;
    }
}
