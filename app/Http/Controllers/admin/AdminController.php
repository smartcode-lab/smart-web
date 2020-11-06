<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Trites\TraitMenus;
use App\Http\Controllers\admin\Trites\TraitPosts;
use App\Http\Controllers\Controller;

use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;

class AdminController extends Controller
{
    use TraitPosts, TraitMenus;

    protected $MenuRepository,$PostRepository;
    function __construct
    (
        MenuRepository $MenuRepository,
        PostRepository $PostRepository
    )
    {
        $this->MenuRepository = $MenuRepository;
        $this->PostRepository = $PostRepository;
    }


    public function index1(){
        return view('admin.index');
    }
}
