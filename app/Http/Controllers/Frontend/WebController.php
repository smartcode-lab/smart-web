<?php


namespace App\Http\Controllers\Frontend;



use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebController extends FrontendController
{
    protected $MenuRepository,$PostRepository;


    public function __construct(
        MenuRepository $MenuRepository,
        PostRepository $PostRepository
    )
    {
        $this->MenuRepository = $MenuRepository;
        $this->PostRepository = $PostRepository;
        $menu = $this->MenuRepository->all();;
        View::share('menu', $menu);
    }

    public function index(){
        return view('web.index');
    }

    public function post($slug){
        $menuFirst = $this->MenuRepository->where('slug','=',$slug)->first();
        $slug = $menuFirst->slug;
        $post = $this->PostRepository->PostMenuToAny($slug)->get();
        dd($post);
        return View('web.pages.'.$menuFirst->type,compact('slug'));
    }

}
