var radius =0;
var img_size
var img_id;


$(document).ready(function(){
 


img_size= $('#annotation-div').height();


$('#annotation-div').width(img_size);

document.getElementsByTagName("canvas")[0].setAttribute("width", img_size);
document.getElementsByTagName("canvas")[0].setAttribute("height", img_size);

alert($('#annotation-div').width() + " " + $('#annotation-div').height());

$('#toolButton').toolbar({
  content: '#toolbar-options',
  position: 'right',
  style: 'primary',
  event: 'click',
  hideOnClick: true
});


var example = document.getElementById('canvas');
var context = example.getContext('2d');
var imageObj = new Image();
imageObj.src = 'jellyfish.bmp';
img_id = 1;
      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0, img_size, img_size);
      };
      
});


function smallc(){
document.getElementById('container-evaluation').style.cursor="url(10.png) 10 10, auto";
radius = 10;
};
function medc(){
document.getElementById('container-evaluation').style.cursor="url(20.png) 20 20, auto";
radius = 20;
};
function largec(){
document.getElementById('container-evaluation').style.cursor="url(30.png) 30 30, auto";
radius = 30;
};
function stop(){
document.getElementById('container-evaluation').style.cursor="default";
radius = 0;
};

function draw(event) {
    event = event || window.event;

    var canvas = document.getElementById('picture-div');
        x = event.pageX - canvas.offsetLeft;
        y = event.pageY - canvas.offsetTop;
       

        
       
  
          var c = document.getElementById('canvas');
                var ctx = c.getContext("2d");

                var p = ctx.getImageData(x, y, 1, 1).data; 
                var hex = "#" + ("000000" + rgbToHex(p[0], p[1], p[2])).slice(-6);
                var opposite = invertColor(hex);
                
                ctx.beginPath();
                ctx.arc(x, y, radius , 0, 2*Math.PI);
                ctx.strokeStyle = opposite;
                ctx.lineWidth = 2;
                ctx.stroke();

    var post = {
      'x' : x,
      'y': y,
      'r': radius,
      'image': img_id
    };
    
    $.post("saveData.php",post, function(data){
      console.log(data);
    });

    




};

function findPos(obj) {
    var curleft = 0, curtop = 0;
    if (obj.offsetParent) {
        do {
            curleft += obj.offsetLeft;
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
        return { x: curleft, y: curtop };
    }
    return undefined;
}

function rgbToHex(r, g, b) {
    if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
    return ((r << 16) | (g << 8) | b).toString(16);
}

function invertColor(hexTripletColor) {
    var color = hexTripletColor;
    color = color.substring(1);           // remove #
    color = parseInt(color, 16);          // convert to integer
    color = 0xFFFFFF ^ color;             // invert three bytes
    color = color.toString(16);           // convert to hex
    color = ("000000" + color).slice(-6); // pad with leading zeros
    color = "#" + color;                  // prepend #
    return color;
}

function openImg(img) {

if(img==0){
  var example = document.getElementById('canvas');
  var context = example.getContext('2d');
  var imageObj = new Image();
  imageObj.src = 'jellyfish.bmp';
  img_id = 1;


      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0, img_size, img_size);
      };

}else if(img==1){
  var example = document.getElementById('canvas');
  var context = example.getContext('2d');
  var imageObj = new Image();
  imageObj.src = 'snow.bmp';
  img_id = 2;


      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0, img_size, img_size);
      };

}else if(img==2){
  var example = document.getElementById('canvas');
  var context = example.getContext('2d');
  var imageObj = new Image();
  imageObj.src = 'peacock.bmp';
  img_id = 3;

      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0, img_size, img_size);
      };

}

}

function sendImgId(){
    window.location.href = "results.php?image="+img_id;
}