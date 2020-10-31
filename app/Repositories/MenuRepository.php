<?php


namespace App\Repositories;


use App\Core\Database\Repository;
use App\Model\Menu;

class MenuRepository extends Repository
{
    function model()
    {
        return Menu::class;   // TODO: Implement model() method.
    }

}
