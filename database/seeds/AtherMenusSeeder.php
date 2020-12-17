<?php

use Illuminate\Database\Seeder;

class AtherMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "name" => "カラオケ",
            "price" => 500,
        ];
        DB::table("ather_menus")->insert($param);
        $param = [
            "name" => "タバコ（各種）",
            "price" => 800,
        ];
        DB::table("ather_menus")->insert($param);
    }
}
