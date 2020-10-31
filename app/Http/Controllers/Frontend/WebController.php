<?php


namespace App\Http\Controllers\Frontend;


class WebController extends FrontendController
{


    public function index(){

        return view('web.index');
    }

}
