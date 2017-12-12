
      </div>
    </div>
    <footer>
      <?php if (isOnPage('index.php')): // on affiche le bouton "plus de films" uniquement sur la page d'accueil ?>
      <a href="index.php"><img src="./assets/img/btn-reload.png" alt="Plus de films" /></a>
        <p><a href="index.php">Plus de films</a></p>
      <?php endif; ?>
    </footer>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.barrating.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="jquery.star-rating-svg.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script type="text/javascript" src="assets/js/rating.js"></script> -->


    <!-- // var btn = document.querySelector('input');
    // var txt = document.querySelector('p');
    //
    // btn.addEventListener('click', updateBtn);
    //
    // function updateBtn() {
    //     if (btn.value === 'Démarrer la machine') {
    //         btn.value = 'Arrêter la machine';
    //         txt.textContent = 'La machine est démarrée !';
    //     } else {
    //         btn.value = 'Démarrer la machine';
    //         txt.textContent = 'La machine est arrêtée.';
    //     }

    // }

    // } -->



<script type="text/javascript">


    $( document ).ready(function() {
        console.log( "ready!" );
    $("#tab1 #checkAll").click(function () {
      if ($("#tab1 #checkAll").is(':checked')) {
          $("#tab1 input[type=checkbox]").each(function () {
              $(this).prop("checked", true);
          });

      } else {
          $("#tab1 input[type=checkbox]").each(function () {
              $(this).prop("checked", false);
          });
      }
    });

    $( "#btnFiltres" ).click(function() {
      $( "#formFiltrage" ).toggle( "slow", function() { // Animation complete.
      });
    });

    $(".my-rating-8").starRating({
      useFullStars: true,
      initialRating: 0,
      totalStars:10,
      disableAfterRate: false,
      strokeColor: '#894A00',
      strokeWidth: 10,
      starSize: 25,
      onHover: function(currentIndex, currentRating, $el){
      $('#rating').val(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('#rating').val(currentRating);
    }
    });

    });

  $('#checkbox[]').multiselect({
      includeSelectAllOption: true,
      onSelectAll: function() {
          alert('onSelectAll triggered!');
      }
  });

    </script>
  </body>
</html>
