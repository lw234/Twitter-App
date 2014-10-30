<?php
//The function display record from csv file in table format
class DisplayRecord {
		
		
	public static function print_user_timeline($string){ 
				
		$table .= "<h1> Twiiter Timeline</h1>";
		$table .= "<table border = 2>";
		$table .= "
				<tr>
					<th>Screen name</th>
					<th>Tweet</th>
					<th>Time and Date of Tweet</th>
					<th>Tweeted by</th>
					
				</tr>
			
			";
				
			foreach($string as $items)
    		{
    			$table .="<tr>";
				$table .= "<td>". $items['user']['screen_name']. "</td>";
				$table .= "<td>". $items['text']. "</td>";
				$table .= "<td>". $items['created_at']. "</td>";
				$table .= "<td>". $items['user']['name']. "</td>";
				$table .="</tr>";
		   }
						
			
			$table .= "</table>";
			echo $table;

		}
			
	public static function printPost($string){ 
				
		//$table .= "<h1>Tweet Post</h1>";
		//$table .= "<table border = 2>";
		//$table .= "
			//	<tr>
				//	<th>Message</th>
		
			//	</tr>
			
			//";
				
			if (!empty($string))
    		{
    			echo '<h3>Status Update</h3>';
			}
						
			
			//$table .= "</table>";
			//echo $table;

		}		
			
			
	}


?>