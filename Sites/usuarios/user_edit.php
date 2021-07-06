
<?php include('../templates/header.html'); ?>
<body>

<section class="hero notification is-fullheight">
    <div class="m-5" align="center">

        <div class="tile is-ancestor">
            <div class="tile is-parent is-vertical" align="center">
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
                        <p>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Ingresa tu contraseña anterior" 
                                        name="old_contraseña">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Ingresa tu contraseña nueva" 
                                        name="new_contraseña">
                                    </p>
                                </div>
                            </div>
                        </p><br><br>
                        <p>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Ingresa tu direccion" name="direccion">
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" placeholder="Ingresa tu comuna" name="comuna">
                                    </p>
                                </div>
                            </div>
                        </p>
                        <br/><br/>
                        <input class="button is-danger" type="submit" value="Cambiar datos" >
                    </form>
               </div>
            </div>
        </div>
    </div>




<?php include('../templates/footer.html'); ?>