<?php

namespace Xolens\PgLarapublish\Test\Repository\View;

use Xolens\PgLarapublish\App\Repository\View\ArticleViewRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarapublish\Test\ReadOnlyTestPgLarapublishBase;

final class ArticleViewRepositoryTest extends ReadOnlyTestPgLarapublishBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ArticleViewRepository();
        $this->repo = $repo;
    }

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('id');
                //->asc('name');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14]);
                //->like('name','%tab%');
        return $filterer;
    }
}

