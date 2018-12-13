<?php

namespace Xolens\PgLarapublish\Test;

use Xolens\PgLarautil\Test\TestCase;
use Xolens\PgLarautil\Test\RepositoryTrait\ReadableRepositoryTestTrait;
use Xolens\PgLarautil\Test\RepositoryTrait\WritableRepositoryTestTrait;

abstract class WritableTestPgLarapublishBase extends TestCase
{
    use ReadableRepositoryTestTrait, WritableRepositoryTestTrait;
    
    protected $repo;

    public function repository(){
        return $this->repo;
    }

    protected function getPackageProviders($app): array{
        return [
            'Xolens\PgLarapublish\PgLarapublishServiceProvider',
        ];
    }

    public function generateSingleItem(){
        return $this->generateItems(1)[0];
    }

    abstract public function generateItems($toGenerateCount);

    public static function getRandomTimestamps($backwardDays = null)
	{

		if ( is_null($backwardDays) )
		{
			$backwardDays = -800;
		}
		$backwardDays = rand($backwardDays, 0);
		return \Carbon\Carbon::now()->addDays($backwardDays)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
    }
}
