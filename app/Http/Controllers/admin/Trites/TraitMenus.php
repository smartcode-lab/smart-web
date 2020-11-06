<?php


namespace App\Http\Controllers\admin\Trites;


trait TraitMenus
{

    public function MenuList(){
        dd($this->MenuRepository->all());
    }
}
