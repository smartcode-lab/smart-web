<?php


namespace App\Http\Controllers\admin\Trites;


use Faker\Provider\Uuid;
use Illuminate\Http\Request;

trait TraitPosts
{

    public function postList()
    {
        $postAll = $this->PostRepository->orderBy('id')->get();

        return view('admin.web.pages.post.index', compact('postAll'));
    }

    public function add(Request $request)
    {
        $menu = $this->MenuRepository->all();
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'text' => 'required',
                'slug' => 'required|max:255',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ($request->files) {
                $imageName = time() . '.' . $validatedData['img']->extension();
                $validatedData['img']->move(public_path('images'), $imageName);
                $data = [
                    'uuid' => Uuid::uuid(),
                    'type' => $request->type,
                    'title' => $validatedData['title'],
                    'text' => $validatedData['text'],
                    'desc' => $request->desc,
                    'icon' => $request->icon,
                    'slug' => $validatedData['slug'],
                    'img' => $imageName,
                ];
            } else {
                $data = [
                    'uuid' => Uuid::uuid(),
                    'type' => $request->type,
                    'title' => $validatedData['title'],
                    'text' => $validatedData['text'],
                    'desc' => $request->desc,
                    'icon' => $request->icon,
                    'slug' => $validatedData['slug'],
                ];
            }
            $post = $this->PostRepository->create($data);
            $menutoany = [
                'menu_uuid' => $request->menu,
                'row_uuid' => $post->uuid,
                'type' => $request->type
            ];
            $this->MenuToHasRepositories->create($menutoany);
            return back();
        }
        return view('admin.web.pages.post.add', compact('menu'));
    }

    public function editpost($postid, Request $request){
        $postedit = $this->PostRepository->findOrFail($postid);
        $menuToAny = $this->MenuToHasRepositories->where('row_uuid','=',$postedit->uuid)->first();
        $menu = $this->MenuRepository->all();
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'text' => 'required',
                'slug' => 'required|max:255',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if (isset($validatedData['img'])) {
                $imageName = time() . '.' . $validatedData['img']->extension();
                $validatedData['img']->move(public_path('images'), $imageName);
                $data = [
                    'type' => $request->type,
                    'title' => $validatedData['title'],
                    'text' => $validatedData['text'],
                    'desc' => $request->desc,
                    'icon' => $request->icon,
                    'slug' => $validatedData['slug'],
                    'img' => $imageName,
                ];
            } else {
                $data = [
                    'type' => $request->type,
                    'title' => $validatedData['title'],
                    'text' => $validatedData['text'],
                    'desc' => $request->desc,
                    'icon' => $request->icon,
                    'slug' => $validatedData['slug'],
                ];
            }
            $this->PostRepository->update($data,$postid);
            $menutoany = [
                'menu_uuid' => $request->menu,
                'row_uuid' => $postedit->uuid,
                'type' => $request->type
            ];
            $this->MenuToHasRepositories->update($menutoany,$menuToAny->id);
            return back();
        }
        return view('admin.web.pages.post.edit',compact('postedit','menuToAny','menu'));
    }

    public function deletepost($postid){
        $postedit = $this->PostRepository->findOrFail($postid);
        $menuToAny = $this->MenuToHasRepositories->where('row_uuid','=',$postedit->uuid)->first();
        $this->MenuToHasRepositories->delete($menuToAny->id);
        $this->PostRepository->delete($postid);
        return back();
    }
}
