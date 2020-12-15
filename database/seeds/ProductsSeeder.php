<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "name" => "シャンパン",
            "price" => 20000,
            "count" => 3,
        ];
        DB::table("products")->insert($param);

        $param = [
            "name" => "ウイスキー（ブラックニッカ）",
            "price" => 7000,
            "count" => 5,
        ];
        DB::table("products")->insert($param);

        $param = [
            "name" => "芋焼酎（魔王）",
            "price" => 12000,
            "count" => 5,
        ];
        DB::table("products")->insert($param);
  
        $param = [
            "name" => "芋焼酎（三岳）",
            "price" => 10000,
            "count" => 10,
        ];
        DB::table("products")->insert($param);
 
        $param = [
            "name" => "ウイスキー（角）",
            "price" => 11000,
            "count" => 5,
        ];
        DB::table("products")->insert($param);

    }
}
