<HTML>
    <HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")	//Check it is coming from a form
    {
        require_once 'login.php';				//mysql credentials

	    //delcare PHP variables
	    $password = $_POST["password"];
	    $companyName = $_POST["companyName"];			//The values in the $_POST must match the names given from the HTML document
	    $modelName = $_POST["modelName"];
	    $year = $_POST["year"];
	    
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if ($mysqli->connect_error) 
            {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	        }   
        if ($_POST['companyName']!= "")
            {
                
	
		$statement = $mysqli->prepare("UPDATE model SET modelName= ?, year=? WHERE password = ?"); //prepare sql insert query - thank you(https://stackoverflow.com/questions/6514649/php-mysql-bind-param-how-to-prepare-statement-for-update-query)
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssss', $companyName, $modelName, $year, $password); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("You have updated "." ". $companyName . "'s information to;\r\n Model " . $modelName." ". $year ."th year.", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
                
            }
        echo"Hi";
    }
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form></body>";
?>