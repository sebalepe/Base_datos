<?php include('../templates/header.html');   ?>
<body>


<div align="center">
  <form align="center" action="validacion_ingreso.php" method="post">
    <div class="field-body">
        <div class="field">
            <p class="control">
                <input class="input" type="text" placeholder="Ingresa tu nombre" name="rut">
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



<?php include('../templates/footer.html'); ?>