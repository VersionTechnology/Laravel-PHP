<?php
	include('C:\xampp\htdocs\FirstLaravelProject\laravel\config\database.php');
use Illuminate\Database\Seeder;
use App\News as News; // to use Eloquent Model
//echo "sometext";
//echo \App\posts1::all();
//header('Location:create.blade.php');

//DB::table('posts')->insert(array(
  //array('description' => 400, 'status' => 'Laptop'),
  //array('price' => 200, 'product' => 'Smartphone'),  
//));
echo \App\News::all();
//use Illuminate\Support\Facades\DB as DB;
// Test the DB Instance
//$dbInstance = new DB;
//var_dump ($dbInstance);

//$result=DB::select('Select * from news');
//echo $result;

//$orders = DB::table('posts')
  //->where('status', '>', 'status1')
  //->get();

?>

@extends('admin._layouts.default')

@section('main')

	<h1>
		Pages <a href="{{ URL::route('admin.pages.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add new page</a>
	</h1>

	<hr>

	{{ Notification::showAll() }}

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>When</th>
				<th><i class="icon-cog"></i></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
					<td>{{ $page->created_at }}</td>
					<td>
						<a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

						{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
							<button type="submit" href="{{ URL::route('admin.pages.destroy', $page->id) }}" class="btn btn-danger btn-mini">Delete</button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop


<html>

<div style="border:1px solid grey;">
<div style="margin-left:10px;margin-top:10px;">FirstName</div><div style="margin-left:100px;margin-top:-15px;"><input type="text" id="txtfname" ></div>
</div>
<div><a> {{html::link('post/add',"add Post",array('title' => 'add Post','class'=>'test_class'))}} ADD  </a></div>
<div>  <a href="{{ URL::route('posts/get') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add</a>   </div>


</html>
