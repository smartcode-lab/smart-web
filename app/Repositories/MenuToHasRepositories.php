<?php


namespace App\Repositories;


use App\Core\Database\Repository;
use App\Model\MenuToHas;

class MenuToHasRepositories extends Repository
{
    function model()
    {
     return MenuToHas::class;   // TODO: Implement model() method.
    }

}
