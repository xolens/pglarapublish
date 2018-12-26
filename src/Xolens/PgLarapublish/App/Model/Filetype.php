<?php

namespace Xolens\PgLarapublish\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarapublishCreateTableFiletypes;


class Filetype extends Model
{
    public const PHOTO_PROPERTY = 'photo_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'type', 'photo_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarapublishCreateTableFiletypes::table();
        parent::__construct($attributes);
    }

    public function photo(){
        return $this->belongsTo('Xolens\PgLarapublish\App\Model\Photo','photo_id');
    } 
}
