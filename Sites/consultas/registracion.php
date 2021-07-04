<?php include('../templates/header.html');   ?>
<body>


<div align="center">
  <form align="center" action="validacion_registro.php" method="post">
    <div class="field-body">
        <div class="field">
            <p class="control">
                <input class="input" type="text" placeholder="Ingresa tu nombre" name="nombre">
            </p>
        </div>
    </div>
    <br/><br/>
    <input class="button is-danger" type="submit" value="Buscar" >
  </form>
</div>



<?php include('../templates/footer.html'); ?>