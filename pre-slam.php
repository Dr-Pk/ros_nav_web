<?php

//$cmd ="roslaunch turtlebot3_slam turtlebot3_slam";
$term = "gnome-terminal -- ";
$cmd ="roslaunch turtlebot_stage turtlebot_in_stage.launch";
$cmd2 ="rosrun robot_pose_publisher robot_pose_publisher";
function execInBackground($cmd) {
    global $result;
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
	
        exec($term . $cmd . " > /dev/null &");  
    }
}


execInBackground($cmd);
execInBackground($cmd2);

?>


<html>
<body onload="alert('success');">
</body>
</html>

<?php
header('Location: slam.php');
?>