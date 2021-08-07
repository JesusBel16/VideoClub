<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:serverpruebavideoclub.database.windows.net,1433; Database = EjemploPelis", "Jesus1632", "Pass.1632");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$connectionInfo = array("UID" => "Jesus1632", "pwd" => "Pass.1632", "Database" => "EjemploPelis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:serverpruebavideoclub.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
<?php
    $sql = "delete from peliculas where id=".$_POST['id'];
    $salida = sqlsrv_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="post" action="index.php">
 <input type="submit" value="Regresar!">
</form>
</body>
</html>