
<?php include('templates/header.html');   ?>
<?php include('templates/navbar.html');   ?>


<body>
  <section class="hero is-danger is-fullheight">
    <br>
    <div align="center">
      <img class="image" src='storage/espada1.png' onmouseover="this.src='storage/espada2.png';" onmouseout="this.src='storage/espada1.png';" width="300" height="300" />
    </div>
    <br>
    <br>
    <div class="hero-head">
        <h1 class="title is-1" align="center">CheemsCO </h1>
          <p class='subtitle is-5' style="text-align:center;">
            Donde te gustaria comprar?
          </p>
    </div>
    <div class="hero-body">
          <div class="tile is-ancestor">
            <div class="tile is-parent is-vertical">
              <div align="center" class="tile is-child box">
                <div id="modal" class="modal">
                  <div class="modal-background"></div>
                  <div class="modal-content">
                    <div class="box">
                      <article class="media" >
                          <div class="media-content">       
                            <div class="content">               
                              <p class="title is-6 has-text-black"> Productos Comestibles </p>
                              <p>  Producto Barato 1</p> 
                              <p>  Producto Barato 2</p>  
                              <p>  Producto Barato 3</p>                
                            </div>                 
                          </div> 
                          <div class="media-content">       
                            <div class="content"> 
                              <p class="title is-6 has-text-black"> Productos Toxicos </p>              
                              <p>  Producto Barato 1</p> 
                              <p>  Producto Barato 2</p>  
                              <p>  Producto Barato 3</p>                
                            </div>                 
                          </div>                 
                      </article>                
                    </div>
                    <button class="button is-danger is-small" id="closebtn">Close Modal</button>                
                  </div>                
                  <button class="modal-close is-large" aria-label="close"></button>                
                </div> 

                <button class="button is-danger is-large" id="lanuchModal">Revisa nuestros productos mas baratos (pobre qlo)</button>
              </div>

              <div class="tile is-child box">
                <form align="center" action="" method="post">
                  <div class="field-body">
                      <div class="field">
                          <p class="control">
                              <input class="input" type="text" placeholder="Busca un Producto" name="nombre">
                          </p>
                      </div>
                  </div>
                  <br/><br/>
                  <input class="button is-danger" type="submit" value="Buscar" >
                </form>

                <?php 
              if(isset($_POST['nombre'])){

                echo $_POST['nombre'];

              }

              ?>
              </div>

            <div class="tile is-child box">
                <form align="center" action="" method="post">
                  <div class="field-body">
                      <div class="field">
                          <p class="control">
                              <input class="input" type="text" placeholder="Ingresa un ID" name="id">
                          </p>
                      </div>
                  </div>
                  <br/><br/>
                  <input class="button is-danger" type="submit" value="Consultar Disponibilidad" >
                </form>

                <?php 
              if(isset($_POST['id'])){

                echo $_POST['id'];

              }

              ?>
              </div>


            
              </div>

            </div>  
          </div>
        <br/><br/>
        <br/><br/>
        <br/><br/>
    </div>
  </section>

<script>
$("#test").click(function() {

$(".modal2").addClass("is-active");                 
});

$("#lanuchModal").click(function() {

$(".modal").addClass("is-active");                 
});

$(".modal-close").click(function() {

 $(".modal").removeClass("is-active");               
});

$("#closebtn").click(function() {
 $(".modal").removeClass("is-active");              
});

</script>
</body>
</html>