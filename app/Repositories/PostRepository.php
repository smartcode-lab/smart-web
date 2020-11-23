<?php


namespace App\Repositories;


use App\Core\Database\Repository;
use App\Model\Post;

class PostRepository extends Repository
{
    function model()
    {
     return Post::class;   // TODO: Implement model() method.
    }
    function PostMenuToAny($uuid){
        return $this->startCounditions()->PostMenuToAny($uuid);
    }

}
