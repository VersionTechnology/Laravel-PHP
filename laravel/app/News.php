<?php
namespace test;
 
use Illuminate\Database\Eloquent\Model;
 
class News extends Model {
    protected $fillable = ['headline' , 'story'];
    protected $hidden = ['id' , 'created_at'];
	
}