<?php include('../templates/header.html');   ?>
<body>

<section class="hero notification is-fullheight">
    <div class="m-5" align="center">

        <div class="tile is-ancestor">
            <div class="tile is-parent is-vertical">
                <div class="tile is-child is-6 m-6" align="center">
                    <h3 class="title is-3">
                        Registrate en nuestra página! 
                    </h3>
                    <p class="subtitle is-4">
                        Ingresa tus datos!
                    </p>
                </div>
                <div class="tile is-child box m-6">
                    <form align="center" action="validacion_registro.php" method="post">
                        <div class="field-body" style="display: block;">
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="[A-Za-z0-9]{1,20}" class="input" type="text" placeholder="Ingresa tu nombre" name="nombre">
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="^\d{7,8}[-][0-9kK]{1}$" class="input" type="text" placeholder="Ingresa tu rut" name="rut">
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="[A-Za-z0-9]{1,20}" class="input" type="text" placeholder="Ingresa tu edad" name="edad">
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="[A-Za-z0-9]{1,20}" class="input" type="text" placeholder="Ingresa tu dirección" name="direccion">
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="[A-Za-z0-9]{1,20}" class="input" type="text" placeholder="Ingresa el nombre de tu comuna (sin mayúsculas)" name="comuna">
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <input required="required" pattern="[A-Za-z0-9]{1,20}" class="input" type="text" placeholder="Ingresa tu contraseña" name="contraseña">
                                </p>
                            </div>
                            <br>
                            <div class="select">
                                <select name="sexo" id="cars">
                                    <option disabled="" selected="">Sexoooooooo ;) </option>
                                    <option> h</option>
                                    <option> m</option>
                                </select>
                            </div>
                        </div>
                        <br/><br/>
                        <input class="button is-danger" type="submit" value="Registrarse" >
                    </form>
               </div>
            </div>
        </div>
    </div>
<?php include('../templates/footer.html'); ?>