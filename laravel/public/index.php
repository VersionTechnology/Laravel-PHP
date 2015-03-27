<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make('Illuminate\Contracts\Http\Kernel');

$response = $kernel->handle(
	$request = Illuminate\Http\Request::capture()
);



if(isset($_GET['fname'])){
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$age=$_GET['age'];
$location=$_GET['location'];
if(isset($_GET['eid'])){
$id=$_GET['eid'];
//DB::update('update empdetails set FirstName=?, LastName=?,Age=?,Location=? where id=?)', [$fname, $lname,$age,$location,$id]);
DB::table('empdetails')
            ->where('id', $id)
            ->update(array('FirstName' =>$fname,'LastName'=>$lname,'Age'=>$age,'Location'=>$location));
}
else
{
DB::insert('insert into empdetails (FirstName, LastName,Age,Location) values (?,?,?,?)', [$fname, $lname,$age,$location]);
}
$results=DB::Select('Select * from empdetails');
//print_r($results);
}
$results=DB::Select('Select * from empdetails');


?>
<html>
<head>
<style type="text/css" class="init">
#example{
border: 2px solid;
}
</style>
<link rel="stylesheet" type="text/css" href="scripts/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="scripts/demo.css">
<link rel="stylesheet" type="text/css" href="scripts/bootstrap.css">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script type="text/javascript" language="javascript" src="jquery.js"></script>
 <script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
 <script type="text/javascript" language="javascript" src="scripts/bootstrap.min.js"></script>

 
 <script type="text/javascript">


$(document).ready(function() {

$('.btnsave').click( function () {
var eid=$('.btnsave').attr('id');
var fname=$('#txtfname').val();
var lname=$('#txtlname').val();
var age=$('#txtage').val();
var location=$('#txtloc').val();
if(eid!="")
{
window.location.href=('index.php?fname='+fname+'&lname='+lname+'&age='+age+'&location='+location+'&eid='+eid);
}
else
{
window.location.href=('index.php?fname='+fname+'&lname='+lname+'&age='+age+'&location='+location);
}
});

$('#example tr').click( function () {
$('#txtfname').val("");
 $('#txtlname').val(""); 
 $('#txtage').val("");
 $('#txtloc').val("");
 var $td= $(this).closest('tr').children('td');
 var id= $td.eq(0).text(); 
 var fname= $td.eq(1).text(); 
 var lname= $td.eq(2).text(); 
 var age= $td.eq(3).text(); 
 var location= $td.eq(4).text(); 
 $('#txtfname').val(fname);
 $('#txtlname').val(lname); 
 $('#txtage').val(age);
 $('#txtloc').val(location);
 $('.btnsave').attr('id',id);
});



var oTable = $('#example').dataTable();
    $('select#Types').change( function() { oTable.fnFilter( $(this).val() ); } );
	  $('select#status').change( function() { oTable.fnFilter( $(this).val() ); });

var table = $('#example').DataTable();
	$('#min,#max').keyup( function() {
		table.draw();
	});

});

</script>



</head>

<form method="post">
<body>

<div style="width:1240px;background-color:#FCFAFB;border 1px solid">

<div style="width:200px;background-color:#ccc;height:700px;"></div>

<div style="margin-left:270px;margin-top:-680px;">
<div style="border:1px solid grey;width:300px;border-radius:5px;margin-left:253px;">
<div align="center" style="margin-top:7px;color:green;"><b>Employee details</b></div>
<div style="margin-left:10px;margin-top:10px;">FirstName</div><div style="margin-left:100px;margin-top:-15px;"><input type="text" id="txtfname" ></div>
<div style="margin-left:10px;margin-top:10px;">LastName</div><div style="margin-left:100px;margin-top:-15px;"><input type="text" id="txtlname" ></div>
<div style="margin-left:10px;margin-top:10px;">Age</div><div style="margin-left:100px;margin-top:-15px;"><input type="text" id="txtage" ></div>
<div style="margin-left:10px;margin-top:10px;">Location</div><div style="margin-left:100px;margin-top:-15px;"><input type="text" id="txtloc" ></div>
<div align="center" style="margin-top:7px;"><input type="button" class="btnsave" id="" value="Add"></div>
</div>

<div style="margin-top:20px;width:850px;margin-left:23px;">
<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Age</th>
						<th>Location</th>
						
					</tr>
				</thead>			

				<tbody style="width:500px;margin-left:30px;">
		
					<?php			


foreach ($results as $result)
{
   //var_dump($result->FirstName);
   echo "<tr ><td align='center'>" . $result->id . "</td><td align='center'>" . $result->FirstName . "</td><td align='center'>" . $result->LastName  . "</td><td align='center'>" .  $result->Age . "</td><td align='center'>" . $result->Location  . "</td></tr>";
}
?>
					
		
				</tbody>
			</table>

</div>
</div>

</div>
</body>
</form>
</html>

