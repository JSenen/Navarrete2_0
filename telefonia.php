<?php
  include('./view/header.php');
  
// crear el nuevo formulario de nuevo registro
function renderForm($etiqueta, $extension, $ubicacion, $numserie, $error)
{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Nuevo Registro</title>
    </head>
    <body>
    <?php
    // Si hay errores, los muestra en pantalla
    if ($error != '') {
        echo '<div style="padding:4px; border:1px solid red;color:#ff0000;">' . $error . '</div>';
    }
  
    ?>
    <main class="container admin" id="content">
        <form class="narrow" action="" method="post">
            <div class="form-group">
                <label for="name">Etiqueta TF: </label>
                <input type="text" name="etiqueta" value="<?php echo $etiqueta; ?>" class="form-control" oninput="this.value = this.value.toUpperCase()"/>
            </div>
            <div class="form-group">
                <label for="name">Extension: </label>
                <input type="text" name="extension" value="<?php echo $extension; ?>" class="form-control" oninput="this.value = this.value.toUpperCase()"/>
            </div>
            <div class="form-group">
                <label for="name">Ubicacion TF: </label>
                <input type="text" name="ubicacion" value="<?php echo $ubicacion; ?>" class="form-control" oninput="this.value = this.value.toUpperCase()"/>
            </div>
            <div class="form-group">
                <label for="name">Número de Serie: <label>
                <input type="text" name="numserie" value="<?php echo $numserie; ?>" class="form-control" oninput="this.value = this.value.toUpperCase()"/>
            </div>
            
                <input class="btn btn-primary btn-save" type="submit" name="submit" value="GRABAR">
            
        </form>
        <form name="MiForm" id="MiForm" method="post" action="cargar.php" enctype="multipart/form-data">
        <h4 class="text-center">Seleccione imagen a cargar</h4>
        <div class="form-group">
          <label class="col-sm-2 control-label">Archivos</label>
          <div class="col-sm-8">
            <input type="file" class="form-control" id="image" name="image" multiple>
          </div>
          <input class="btn btn-primary btn-save" type="submit" name="submitimagen" value="GRABAR">
        </div>
      </form>
     </main>
    </body>
    </html>
    
    <?php
}

// conectar a la base de datos
include('./model/connect-db.php');

// Comprueba si el formulario ha sido enviado.
// Si se ha enviado, comienza el proceso el formulario y guarda los datos en la DB
if (isset($_POST['submit'])) {
// Obtenemos los datos del formulario, asegur�ndonos que son v�lidos.
    $etiqueta = htmlspecialchars($_POST['etiqueta']);
    $extension = htmlspecialchars($_POST['extension']);
    $ubicacion = htmlspecialchars($_POST['ubicacion']);
    $numserie = htmlspecialchars($_POST['numserie']);
//Convertimos todos los datos a mayusculas
    $etiqueta = strtoupper($etiqueta);
    $extension = strtoupper($extension);
    $ubicacion = strtoupper($ubiacion);
    $numserie = strtoupper($numserie);
// Comprueba que ambos campos han sido introducidos
   if ($etiqueta == '' ) {
// Genera el mensaje de error
        $error = 'ERROR: Por favor, introduce la etiqueta.!';
// Si ning�n campo est� en blanco, muestra el formulario otra vez
        renderForm($etiqueta, $extension, $ubicacion, $numserie, $error);
    } else {
// guardamos los datos en la base de datos
        try {
            $stmt = $dbh->prepare("INSERT INTO phones (etiqueta_tf, extension_tf, ubicacion_tf, serialnumber_tf) VALUES (:etiqueta,:extension, :ubicacion, :serialnumber)");
            $stmt->bindParam(':etiqueta', $_POST['etiqueta'], PDO::PARAM_STR);
            $stmt->bindParam(':extension', $_POST['extension'], PDO::PARAM_STR);
            $stmt->bindParam(':ubicacion', $_POST['ubicacion'], PDO::PARAM_STR);
            $stmt->bindParam(':serialnumber', $_POST['serialnumber'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        /* Una vez que han sido guardados, redirigimos a la p�gina de vista principal*/
        header("Location: telefonia.php");
    }
} else // Si el formulario no han sido enviado, muestra el formulario
{
    renderForm('', '', '', '', '');
}
include ('./view/footer.php');
?>