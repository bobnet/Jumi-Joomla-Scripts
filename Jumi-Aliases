<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die( "Direct Access Is Not Allowed" );
$my_prefix = "j_";
mysql_connect("host","user","password");
$count = 0;
$query = "SELECT id, title, alias FROM " . $my_prefix . "_jumi WHERE alias != '' ORDER BY id";
$result = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.n<br />Query: " . $query . "<br />nError: (" . mysql_errno() . ") " . mysql_error());
echo "<table><tr><th>&nbsp;</th></tr>";
while($row = mysql_fetch_row($result)) {
  echo "<tr>";
  echo "<td><a href='/index.php/". $row[2] . "'>" . $row[1] . "</a></td>";
  echo "</tr>";
  $count = $count + 1;
}
echo "</table><br>Number of Jumi Aliases: " . $count;
mysql_close($con);
?>
