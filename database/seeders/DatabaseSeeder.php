<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(TipoIdentificacionSeeder::class);
        // $this->call(TipoDocumentoSeeder::class);
        // $this->call(TipoDocumentoPropiedadSeeder::class);
        // $this->call(TipoVehiculoSeeder::class);
        // $this->call(TipoLicenciasSeeder::class);
        // $this->call(OrganizacionesSeeder::class);
        // $this->call(BasesSeeder::class);
    }
}
