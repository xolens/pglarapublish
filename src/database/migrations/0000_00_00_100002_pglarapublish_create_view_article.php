<?php

use Illuminate\Support\Facades\DB;
use Xolens\PgLarapublish\App\Util\PgLarapublishMigration;

class PgLarapublishCreateViewArticle extends PgLarapublishMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'article_view';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mainTable = PgLarapublishCreateTableArticles::table();
        $categoryTable = PgLarapublishCreateTableCategorys::table();
        $photoTable = PgLarapublishCreateTablePhotos::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$categoryTable.".name as category_name,
                    ".$photoTable.".name as photo_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$categoryTable." ON ".$categoryTable.".id = ".$mainTable.".category_id
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

