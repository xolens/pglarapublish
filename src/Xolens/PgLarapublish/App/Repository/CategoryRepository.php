<?php

namespace Xolens\PgLarapublish\App\Repository;

use Xolens\PgLarapublish\App\Model\Category;
use Xolens\PgLarapublish\App\Repository\CategoryRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarapublishCreateTableCategorys;

class CategoryRepository extends AbstractWritableRepository implements CategoryRepositoryContract
{
    public function model(){
        return Category::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableCategorys::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableCategorys::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
