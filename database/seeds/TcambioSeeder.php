<?php
use App\Tcambio;
use Illuminate\Database\Seeder;

class TcambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tcambio::class,365)->create();
    }
}
