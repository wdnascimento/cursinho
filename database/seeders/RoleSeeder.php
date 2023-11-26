<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new Role();
        $table->create(
            [
                'name' => 'Administrador',
                'slug' => 'admin',
            ]
        );
        $table->create(
            [
                'name' => 'Secretaria',
                'slug' => 'secretaria',
            ]
        );

    }
}
