<?php


namespace App\Http\Controllers\Frontend;


use App\Repositories\MenuRepository;

class WebController extends FrontendController
{
    public function __construct()
    {
        $menu = $this->MenuAll();
        View::share('menu', $menu);
    }

    public function index(){

        return view('web.index');
    }

}
