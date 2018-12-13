<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Category;
use Xolens\PgLarapublish\App\Model\View\CategoryView;
use Xolens\PublishContract\App\Contract\Repository\View\CategoryViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\LarautilContract\App\Util\Model\Sorter;

class CategoryViewRepository extends AbstractReadableRepository implements CategoryViewRepositoryContract
{
    public function model(){
        return CategoryView::class;
    }
}
