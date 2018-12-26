<?php

namespace Xolens\PgLarapublish\App\Repository;

use Xolens\PgLarapublish\App\Model\Article;
use Xolens\PublishContract\App\Contract\Repository\ArticleRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarapublishCreateTableArticles;

class ArticleRepository extends AbstractWritableRepository implements ArticleRepositoryContract
{
    public function model(){
        return Article::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $categoryId = self::get($data,'category_id');
        $photoId = self::get($data,'photo_id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableArticles::table())->where(function ($query) use($id, $categoryId, $photoId) {
                return $query->where('id','!=', $id)->where('category_id', $categoryId)->where('photo_id', $photoId);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableArticles::table())->where(function ($query) use($id, $categoryId, $photoId) {
                return $query->where('id','!=', $id)->where('category_id', $categoryId)->where('photo_id', $photoId);
            })],
        ];
    }
    //*/
    
}
