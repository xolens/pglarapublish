<?php

namespace Xolens\PgLarapublish\App\Repository;

use Xolens\PgLarapublish\App\Model\Photo;
use Xolens\PublishContract\App\Contract\Repository\PhotoRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarapublishCreateTablePhotos;

class PhotoRepository extends AbstractWritableRepository implements PhotoRepositoryContract
{
    public function model(){
        return Photo::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTablePhotos::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTablePhotos::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
