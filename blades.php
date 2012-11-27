<?php

require "config.php"; // Your Database details 

$sql = "SELECT make, model, (CONCAT(from_year,' - ',to_year)) as year, driver, passenger
 FROM blade_guide ORDER BY make";
$result = mysql_query($sql, $conn);
if (!$result) {
  echo "Unable to execute query <br>";
  echo "Error " . mysql_errno() . " - " . mysql_error();
  exit;
}

$numrows = mysql_num_rows($result);
$numcols = mysql_num_fields($result);

echo "<table border=1>\n";
while ($data = mysql_fetch_array($result)) {
  echo "<tr>";
  for ($i=0; $i<$numcols; $i++) {
    echo "<td>" . $data[$i] . "</td>\n";
  }
  echo "</tr>\n";
}
echo "</table>\n";

?>