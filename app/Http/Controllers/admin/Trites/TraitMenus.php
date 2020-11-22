<?php


namespace App\Http\Controllers\admin\Trites;


use Faker\Provider\Uuid;
use Illuminate\Http\Request;

trait TraitMenus
{

    public function MenuList(){
        $meniuAll = $this->MenuRepository->orderBy('id')->get();

        return view('admin.web.pages.menu.index',compact('meniuAll'));
    }

    public function store(Request $request)
    {
        if($request->method() == 'POST'){
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
            ]);
            $data = [
              'uuid'=>Uuid::uuid(),
              'type'=>$request->type,
              'title'=>$request->title,
              'slug'=>$request->slug,
              'ucin'=>$request->ucin
            ];
            $this->MenuRepository->create($data);
        }
        return back();
    }

    public function edit($menuid,Request $request){
        $menu = $this->MenuRepository->findOrFail($menuid);
        if($request->method() == 'POST'){
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
            ]);
            $data = [
                'uuid'=>Uuid::uuid(),
                'type'=>$request->type,
                'title'=>$request->title,
                'slug'=>$request->slug,
                'ucin'=>$request->ucin
            ];
            $this->MenuRepository->update($data,$menuid);
            return back();
        }
        return view('admin.web.pages.menu.edit',compact('menu'));
    }

    public function delete($menuid){
        $this->MenuRepository->delete($menuid);
        return back();
    }
}
