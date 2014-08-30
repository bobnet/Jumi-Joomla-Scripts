<?php
# bob@bobnet.co.uk
$my_prefix ="j_";
defined('_JEXEC') OR defined('_VALID_MOS') OR die( "Direct Access Is Not Allowed" );
mysql_connect("host","username","password");
$count=0;
$query = "SELECT title, id, alias, metadesc, access FROM " . $my_prefix . "content WHERE state=1 AND access=1 ORDER BY catid, title";
	
$result = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.n<br />Query: " . $query . "<br />nError: (" . mysql_errno() . ") " . mysql_error());

echo "<table>
<tr>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>";

while($row = mysql_fetch_row($result))
  {
  if ($row[1] != 28) {

  $name_fangled = str_replace(" ","&nbsp;",$row[0]);
  echo "<tr>";
  echo "<td><a href='/index.php/" . $row[1] . "-" . $row[2] ."'>" . $name_fangled . "</a></td>";
  echo "<td>&nbsp;</td>";
  echo "<td>" . html_entity_decode ($row[3] ). "</td>";
  echo "</tr>";
  $count = $count + 1;
  }
  }

echo "</table><br><br>Number of pages: " . $count;

mysql_close($con);
echo "<br>" . $Aname;
?>
