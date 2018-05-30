<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $studentID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM car WHERE password='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $password = $row[0];
        $carName = $row[1];
        $model = $row[2];
        $year = $row[3];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['studentName'].".";
	                    echo "<TABLE><TR><TH>Password</TH><TH>Car Name</TH><TH>Class</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['password']. "</TD><TD>". $row['carName']. "</TD><TD>". $row['model']. "</TD><TD>".$row['year'] ."</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = password value=".$row['password']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='companyName' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='modelName'>";
                        echo "<option value='Sedan' >Sedan</option>";
                        echo "<option value='SUV' >SUV</option>";
                        echo "<option value='Hatchback' >Hatchback</option>";
                        echo "<option value='Convertible' >Convertible</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='year'>";
                        echo "<option value='2015' >2015</option>";
                        echo "<option value='2016' >2016</option>";
                        echo "<option value='2017' >2017</option>";
                        echo "<option value='2018' >2018</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>