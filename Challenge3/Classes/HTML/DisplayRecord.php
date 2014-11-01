<?php
namespace Classes\HTML;   
 
class DisplayRecord {

	public static function print_user_timeline($string){ 
				
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
				
		
		echo "<table border = 2>";
		echo "
				<tr>
					<th>Status Update</th>
		
				</tr>
			
			";
				
			if (!empty($string))
    		{
    			echo"<td>Status successfully update</td>";
			}
			//Close the table 		
			echo "</table>";

		}	
		public static function printFollowerslist($string){
			
			$table .= "<table border = 2>";
			$table .= "
				<tr>
					<th>Name</th>
					<th>Screen Name</th>
				</tr>
			
			";	
				foreach($string['users'] as $item){
					$table .= '<td>' . $item['name'] . '</td>';
					$table .= '<td>' . $item['screen_name'] . '</td></tr>';
				}
				$table .= '</table></div>';
				echo $table;			
		}
			
			
	}


?>