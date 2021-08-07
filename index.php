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

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="scripts/script.js"></script>
</head>
<body>
    <div>Inserción de datos</div><br>
    <form action="procesar.php" method="post">
        Nombre de la pelicula: <input type="text" name="nombre"><br>
        <input type="submit" value="Enviar">
    </form>
    <div>Ver datos</div> 
<?php
 	$sql = "SELECT * from peliculas";
    $result = sqlsrv_query($conn, $sql);
	while ($mostrar = sqlsrv_fetch_array($result)) {
            ?>
                    <h><?php echo $mostrar['id'] ?></h>
                    <h><?php echo $mostrar['nombre'] ?></h>
                    <form method="post" action="edit.php">
                    <button type="submit" name="id" value="<?php echo $mostrar['id'] ?>">Editar </button>
                    Nombre de la pelicula: <input type="text" name="nombre">
    </form>
                    <form method="post" action="borrar.php">
                    <button type="submit" name="id" value="<?php echo $mostrar['id'] ?>">Borrar </button>
    </form>
		    <hr>              
            <?php
            }
            ?>
</body>
</html>