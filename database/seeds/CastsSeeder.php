<?php

use Illuminate\Database\Seeder;

class CastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "name" => "さき",
            "age" => 27,
            "character" => "姉御肌",
            "favorite" => "お肉",
        ]; 
        DB::table("casts")->insert($param);

        $param = [
            "name" => "ひとみ",
            "age" => 26,
            "character" => "優しい",
            "favorite" => "うどん",
        ]; 
        DB::table("casts")->insert($param);

        $param = [
            "name" => "あかね",
            "age" => 29,
            "character" => "聞き上手",
            "favorite" => "お酒",
        ]; 
        DB::table("casts")->insert($param);

        $param = [
            "name" => "くるみ",
            "age" => 24,
            "character" => "明るい",
            "favorite" => "甘い物",
        ]; 
        DB::table("casts")->insert($param);

        $param = [
            "name" => "あおい",
            "age" => 32,
            "character" => "甘えん坊",
            "favorite" => "クレープ",
        ]; 
        DB::table("casts")->insert($param);
    }
}
