<?php

namespace Xolens\PgLarapublish\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarapublishCreateTableArticles;


class Article extends Model
{
    public const CATEGORY_PROPERTY = 'category_id';
    public const PHOTO_PROPERTY = 'photo_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'paragraph', 'publish_date', 'displayed', 'category_id', 'file_id', 'photo_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarapublishCreateTableArticles::table();
        parent::__construct($attributes);
    }

    public function category(){
        return $this->belongsTo('Xolens\PgLarapublish\App\Model\Category','category_id');
    } 

    public function photo(){
        return $this->belongsTo('Xolens\PgLarapublish\App\Model\Photo','photo_id');
    } 
}
