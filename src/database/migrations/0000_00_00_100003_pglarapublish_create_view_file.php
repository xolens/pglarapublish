<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLarapublish\App\Util\PgLarapublishMigration;

class PgLarapublishCreateViewFile extends PgLarapublishMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'file_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLarapublishCreateTableFiles::table();
        $articleTable = PgLarapublishCreateTableArticles::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$articleTable.".name as article_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$articleTable." ON ".$articleTable.".id = ".$mainTable.".article_id
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

