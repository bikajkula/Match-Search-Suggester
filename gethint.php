<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kladionica";
	$conn = new mysqli($servername, $username, $password,$dbname);
	$sql="SELECT naziv FROM mecevi;";
	$results = mysqli_query($conn,$sql);
	while($rowitem = mysqli_fetch_array($results)) {
		$a[]=$rowitem['naziv'];
	}
$q = $_REQUEST["q"];

$hint = "";
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
		list($prviDeo,$drugiDeo)=explode(" - ",$name);
        if (stristr($q, substr($prviDeo, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
		else if (stristr($q, substr($drugiDeo, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
echo $hint === "" ? "no suggestion" : $hint;
?>
