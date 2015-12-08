<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if($_REQUEST['x'] != null && $_REQUEST['y'] != null && $_REQUEST['r'] != null && $_REQUEST['image'] != null) {
    $x = $_REQUEST['x'];
    $y = $_REQUEST['y'];
    $r = $_REQUEST['r'];
    $image = $_REQUEST['image'];
  
}
}
        $id=1;
        
        require_once('../mysqli_connect.php');

        $query = "INSERT INTO heatmap (x, y, radius, image) VALUES (?, ?, ?, ?)";

        
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "iiii" ,$x,$y,$r,$image);

       

        mysqli_stmt_execute($stmt);


        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){
            
            echo 'Info Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);


            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }

       ?>

