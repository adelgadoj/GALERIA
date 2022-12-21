<?php
// Conexión a la base de datos
$host = "192.168.1.7:3307";
$user = "user_prueba";
$password = "123456";
$database = "galeria";
$conn = mysqli_connect($host, $user, $password, $database);

// Comprobar si la conexión ha fallado
if (mysqli_connect_errno()) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Comprobar si se ha enviado una imagen
if (isset($_FILES["image"])) {
    // Recibir datos de la imagen
    $image = $_FILES["image"];
    $name = $image["name"];
    $size = $image["size"];
    $type = $image["type"];
    $tmp_name = $image["tmp_name"];

    // Validar datos de la imagen
    if ($name && $size && $type && $tmp_name) {
        // Subir imagen al servidor
        move_uploaded_file($tmp_name, "imagenes/".$name);

        // Insertar datos de la imagen en la base de datos
        $query = "INSERT INTO images (name, size, type, location) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        $location = "imagenes/$name";
        $stmt->bind_param("siss", $name, $size, $type, $location);
        $stmt->execute();

        // Mostrar mensaje de éxito
        //echo "Imagen subida con éxito";
        echo "<script>
            window.location.href = 'index.php';
            </script>";
    }
}
// Cerrar conexión a la base de datos
$stmt->close();
$conn->close();