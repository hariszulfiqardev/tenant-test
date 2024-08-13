<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Tenant())->firstOrCreate([
            'domain' => 'accrualhub.com'
        ]);
        (new Tenant())->firstOrCreate([
            'domain' => 'subdomain.accrualhub.com'
        ]);
        (new Tenant())->firstOrCreate([
            'domain' => 'accrualdev.com'
        ]);
    }
}
