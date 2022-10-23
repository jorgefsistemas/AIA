<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registro = [
            ['admin', 'admin@todoensubastas.com.mx', bcrypt('todoensubastas')],

        ];

        foreach ($registro as $value) {
            User::create([
                'nombre' => $value[0],
                'apellido1' => $value[0],
                'apellido2' => $value[0],
                'rfc' => $value[0],
                'curp' => $value[0],
                'email' => $value[1],
                'password' => $value[2]
            ]);
        }
        User::find(1)->assignRole(['sistemas']);

    }
}
