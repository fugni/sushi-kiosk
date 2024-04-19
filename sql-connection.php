<?php

// credentials for database
include 'sql-credentials.php';

$conn = new mysqli($host, $username, $password, $dbname);

unset($host);
unset($username);
unset($password);
unset($dbname);

$sql = "SELECT * FROM sushi";
$result = $conn->query($sql);

$sushi = array();
$voordeel = array();
$pokebowl = array();
$dranken = array();

foreach ($result as $row) {
    switch ($row["Type"]) {
        case "sushi":
            array_push($sushi, $row);
            break;
        case "voordeel":
            array_push($voordeel, $row);
            break;
        case "pokebowl":
            array_push($pokebowl, $row);
            break;
        case "dranken":
            array_push($dranken, $row);
            break;
    }
};
?>

<script>
<?php 
echo "var sushi = " . json_encode($sushi) . ";";
echo "var voordeel = " . json_encode($voordeel) . ";";
echo "var pokebowl = " . json_encode($pokebowl) . ";";
echo "var dranken = " . json_encode($dranken) . ";";
?>
</script>

