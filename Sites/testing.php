
<?php include('templates/header.html');   ?>
<?php include('templates/navbar.html');   ?>

<?php $array = [[1,2,3],[4,5,6]];
      $value = 0?>;

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
      
      <div class='tile is-ancestor'>
        <div class='tile is-parent is-vertical'>
          <?php 
            foreach ($array as $lista) {
              echo "
                  <div align='center' class='tile is-child box'>
                    <form align='center' action='' method='post'>
                      <button class='button is-danger' id='lanuchModal' name='algo' type='submit' value='$value'> presiona aqui</button>
                    </form>
                  </div> ";
              $value = $value + 1;
            }
          ?>
        </div>
      </div>

      <div id='modal' class='modal'>
        <div class='modal-background'></div>
        <div class='modal-content'>
          <div class='box'>
            <article class='media' >
                <div class='media-content'>       
                  <div class='content'>               
                    <p class='title is-6 has-text-black'> Info </p>
                        <?php 
                          if(isset($_POST['algo'])){

                            echo $_POST['algo'];
                          }
                        ?>     
                  </div>                 
                </div>              
            </article>                
          </div>
          <button class='button is-danger is-small' id='closebtn'>Close Modal</button>                
        </div>                
        <button class='modal-close is-large' aria-label='close'></button>                
      </div>


    </div>

    </div>
  </section>


<script>


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