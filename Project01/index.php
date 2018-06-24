<html>
<body>

<?php
define ("SOT", 5);

function showtable($at, $start, $size=SOT)
{
	echo "<table border=1><tr><th>CWID</th><th>First Name Middle Name</th><th>Last Name</th></tr>";
	for($i=$start; $i<$start+$size;$i++)
	{
		list($id,$fn,$ln) = explode(",", $at[$i]);
		echo "<tr><td>$id</td><td>$ln</td><td>$fn</td></tr>";
	}
	echo "</table><p>";
}

$students = fopen("classlist.txt", "r");
sort($students);
$n = sizeof($students);

for($i=0; $i<$n; $i=$i+SOT)
{
	if($i+SOT<=$n) showtable($students, $i);
	else showtable($students, $i, $n-$i);
}

?>
</body>
</html>
