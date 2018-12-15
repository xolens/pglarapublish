<?php

namespace Xolens\PgLarapublish\Test\Repository;

use Xolens\PgLarapublish\App\Repository\FileRepository;
use Xolens\PgLarapublish\App\Repository\ArticleRepository;
use Xolens\PgLarapublish\App\Repository\FileTypeRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarapublish\Test\WritableTestPgLarapublishBase;

final class FileRepositoryTest extends WritableTestPgLarapublishBase
{
    protected $articleRepo;
    protected $fileTypeRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new FileRepository();
        $this->articleRepo = new ArticleRepository();
        $this->fileTypeRepo = new FileTypeRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $articleId = $this->articleRepo->model()::inRandomOrder()->first()->id;
        $fileTypeId = $this->fileTypeRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'name' => 'name'.$i,
            'description' => 'description'.$i,
            'size' => 'size'.$i,
            'create_date' => self::getRandomTimestamps(),
            'article_id' => $articleId,
            'file_type_id' => $fileTypeId,
        ]);
        $this->assertTrue(true);
    }
    
    /** HELPERS FUNCTIONS --------------------------------------------- **/

    public function generateSorter(){
        $sorter = new Sorter();
        $sorter->asc('id');
        return $sorter;
    }

    public function generateFilterer(){
        $filterer = new Filterer();
        $filterer->between('id',[0,14]);
        return $filterer;
    }

    public function generateItems($toGenerateCount){
        $count = $this->repository()->count()->response();
        $generatedItemsId = [];
        
        for($i=$count; $i<($toGenerateCount+$count); $i++){
            $articleId = $this->articleRepo->model()::inRandomOrder()->first()->id;
            $fileTypeId = $this->fileTypeRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'name' => 'name'.$i,
                'description' => 'description'.$i,
                'size' => random_int(0,400000),
                'create_date' => self::getRandomTimestamps(),
                'article_id' => $articleId,
                'file_type_id' => $fileTypeId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

