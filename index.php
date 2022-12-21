<!DOCTYPE html>
<html>
<head>
    <title>Subir imagen</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class ="panel">
        <div class="opciones">
            <div class ="formulario_subir">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">SUBIR IMAGEN:</label> <br>
                    <input type="file" name="image" id="image">
                    <br>
                    <input type="submit" class="envia" value="Subir imagen">
                </form>
            </div>
            <div class ="formulario_subir">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">SUBIR IMAGEN:</label> <br>
                    <input type="file" name="image" id="image">
                    <br>
                    <input type="submit" class="envia" value="Subir imagen">
                </form>
            </div>
            <div class ="formulario_subir">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="image">SUBIR IMAGEN:</label> <br>
                    <input type="file" name="image" id="image">
                    <br>
                    <input type="submit" class="envia" value="Subir imagen">
                </form>
            </div>
        </div>
    <?php
    // Conectarse a la base de datos
    $db = mysqli_connect("192.168.1.7:3307", "user_prueba", "123456", "galeria");
    // Consultar todas las imágenes de la base de datos
    $result = mysqli_query($db, "SELECT * FROM images");
    // Recorrer cada imagen y mostrarla en la página web
    echo "<div class='gallery'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='gallery_container'>";
        if ($row['type'] == "image/jpeg" || $row['type'] == "image/png"){
                echo "<div class='gallery_image'>";
                    echo "<img class='imagen' src='".$row['location']."' alt='".$row['name']."'>";
                echo "</div>";
                echo "<div class='gallery_text'>";
                    echo "<div class='text_nombre'>";
                        echo "<h3>".$row['name']."</h3>";
                    echo "</div>";
                echo "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
    ?>
    </div>
</body>
</html>