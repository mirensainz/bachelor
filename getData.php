<?php



if($_REQUEST['image'] != null) {

    $image = $_REQUEST['image'];


	require_once('../mysqli_connect.php');

	$IDquery = "SELECT x, y, radius FROM heatmap WHERE image=$image";


    $response = @mysqli_query($dbc, $IDquery);

    $dataArray = array();
    
    if($response){

        while($row = mysqli_fetch_array($response)){
        	
            	$contentArray = array($row['x'], $row['y'], $row['radius']);
            	array_push($dataArray, $contentArray);

        	
        }
       
    }


?>

<script type="text/javascript">
$(document).ready(function(){

var img_width= $('#heatMap img').width();
var img_height= $('#heatMap img').height();


$('#heatMap').width(img_height).height(img_height);



var heatMapData = <?php echo json_encode( $dataArray ) ?>;
var img_id = <?php echo json_encode( $image ) ?>;

if(img_id == 1){
	document.getElementsByTagName("img")[0].setAttribute("src", "jellyfish.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "jellyfish.bmp");
}else if(img_id == 2){
	document.getElementsByTagName("img")[0].setAttribute("src", "snow.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "snow.bmp");
}else if(img_id == 3){
	document.getElementsByTagName("img")[0].setAttribute("src", "peacock.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "peacock.bmp");
}
var config = {
		container: document.getElementById("heatMap"),
		};

	//creates and initializes the heatmap
	var heatmap = h337.create(config);

	var points = [];
	
	for (var i=0; i < heatMapData.length; i++){
		var point = {
				    x: heatMapData[i][0],
				    y: heatMapData[i][1],
				    radius: heatMapData[i][2],
	  				};
	  		points.push(point);
	}
	
	

	var data = { 
  		data: points 
	};

	heatmap.setData(data);

});

function openImg(img) {

if(img==0){
 	document.getElementsByTagName("img")[0].setAttribute("src", "jellyfish.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "jellyfish.bmp");
  	img_id = 1;
  	window.location.href = "results.php?image="+img_id;


}else if(img==1){
  	document.getElementsByTagName("img")[0].setAttribute("src", "snow.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "snow.bmp");
  	img_id = 2;
  	window.location.href = "results.php?image="+img_id;


}else if(img==2){
	document.getElementsByTagName("img")[0].setAttribute("src", "peacock.bmp");
	document.getElementsByTagName("img")[1].setAttribute("src", "peacock.bmp");
  	img_id = 3;
  	window.location.href = "results.php?image="+img_id;

}
};

</script>


<?php
}
?>
