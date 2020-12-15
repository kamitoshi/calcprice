<?php

use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            "name" => "C-1",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "C-2",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "C-3",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "C-4",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "C-5",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);
        
        $param = [
            "name" => "C-6",
            "type" => "counter",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "T-1",
            "type" => "table",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "T-2",
            "type" => "table",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "T-3",
            "type" => "table",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);

        $param = [
            "name" => "T-4",
            "type" => "table",
            "guest_count" => 0,
            "hasUse" => false,
        ];
        DB::table("seats")->insert($param);
    }
}
