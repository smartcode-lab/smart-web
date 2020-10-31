<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Database\Seeder;
use App\Model\Menu;
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
       Menu::query()->create(['uuid'=>Uuid::uuid4(),'type'=>'POST','title'=>'title','slug'=>'slug']);
    }
}
