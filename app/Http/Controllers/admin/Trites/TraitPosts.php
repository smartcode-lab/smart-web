<?php


namespace App\Http\Controllers\admin\Trites;




trait TraitPosts
{

    public function postList(){
        $postAll = $this->PostRepository->orderBy('id')->get();

        return view('admin.web.pages.post.index',compact('postAll'));
    }
}
