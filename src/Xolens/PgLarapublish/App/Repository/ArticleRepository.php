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
        $photoId = self::get($data,'photo_id');
        $categoryId = self::get($data,'category_id');
        return [
            'id' => ['required',Rule::unique(PgLarapublishCreateTableArticles::table())->where(function ($query) use($id, $photoId, $categoryId) {
                return $query->where('id','!=', $id)->where('photo_id', $photoId)->where('category_id', $categoryId);
            })],
            'name' => [Rule::unique(PgLarapublishCreateTableArticles::table())->where(function ($query) use($id, $photoId, $categoryId) {
                return $query->where('id','!=', $id)->where('photo_id', $photoId)->where('category_id', $categoryId);
            })],
        ];
    }
    //*/
    
}
