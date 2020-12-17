<?php

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
        $this->call(ProductsSeeder::class);
        $this->call(SeatsSeeder::class);
        $this->call(SetMenusSeeder::class);
        $this->call(AtherMenusSeeder::class);
    }
}
