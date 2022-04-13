<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="slam_style.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="http://static.robotwebtools.org/EaselJS/current/easeljs.min.js"></script>
<script src="http://static.robotwebtools.org/EventEmitter2/current/eventemitter2.min.js"></script>
<script src="http://static.robotwebtools.org/roslibjs/current/roslib.js"></script>
<script src="http://static.robotwebtools.org/ros2djs/current/ros2d.js"></script>
<script src="http://static.robotwebtools.org/nav2djs/current/nav2d.js"></script>
<script src="keyboardteleopjs/build/keyboardteleop.js"></script>

<script>
  /**
   * Setup all visualization elements when the page is loaded. 
   */
  function init() {
    // Connect to ROS.
    var ros = new ROSLIB.Ros({
      url : 'ws://10.222.1.224:9090'
    });
      
       var teleop = new KEYBOARDTELEOP.Teleop({
        ros: ros,
        topic: '/cmd_vel'
        
    });
         
        // Create the main viewer.
        var viewer = new ROS2D.Viewer({
          divID : 'nav',
          width : 400,
          height : 400
        });

        // Setup the nav client.
        var nav = NAV2D.OccupancyGridClientNav({
          ros : ros,
          rootObject : viewer.scene,
          viewer : viewer,
          serverName : '/move_base',
          continuous : true
        });
     
      
   
      $('#speed-slider').slider({
      range : 'min',
      min : 0,
      max : 40,
      value : 20,
      slide : function(event, ui) {
        // Change the speed label.
        $('#speed-label').html('Speed: ' + ui.value * 2.5 + '%');
        // Scale the speed.
        teleop.scale = (ui.value / 100.0); 
      }
    });

    // Set the initial speed .
    var speed = ($('#speed-slider').slider('value'))*2.5;  
    $('#speed-label').html('Speed: ' + speed + '%');
    teleop.scale = ($('#speed-slider').slider('value') / 100.0);
     // teleop.scale = 0.2;
      
    var test = document.getElementsByTagName('body')[0];
      
      test.addEventListener("keydown", color_red);
      test.addEventListener("keyup", color_white);
      function color_red(e) {
          if(e.keyCode == 90){
              document.getElementById('b1').style.backgroundColor = "red";
          }
          if(e.keyCode == 81){
              document.getElementById('b2').style.backgroundColor = "red";
          }
          if(e.keyCode == 83){
              document.getElementById('b3').style.backgroundColor = "red";
          }
          if(e.keyCode == 68){
              document.getElementById('b4').style.backgroundColor = "red";
          }
      } 
      function color_white(e) {
          document.getElementById('b1').style.backgroundColor = "white";
          document.getElementById('b2').style.backgroundColor = "white";
          document.getElementById('b3').style.backgroundColor = "white";
          document.getElementById('b4').style.backgroundColor = "white";
      }  
      
  }
</script>
</head>

<body onload="init()">
  <h1>SLAM</h1>
  <div id="nav"><p></p></div>
  <div id="wasd"><table>
      <tr>
          <td></td>
          <td id = "b1" class="button">Z</td>
          <td></td>
      </tr>
      <tr>
          <td id = "b2" class="button">Q</td>
          <td id = "b3" class="button">S</td>
          <td id = "b4" class="button">D</td>
      </tr>
    </table>
  </div> 
  <div id="speed-label"></div>
  <div id="speed-slider"></div>
  
  <form method="post" action="test.php">
        Name: <input type="text" name="name">
        <input type="submit" value="Save">
    </form>  
     
</body>
</html>
