<html>
    <body>
        <form method="post" action="list.php">


            <label for="map">Map Selection:</label>
		<img class='nav' src='Amine.pgm' alt='slam'>
            <select name="map" id="map">
	        <?php
                $fileList = glob('map/*.yaml');
                foreach($fileList as $filename){
                    if(is_file($filename)){
                        echo "<option value='$filename'> $filename </option>"; 
                    }   
                }
            ?>  
	    <input type="submit" value="OK">  
            </select>
        </form>

	
  
    </body>
</html>
