<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLarapublish\App\Util\PgLarapublishMigration;

class PgLarapublishCreateViewFiletype extends PgLarapublishMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'filetype_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLarapublishCreateTableFiletypes::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*
                FROM ".$mainTable." 
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS ".self::table());
    }
}

