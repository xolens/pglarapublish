<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Photo;
use Xolens\PgLarapublish\App\Model\View\PhotoView;
use Xolens\PublishContract\App\Contract\Repository\View\PhotoViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\LarautilContract\App\Util\Model\Sorter;

class PhotoViewRepository extends AbstractReadableRepository implements PhotoViewRepositoryContract
{
    public function model(){
        return PhotoView::class;
    }
}
