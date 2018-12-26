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
        $filetypeId = self::get($data,'filetype_id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId, $filetypeId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId)->where('filetype_id', $filetypeId);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableFiles::table())->where(function ($query) use($id, $articleId, $filetypeId) {
                return $query->where('id','!=', $id)->where('article_id', $articleId)->where('filetype_id', $filetypeId);
            })],
        ];
    }
    //*/
    
}
