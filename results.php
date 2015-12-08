<!DOCTYPE html>
<html>

<head>
	<title>Heat Map</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="heatmap.js"></script>
    <?php include("getData.php"); ?>
    
</head>

<body>
        
        <div id="header-results" class="header">

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose Image...
                    <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li onclick="openImg(0)">Jellyfish</li>
                          <li onclick="openImg(1)">Snow</li>
                          <li onclick="openImg(2)">Peacock</li>
                        </ul>
            </div> 

            <a href="displayData.php">
               <button id="show-results" class="btn btn-primary">Show Results</button>
            </a>
        </div>




            <div id="results-container" class="experimentContainer">
                
                <div id="picture-div-original" class="pictureContainer">
                   <div id="original-picture" >
                         <img title="Original" />
                    </div> 
                </div>

                <div id="picture-div-heatmap" class="pictureContainer">
                    <div id="heatMap">
                         <img title="Result" />
                    </div>
                </div> 
            </div>
</body>
</html>
