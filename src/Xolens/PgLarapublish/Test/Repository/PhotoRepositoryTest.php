<?php

namespace Xolens\PgLarapublish\Test\Repository;

use Xolens\PgLarapublish\App\Repository\PhotoRepository;
use Xolens\LarautilContract\App\Util\Model\Sorter;
use Xolens\LarautilContract\App\Util\Model\Filterer;
use Xolens\PgLarapublish\Test\WritableTestPgLarapublishBase;

final class PhotoRepositoryTest extends WritableTestPgLarapublishBase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate');
        $repo = new PhotoRepository();
        $this->repo = $repo;
    }

    /**
     * @test
     */
    public function test_make(){
        $i = rand(0, 10000);
        $item = $this->repository()->make([
            'name' => 'name'.$i,
            'description' => 'description'.$i,
            'size' => 'size'.$i,
            'extension' => 'extension'.$i,
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
            $item = $this->repository()->create([
                'name' => 'name'.$i,
                'description' => 'description'.$i,
                'size' => random_int(0,400000),
                'extension' => 'extension'.$i,
            ]);
            $generatedItemsId[] = $item->response()->id;
        }
        $this->assertEquals(count($generatedItemsId), $toGenerateCount);
        return $generatedItemsId;
    }
}   
