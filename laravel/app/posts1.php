<?php
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class posts1 extends Model {
    protected $fillable = ['description' , 'status'];
    protected $hidden = ['id'];
}


?>