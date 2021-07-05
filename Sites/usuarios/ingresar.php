<?php include('../templates/header.html');   ?>
<body>


<div class="m-5" align="center">
  <form align="center" action="validacion_ingreso.php" method="post">
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



<?php include('../templates/footer.html'); ?>