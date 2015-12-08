<!DOCTYPE html>
<html>

<head>
	<title>Experiment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="jquery.toolbar.css"/>
    <link rel="stylesheet" type="text/css" href="icons/css/font-awesome.css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="heatmap.js"></script>
    <script type="text/javascript" src="evaluationJS.js"></script>
    <script src="jquery.toolbar.js"></script>  
</head>

<body>
       

        <div id="header-evaluation" class="header">           
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose Image...
                    <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li onclick="openImg(0)">Jellyfish</li>
                          <li onclick="openImg(1)">Snow</li>
                          <li onclick="openImg(2)">Peacock</li>
                        </ul>
            </div>            
            <a href="#">          
                <button id="button-next" class="btn btn-primary" onclick="sendImgId()" >Next</button>
            </a>
        </div>




            <div id="container-evaluation" class="experimentContainer">

                <div id="picture-div" class="pictureContainer">
                

                    <div id="annotation-div" class="annotationDiv">
                        <canvas id="canvas" onclick="draw()">Your browser does not support the HTML5 canvas tag.</canvas>
                    </div> 
                </div>

                <div id="tools-div">
                    <div id="toolButton" class="btn-toolbar btn-toolbar-success">
                        <i class="fa fa-circle fa-3x"></i>
                    </div>

                    <div id="toolbar-options" class="hidden">
                        <a onclick="smallc()"><i class="fa fa-circle-thin fa-lg"></i></a>
                        <a onclick="medc()"><i class="fa fa-circle-thin fa-2x"></i></a>
                        <a onclick="largec()"><i class="fa fa-circle-thin fa-3x"></i></a>
                        <a onclick="stop()"><i class="fa fa-close fa-2x"></i></a>
                    </div>
                </div> 


            </div>

</body>
</html>
