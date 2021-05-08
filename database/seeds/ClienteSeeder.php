<?php
use App\Cliente;
use App\Factura;
use App\Producto;
use Illuminate\Database\Seeder;
class ClienteSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class, 15)->create()->each(
                function ($cliente) {
                factory(Factura::class,2)->create(['cliente_id' => $cliente->id]);
            }
        );
    }
}
