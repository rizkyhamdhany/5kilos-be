<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Price;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $administrator = Role::create(['name' => 'administrator']);
        $customer = Role::create(['name' => 'customer']);
        User::createFromValues('Rizky', 'rizky@5kilos.id', 'admin1234')->assignRole($administrator);

        Price::create("Singapore", "569933", false, 300000);
        Price::create("Singapore", "521147", false, 400000);
        Price::create("Malaysia", "01500", false, 500000);
        Price::create("Malaysia", "05500", false, 600000);
    }
}
