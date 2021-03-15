<?php

use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/institution-data.json');
        DB::table('institutions')->delete();
        $data = json_decode($json_file);
        foreach ($data as $obj) {
            Institution::create(array(
                'name' => $obj->name,
                'city' => $obj->city,
                'state' => $obj->state,
                'country' => $obj->country
            ));
        }
    }
}
