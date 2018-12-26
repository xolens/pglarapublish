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
        $photoTable = PgLarapublishCreateTablePhotos::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$photoTable.".name as photo_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$photoTable." ON ".$photoTable.".id = ".$mainTable.".photo_id
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

