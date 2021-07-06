<?php 
    session_start();
    $rut = $_SESSION['current_user'];
?>


<?php include('../templates/header.html');  

$query = "SELECT * from usuarios where rut = '$rut' ";
$result = $db2 -> prepare($query);
$result -> execute();
$info_ = $result -> fetchAll();
$info = $info_[0]

 ?>
<body>

<section class="hero notification is-fullheight">
    <div class="m-5" align="center">

        <div class="tile is-ancestor">
            <div class="tile is-parent is-vertical">
                <div class="tile is-child is-6 m-6" align="center">
                    <h3 class="title is-3">
                        Editar mi Perfil
                    </h3>
                    <p class="subtitle is-4">
                        Ingresa los datos que desees cambiar y deja en blanco los que no!
                    </p>
                </div>
                <div class="tile is-child box m-6">
                    <form align="center" action="validacion_edit.php" method="post">
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input" type="text" placeholder="Ingresa tu rut" name="rut">
                                </p>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <input class="input" type="text" placeholder="Ingresa tu contraseña" name="contraseña">
                                </p>
                            </div>
                        </div>
                        <br/><br/>
                        <input class="button is-danger" type="submit" value="Ingresar" >
                    </form>
               </div>
            </div>
        </div>
    </div>
<?php include('../templates/footer.html'); ?>