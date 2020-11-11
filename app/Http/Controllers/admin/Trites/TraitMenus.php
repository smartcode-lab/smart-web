<?php


namespace App\Http\Controllers\admin\Trites;


trait TraitMenus
{

    public function MenuList(){
        $meniuAll = $this->MenuRepository->orderBy('id')->get();

        return view('admin.web.pages.menu.index',compact('meniuAll'));
    }
}
