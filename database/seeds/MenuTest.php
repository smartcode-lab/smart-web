<?php



use Illuminate\Database\Seeder;
use App\Model\Menu;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
