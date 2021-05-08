<?php
use App\Producto;
use App\Detalle;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Producto::class, 15)->create()->each(
            function ($producto) {
            factory(Detalle::class,2)->create(['producto_id' => $producto->id]);
        }
    );
        // $datas = [
        //     'sku'           => '',
        //     'descripción'   => '',
        //     'pdolar'        => '',
        //     'pcordobas'     => '',
        //     'tcambio'       => '',
        //     'activo'        => '',
        // ];

        // foreach( $datas as $data){
        //     Product::create([
        //         'sku' =>            $data['sku'],
        //         'descripción' =>    $data['descripción'],
        //         'pdolar' =>         $data['pdolar'],
        //         'pcordobas' =>      $data['pcordobas'],
        //         'tcambio' =>        $data['tcambio'],
        //         'activo' =>         $data['activo']

        //     ]);
        //}
    }
}
