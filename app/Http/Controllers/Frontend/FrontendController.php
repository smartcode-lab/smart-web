<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;

class FrontendController extends Controller
{
    protected $MenuRepository;
    public function __construct(
        MenuRepository $MenuRepository
    )
    {
        $this->MenuRepository = $MenuRepository;
    }

    public function menuAll(){
        return $this->MenuRepository->all();
    }
}
