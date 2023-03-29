<?php

namespace App\Console\Commands\Tenants;

use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Tenants:migrate'; //work instead make:migrate

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenants = Tenant::get();
        foreach ($tenants as $tenant) {
            TenantService::switchToTenant($tenant);
            $this->info('start migrating : ' . $tenant->domain);
            ARtisan::call(
                ' migrate --path=database/migrations/tenants/ --database=tenant'
            );
            $this->info(Artisan::output());
        }
        return Command::SUCCESS;
    }
}
