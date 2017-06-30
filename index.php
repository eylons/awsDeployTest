<?php include "dbinfo.inc"; ?>
<?php
    error_reporting( E_ALL );
?>
<html>
  <head>
    <title>AWS Deploy assignment</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

  </head>
  <body>
    <h1>AWS Deploy assignment</h1>
    <p/>
    <?php
      // Print out the current data and time
      print "The Current Date and Time is: <br/>";
      print date("g:i A l, F j Y.");
    ?>
    <p/>
    <?php
      
      echo "gethostname = ".gethostname(). "<br />";

      print "Database = " . $Database . "<br />";

      $conn = mysql_connect($Database, $DBUser, $DBPassword)
                      or die("Could not connect: " . mysql_error());
      print ("Connected successfully");
      mysql_close($conn);

      // sql to create table
      $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP
      )";

      if ($conn->query($sql) === TRUE) {
          echo "Table MyGuests created successfully";
      } else {
          echo "Error creating table: " . $conn->error;
      }
    
      $sql = "INSERT INTO MyGuests (firstname, lastname, email)
      VALUES ('John', 'Doe', 'john@example.com')";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      if ($conn->query($sql) === TRUE) {
          $last_id = $conn->insert_id;
          echo "New record created successfully. Last inserted ID is: " . $last_id;
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }

      $conn->close();
 
 
    ?>

  </body>
</html>
