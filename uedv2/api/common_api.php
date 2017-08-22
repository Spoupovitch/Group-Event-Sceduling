<?php // common_api.php, stores the functions for general use on the database

function print_all($query){	
    if(!empty($query)) {
        
        foreach($query as $row){
            foreach($row as $column){
                echo $column;
                echo ", ";
            }
            echo "<br>";
        }
    }
	
}


//returns array for the search result
function parse_result($query){
for($i = 0; $i < @mysql_num_rows($query); $i++){
		for($j = 0; $j < @mysql_num_fields($query); $j++){
			$result[$i][$j] = @mysql_result($query,$i,$j);
			//echo 'row [' . $i . '], column [' . $j . '] = ' . $query[$i][$j];
			//echo "<br>";
		}
	}
	
    if (isset($result)) {
        return $result;
    }
}


?>