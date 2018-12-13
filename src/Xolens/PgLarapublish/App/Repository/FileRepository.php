<?php

namespace Xolens\PgLarapublish\App\Repository;

use Xolens\PgLarapublish\App\Model\File;
use Xolens\PublishContract\App\Contract\Repository\FileRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarapublishCreateTableFiles;

class FileRepository extends AbstractWritableRepository implements FileRepositoryContract
{
    public function model(){
        return File::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $articleId = self::get($data,'article_id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId);
            })],
        ];
    }
    //*/
    
}
