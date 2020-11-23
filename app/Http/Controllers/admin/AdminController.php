<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Trites\TraitMenus;
use App\Http\Controllers\admin\Trites\TraitPosts;
use App\Http\Controllers\Controller;

use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;
use App\Repositories\MenuToHasRepositories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use TraitPosts, TraitMenus;

    protected $MenuRepository,$PostRepository,$MenuToHasRepositories;
    function __construct
    (
        MenuRepository $MenuRepository,
        MenuToHasRepositories $MenuToHasRepositories,
        PostRepository $PostRepository
    )
    {
        $this->MenuRepository = $MenuRepository;
        $this->PostRepository = $PostRepository;
        $this->MenuToHasRepositories = $MenuToHasRepositories;
    }

    public function index(){
        $postDashbord = $this->PostRepository->limit(3);
        return view('admin.web.pages.main',compact('postDashbord'));
    }


}
