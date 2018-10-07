<?php
require('db.php');
// storing  request (ie, get/post) global array to a variable  

$requestData= $_REQUEST;

$columns = array('city', 'state', 'zip', 'country', 'address', 'latitude', 'longitude');


$sql = "SELECT `city`, `state`, `zip`, `country`, `latitude`, `longitude` ";
$sql.=" FROM saved_locations WHERE 1=1";

$query=mysqli_query($conn, $sql) or die("get saved_locations");
$totalFiltered = $totalData = mysqli_num_rows($query);

if( !empty($requestData['search']['value']) ) {   
	$sql.=" AND ( city LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR state LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR zip LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR country LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR latitude LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR longitude LIKE '".$requestData['search']['value']."%' )";
}

$query=mysqli_query($conn, $sql) or die("get saved_locations");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* 
$requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("get saved_locations");


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$nestedData=array(); 

	$nestedData[] = $row["city"];
	$nestedData[] = $row["state"];
	$nestedData[] = $row["zip"];
	$nestedData[] = $row["country"];
	$nestedData[] = $row["latitude"];
	$nestedData[] = $row["longitude"];
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
