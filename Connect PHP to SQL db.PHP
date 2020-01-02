
<html>
<head>
  <title>cars Search Results</title>
</head>
<body>
<h1>Cars Search Results</h1>
<?php

  @ $db = new mysqli('localhost', 'DatabaseName','kkxner2d', 'DatabasePassword');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "SELECT cars.carid, Customers.customerid FROM cars INNER JOIN Customers ON cars.customerID = Customers.customerid";
 
  $result = $db->query($query);
  
  echo "query errors";
  echo mysqli_errno($db_conn);
  echo '<br />';
  echo mysqli_error($db_conn);

  $num_results = $result->num_rows;

  echo "<p>Number of Cars found: ".$num_results."</p>";

  echo "<table border = '7'>";
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
   
     echo "<TR><TD>";	
     echo htmlspecialchars(stripslashes($row['DateOfPickup']));
     echo "</TD><TD>";
 
     echo stripslashes($row['customerid']);
     
     echo "</TD><TD>";
     echo stripslashes($row['name']);

     echo "</TD><TD>";
     echo stripslashes($row['manufacturer']);
     
     echo "</TD></TR>";
  }
  echo "</TABLE>";
  $result->free();
  $db->close();

?>
</body>
</html>
