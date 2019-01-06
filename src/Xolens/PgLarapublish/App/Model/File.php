<?php

namespace Xolens\PgLarapublish\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarapublishCreateTableFiles;


class File extends Model
{
    public const ARTICLE_PROPERTY = 'article_id';
    public const FILETYPE_PROPERTY = 'filetype_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'size', 'create_date', 'filetype_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarapublishCreateTableFiles::table();
        parent::__construct($attributes);
    }
    
    public function filetype(){
        return $this->belongsTo('Xolens\PgLarapublish\App\Model\Filetype','filetype_id');
    } 
}
