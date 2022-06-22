<?php
require_once __DIR__ . "/database.php";

// Query per il database

$sql = "SELECT `id`, `name` FROM `departments`;";
$result = $conn->query($sql);

$departments = [];

// Controllo se il risultato c'è, e che non sia vuoto

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $curr_department = new Department($row["id"], $row["name"]);
        $departments[] = $curr_department;
    }
} elseif ($result) {
    // Query andata a buon fine, però non ci sono risultati
} else {
    // Query non andata a buon fine
    echo "Query error";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista dipartimenti</h1>
    <?php foreach ($departments as $department) { ?>
        <div>
            <h2> <?php echo $department->name; ?> </h2>
            <a href=""> Vedi informazioni</a>
        </div>
    <?php } ?>
    ?>
</body>

</html>