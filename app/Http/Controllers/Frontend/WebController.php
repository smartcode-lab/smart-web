<?php


namespace App\Http\Controllers\Frontend;



use App\Repositories\MenuRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebController extends FrontendController
{
    protected $MenuRepository;


    public function __construct(
        MenuRepository $MenuRepository
    )
    {
        $this->MenuRepository = $MenuRepository;
        $menu = $this->MenuRepository->all();;
        View::share('menu', $menu);
    }

    public function index(){
        return view('web.index');
    }

    public function post(Request $request,$slug){
        $menuFirst = $this->MenuRepository->where('slug','=',$slug)->first();
        $slug = $menuFirst->slug;
        return View('web.pages.'.$menuFirst->type,compact('slug'));
    }

}
