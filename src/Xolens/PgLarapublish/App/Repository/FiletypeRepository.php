<?php

namespace Xolens\PgLarapublish\App\Repository;

use Xolens\PgLarapublish\App\Model\Filetype;
use Xolens\PublishContract\App\Contract\Repository\FiletypeRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarapublishCreateTableFiletypes;

class FiletypeRepository extends AbstractWritableRepository implements FiletypeRepositoryContract
{
    public function model(){
        return Filetype::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableFiletypes::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableFiletypes::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
