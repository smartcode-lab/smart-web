<?php


namespace App\Http\Controllers\Frontend;


use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;
use App\Repositories\MenuToHasRepositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebController extends FrontendController
{
    protected $MenuRepository, $PostRepository, $MenuToHasRepositories;


    public function __construct(
        MenuRepository $MenuRepository,
        PostRepository $PostRepository,
        MenuToHasRepositories $MenuToHasRepositories
    )
    {
        $this->MenuRepository = $MenuRepository;
        $this->PostRepository = $PostRepository;
        $this->MenuToHasRepositories = $MenuToHasRepositories;
        $menu = $this->MenuRepository->all();;
        View::share('menu', $menu);
    }

    public function index()
    {
        $postserv = $this->PostRepository->where('type','=','services')->orderBy('id')->limit(4)->get();
        $postprofile = $this->PostRepository->where('type','=','portfolio')->orderBy('id')->limit(4)->get();
        $ebautpost = $this->PostRepository->where('type','=','about')->orderBy('id')->limit(4)->get();
        return view('web.index',compact('postserv','postprofile','ebautpost'));
    }

    public function post($slug)
    {
        $menuFirst = $this->MenuRepository->where('slug', '=', $slug)->first();
        $post = $this->PostRepository->PostMenuToAny($menuFirst->uuid)->get();
        return View('web.pages.' . $menuFirst->type, compact('post','slug'));
    }

    public function full($postid)
    {
        $fullpost = $this->PostRepository->findOrFail($postid);
        $menutuany = $this->MenuToHasRepositories->where('row_uuid','=',$fullpost->uuid)->first();
        $menu = $this->MenuRepository->where('uuid','=',$menutuany->menu_uuid)->select('slug')->first();
        $slug = $menu->slug;
        return View('web.pages.full', compact('fullpost','slug'));
    }

}
