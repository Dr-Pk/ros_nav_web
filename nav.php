<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="nav_style.css" />
<script src="http://static.robotwebtools.org/EaselJS/current/easeljs.min.js"></script>
<script src="http://static.robotwebtools.org/EventEmitter2/current/eventemitter2.min.js"></script>
<script src="http://static.robotwebtools.org/roslibjs/current/roslib.js"></script>
<script src="http://static.robotwebtools.org/ros2djs/current/ros2d.js"></script>
<script src="http://static.robotwebtools.org/nav2djs/current/nav2d.js"></script>
<script src="https://static.robotwebtools.org/keyboardteleopjs/current/keyboardteleop.min.js"></script>

<script>
  /**
   * Setup all visualization elements when the page is loaded. 
   */
  function init() {
    // Connect to ROS.
    var ros = new ROSLIB.Ros({
      url : 'ws://172.20.10.3:9090'
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
        image : 'turtlebot.png'
    });
     
  }
</script>
</head>

<body onload="init()">
  <h1>Navigation</h1>
  <div id="nav"><p></p></div>
  <p><img src="junia.png" alt="junia"></p>
</body>
</html>
