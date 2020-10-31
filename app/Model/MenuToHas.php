<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class MenuToHas extends Model
{
    protected $table='menu_to_has';
    protected $fillable=[
      'menu_uuid',
      'row_uuid',
      'type'
    ];

}
