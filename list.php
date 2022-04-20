<?php
$nom = $_POST["map"];
$cmd ="roslaunch turtlebot3_navigation turtlebot3_navigation.launch map_file:=/home/user/Desktop/projet/".$nom;

//$cmd ="roslaunch turtlebot3_navigation turtlebot3_navigation.launch map_file:=/home/user/Desktop/projet/map/ayman.yaml";
$cmd2 = "rosrun robot_pose_publisher robot_pose_publisher";
$term = "gnome-terminal -- ";

//$cmd ="roslaunch turtlebot_stage turtlebot_in_stage.launch".$nom;

function execInBackground($cmd,$term) {
    
    pclose(popen($term . $cmd . " > /dev/null &", "r")); 
}


execInBackground($cmd,$term);
execInBackground($cmd2,$term);

?>


<html>
<body onload="alert('success');">
</body>
</html>

<?php

header('Location: nav.php');

?>
