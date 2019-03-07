<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Photo;
use Xolens\PgLarapublish\App\Model\View\PhotoView;
use Xolens\PgLarapublish\App\Repository\View\PhotoViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class PhotoViewRepository extends AbstractReadableRepository implements PhotoViewRepositoryContract
{
    public function model(){
        return PhotoView::class;
    }
}
