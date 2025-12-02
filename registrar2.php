<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion2.php");

if (isset($_POST['registrar2']) &&
    !empty(trim($_POST['NOMBRE'])) &&
    !empty(trim($_POST['APPATERNO'])) &&
    !empty(trim($_POST['APMATERNO'])) &&
    !empty(trim($_POST['LOCALIDAD'])) &&
    !empty(trim($_POST['MUNICIPIO']))) {

    $nombre = mysqli_real_escape_string($conexion, trim($_POST['NOMBRE']));
    $appaterno = mysqli_real_escape_string($conexion, trim($_POST['APPATERNO']));
    $apmaterno = mysqli_real_escape_string($conexion, trim($_POST['APMATERNO']));
    $localidad = mysqli_real_escape_string($conexion, trim($_POST['LOCALIDAD']));
    $municipio = mysqli_real_escape_string($conexion, trim($_POST['MUNICIPIO']));

    $maestra_consulta = "INSERT INTO visitas(NOMBRE, APPATERNO, APMATERNO, LOCALIDAD, MUNICIPIO)
                         VALUES ('$nombre', '$appaterno', '$apmaterno', '$localidad', '$municipio')";

    $maestra_resultado = mysqli_query($conexion, $maestra_consulta);

    if ($maestra_resultado) {
        echo "<h3 class='correctomaestra'>* VISITANTE REGISTRADO *</h3>";
    } else {
        echo "<h3 class='incorrectomaestra'>* INTENTE NUEVAMENTE *</h3>";
        echo "Error: " . mysqli_error($conexion);
    }
} else {
    echo "<h3 class='incorrectomaestra'>* IMPORTANTE: DEBE COMPLEMENTAR TODOS LOS DATOS *</h3>";
}
?>
