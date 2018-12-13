<?php

namespace Xolens\PgLarapublish\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarapublishCreateTableCategorys;


class Category extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarapublishCreateTableCategorys::table();
        parent::__construct($attributes);
    }
}
