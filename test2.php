<?php

$term = "gnome-terminal -- ";
$cmd ="roslaunch turtlebot_stage turtlebot_in_stage.launch";

global $process;

function execInBackground($cmd,$term) {
        $process = popen($term . $cmd . " > /dev/null &", "r");
        pclose($process);
}


execInBackground($cmd,$term);

sleep(10);
$test = exec("exit");
echo "$test";



?>


<html>
<body onload="alert('success');">
</body>
</html>