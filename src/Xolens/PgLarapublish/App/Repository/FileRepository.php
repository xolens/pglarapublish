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
        $fileTypeId = self::get($data,'file_type_id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId, $fileTypeId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId)->where('file_type_id', $fileTypeId);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId, $fileTypeId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId)->where('file_type_id', $fileTypeId);
            })],
        ];
    }
    //*/
    
}
