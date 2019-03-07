<?php

namespace Xolens\PgLarapublish\App\Repository\View;

use Xolens\PgLarapublish\App\Model\Article;
use Xolens\PgLarapublish\App\Model\View\ArticleView;
use Xolens\PgLarapublish\App\Repository\View\ArticleViewRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractReadableRepository;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarautil\App\Util\Model\Sorter;

class ArticleViewRepository extends AbstractReadableRepository implements ArticleViewRepositoryContract
{
    public function model(){
        return ArticleView::class;
    }
     public function paginateByCategory($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::CATEGORY_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByCategorySorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::CATEGORY_PROPERTY, $parentId);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByCategoryFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::CATEGORY_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByCategorySortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::CATEGORY_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByPhoto($parentId, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::PHOTO_PROPERTY, $parentId);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByPhotoSorted($parentId, Sorter $sorter, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::PHOTO_PROPERTY, $parentId);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByPhotoFiltered($parentId, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::PHOTO_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateFiltered($parentFilterer, $perPage, $page,  $columns, $pageName);
     }

     public function paginateByPhotoSortedFiltered($parentId, Sorter $sorter, Filterer $filterer, $perPage=50, $page = null,  $columns = ['*'], $pageName = 'page'){
        $parentFilterer = new Filterer();
        $parentFilterer->equals(Article::PHOTO_PROPERTY, $parentId);
        $parentFilterer->and($filterer);
        return $this->paginateSortedFiltered($sorter, $parentFilterer, $perPage, $page,  $columns, $pageName);
     }

}
