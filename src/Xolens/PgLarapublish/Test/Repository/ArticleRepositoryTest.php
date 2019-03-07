<?php

namespace Xolens\PgLarapublish\Test\Repository;

use Xolens\PgLarapublish\App\Repository\ArticleRepository;
use Xolens\PgLarapublish\App\Repository\CategoryRepository;
use Xolens\PgLarapublish\App\Repository\PhotoRepository;
use Xolens\PgLarapublish\App\Repository\FileRepository;
use Xolens\PgLarautil\App\Util\Model\Sorter;
use Xolens\PgLarautil\App\Util\Model\Filterer;
use Xolens\PgLarapublish\Test\WritableTestPgLarapublishBase;

final class ArticleRepositoryTest extends WritableTestPgLarapublishBase
{
    protected $categoryRepo;
    protected $photoRepo;
    protected $fileRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ArticleRepository();
        $this->categoryRepo = new CategoryRepository();
        $this->photoRepo = new PhotoRepository();
        $this->fileRepo = new FileRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $categoryId = $this->categoryRepo->model()::inRandomOrder()->first()->id;
        $photoId = $this->photoRepo->model()::inRandomOrder()->first()->id;
        $fileId = $this->fileRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'title' => 'title'.$i,
            'paragraph' => 'paragraph'.$i,
            'publish_date' => self::getRandomTimestamps(),
            'displayed' => $i%2==0,
            'category_id' => $categoryId,
            'photo_id' => $photoId,
            'file_id' => $fileId,
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
            $categoryId = $this->categoryRepo->model()::inRandomOrder()->first()->id;
            $photoId = $this->photoRepo->model()::inRandomOrder()->first()->id;
            $fileId = $this->fileRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'title' => 'title'.$i,
                'paragraph' => 'paragraph'.$i,
                'publish_date' => self::getRandomTimestamps(),
                'displayed' => $i%2==0,
                'category_id' => $categoryId,
                'photo_id' => $photoId,
                'file_id' => $fileId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

