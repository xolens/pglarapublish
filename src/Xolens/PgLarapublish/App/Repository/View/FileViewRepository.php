<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\File;
use Xolens\PgLarapublish\App\Model\View\FileView;
use Xolens\PublishContract\App\Contract\Repository\View\FileViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\LarautilContract\App\Util\Model\Sorter;

class FileViewRepository extends AbstractReadableRepository implements FileViewRepositoryContract
{
    public function model(){
        return FileView::class;
    }

    public function paginateByFiletype($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
      $parentFilterer = new Filterer();
      $parentFilterer->equals(File::FILETYPE_PROPERTY, $parentId);
      return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
   }

   public function paginateByFiletypeSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
      $parentFilterer = new Filterer();
      $parentFilterer->equals(File::FILETYPE_PROPERTY, $parentId);
      return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
   }

   public function paginateByFiletypeFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
      $parentFilterer = new Filterer();
      $parentFilterer->equals(File::FILETYPE_PROPERTY, $parentId);
      $parentFilterer->and($filterer);
      return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
   }

   public function paginateByFiletypeSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
      $parentFilterer = new Filterer();
      $parentFilterer->equals(File::FILETYPE_PROPERTY, $parentId);
      $parentFilterer->and($filterer);
      return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
   }
}
