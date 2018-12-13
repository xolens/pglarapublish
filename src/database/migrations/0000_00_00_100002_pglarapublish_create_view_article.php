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
        $photoTable = PgLarapublishCreateTablePhotos::table();
        $categoryTable = PgLarapublishCreateTableCategorys::table();
        DB::statement("
            CREATE VIEW ".self::table()." AS(
                SELECT 
                    ".$mainTable.".*,
                    ".$photoTable.".name as photo_name,
                    ".$categoryTable.".name as category_name
                FROM ".$mainTable." 
                    LEFT JOIN ".$photoTable." ON ".$photoTable.".id = ".$mainTable.".photo_id
                    LEFT JOIN ".$categoryTable." ON ".$categoryTable.".id = ".$mainTable.".category_id
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

