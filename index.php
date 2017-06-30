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
      
//                   "define('DB_NAME',          '", {"Ref" : "DBName"}, "');\n",
//                   "define('DB_USER',          '", {"Ref" : "DBUsername"}, "');\n",
//                   "define('DB_PASSWORD',      '", {"Ref" : "DBPassword" }, "');\n",
//                   "define('DB_HOST',          '", {"Fn::GetAtt" : ["MySQLDatabase", "Endpoint.Address"]},"');\n",

      echo "gethostname = ".gethostname(). "<br />";

      print "Database = " . DB_NAME . "<br />";
      
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT)
                      or die("Could not connect: " . mysql_error());
                      
      print ("Connected successfully");

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
