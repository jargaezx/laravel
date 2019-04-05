<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $data = [];
        if (($handle = fopen("public/catalogs/banks.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
               $data[] = [
                   'id' => Str::uuid(),
                   'code'=>$row[0],
                   'short_name'=>utf8_encode($row[1]),
                   'name'=>utf8_encode($row[2]),
                   'created_at' => date('Y-m-d H-i-s'),
                   'updated_at' => date('Y-m-d H-i-s')
               ];
            }
            fclose($handle);
        }
        //print_r($data);die();
        DB::table('banks')->insert($data);
    }
}
