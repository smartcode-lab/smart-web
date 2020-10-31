<?php


namespace App\Http\Controllers\Frontend;


class WebController extends FrontendController
{


    public function index(){
        $menu = $this->MenuAll();

        return view('web.index',compact('menu'));
    }

}
