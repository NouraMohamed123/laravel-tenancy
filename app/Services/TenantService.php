<?php

namespace App\Services;

use App\Models\Tenant;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
/**
 * Class TenantService
 * @package App\Services
 */

class TenantService
{
    private static $tenant;
    private static $domain;
    private static $database;

    public static function switchToTenant(Tenant $tenant)
    {
        DB::purge('system');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);

        self::$tenant = $tenant;
        self::$domain = $tenant->domain;
        self::$database = $tenant->database;

        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    }

    public static function switchToDefault(Tenant $tenant)
    {
        DB::purge('system');
        DB::purge('tenant');

        DB::connection('system')->reconnect();
        DB::setDefaultConnection('system');
    }

    public static function getTenant()
    {
        return self::$tenant;
    }
}
