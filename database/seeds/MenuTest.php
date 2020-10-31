<?php

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MenuTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(['uuid'=>Uuid::uuid4(),'type'=>'POST','title'=>'title','slug'=>'slug']);
    }
}
