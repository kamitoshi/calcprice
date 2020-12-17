<?php

use Illuminate\Database\Seeder;

class SetMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "name" => "水氷セット",
            "price" => 2000,
        ];
        DB::table("set_menus")->insert($param);
        $param = [
            "name" => "炭酸水氷セット",
            "price" => 2500,
        ];
        DB::table("set_menus")->insert($param);
    }
}
