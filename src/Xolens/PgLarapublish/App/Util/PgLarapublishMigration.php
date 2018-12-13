<?php

namespace Xolens\PgLarapublish\App\Util;

use Illuminate\Support\Facades\DB;

abstract class PgLarapublishMigration extends AbstractPgLarapublishMigration
{
    public static function tablePrefix(){
        return config('xolens-pglarapublish.pglarapublish-database_table_prefix');
    }

    public static function triggerPrefix(){
        return config('xolens-pglarapublish.pglarapublish-database_trigger_prefix');
    }

    public static function logEnabled(){
        return config('xolens-pglarapublish.pglarapublish-enable_database_log');
    }
}
