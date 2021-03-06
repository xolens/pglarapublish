<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use Xolens\PgLarapublish\App\Util\PgLarapublishMigration;

class PgLarapublishCreateTableArticles extends PgLarapublishMigration
{
    /**
     * Return table name
     *
     * @return string
     */
    public static function tableName(){
        return 'articles';
    }    

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::table(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('paragraph');
            $table->datetime('publish_date')->nullable();
            $table->boolean('displayed')->nullable();
            $table->integer('category_id')->index();
            $table->integer('photo_id')->index();
            $table->integer('file_id')->nullable()->index();
        });
        if(self::logEnabled()){
            self::registerForLog();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(self::logEnabled()){
            self::unregisterFromLog();
        }
        Schema::dropIfExists(self::table());

    }
}
