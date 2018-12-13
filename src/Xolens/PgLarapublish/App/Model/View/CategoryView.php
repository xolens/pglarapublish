<?php

namespace Xolens\PgLarapublish\App\Model\View;
use Illuminate\Database\Eloquent\Model;

use PgLarapublishCreateViewCategory;



class CategoryView extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarapublishCreateViewCategory::table();
        parent::__construct($attributes);
    }
}

