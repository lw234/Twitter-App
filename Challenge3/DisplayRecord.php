<?php
//The function display record from csv file in table format
class DisplayRecord {
		
				public static $User_timeline = "'Time and Date of Tweet','Tweet','Tweeted By','Screen name' ";
		
			public static function print_user_timeline($string){ 
			echo "<table border = 1 bordercolor= black cellspacing=0 cellpadding=5 style='font-size:14pt'>";
			echo "<tr>";
			
			//foreach ($record as $key => $value) {

				//echo "<th>$key</th>";
				//echo "<td>$value</td>";
		foreach($string as $items)
    {
        echo "Time and Date of Tweet:".$items['created_at']."<br />"; 
        echo "Tweet:". $items['text']."<br />"; 
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }
						
				echo "</tr>";

			

			echo "</table>";

		}
			
			
			
			
	}


?>