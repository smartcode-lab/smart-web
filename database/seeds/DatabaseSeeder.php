<?php

use App\Model\Menu;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Menu::query()->create([
            'uuid'=>Uuid::uuid4(),
            'type'=>'POST',
            'title'=>'title',
            'slug'=>'slug',
            'ucin'=>'ucin'
        ]);
//         $this->call(MenuTest::class);
        // $this->call(UsersTableSeeder::class);
    }
}
