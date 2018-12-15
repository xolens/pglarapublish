<?php

namespace Xolens\PgLarapublish\Test\Repository;

use Xolens\PgLarapublish\App\Repository\ArticleRepository;
use Xolens\PgLarapublish\App\Repository\PhotoRepository;
use Xolens\PgLarapublish\App\Repository\CategoryRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarapublish\Test\WritableTestPgLarapublishBase;

final class ArticleRepositoryTest extends WritableTestPgLarapublishBase
{
    protected $photoRepo;
    protected $categoryRepo;
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new ArticleRepository();
        $this->photoRepo = new PhotoRepository();
        $this->categoryRepo = new CategoryRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $photoId = $this->photoRepo->model()::inRandomOrder()->first()->id;
        $categoryId = $this->categoryRepo->model()::inRandomOrder()->first()->id;
        $item = $this->repository()->make([
            'name' => 'name'.$i,
            'text' => 'text'.$i,
            'description' => 'description'.$i,
            'type' => 'type'.$i,
            'position' => 'position'.$i,
            'publish_date' => self::getRandomTimestamps(),
            'keywords' => 'keywords'.$i,
            'displayed' => 'displayed'.$i,
            'short_value' => 'shortValue'.$i,
            'value_unit' => 'valueUnit'.$i,
            'photo_id' => $photoId,
            'category_id' => $categoryId,
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
            $photoId = $this->photoRepo->model()::inRandomOrder()->first()->id;
            $categoryId = $this->categoryRepo->model()::inRandomOrder()->first()->id;
            $item = $this->repository()->create([
                'name' => 'name'.$i,
                'text' => 'text'.$i,
                'description' => 'description'.$i,
                'type' => 'type'.$i,
                'position' => random_int(0,400000),
                'publish_date' => self::getRandomTimestamps(),
                'keywords' => 'keywords'.$i,
                'displayed' => $i%2==0,
                'short_value' => 'shortValue'.$i,
                'value_unit' => 'valueUnit'.$i,
                'photo_id' => $photoId,
                'category_id' => $categoryId,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   

