
      </div>
    </div>
    <footer>
      <a href="index.php"><img src="./assets/img/btn-reload.png" alt="Plus de films" /></a>
        <p><a href="index.php">Plus de films</a></p>
    </footer>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="assets/js/main.js">
    var btn = document.querySelector('input');
    var txt = document.querySelector('p');

    btn.addEventListener('click', updateBtn);

    function updateBtn() {
        if (btn.value === 'Démarrer la machine') {
            btn.value = 'Arrêter la machine';
            txt.textContent = 'La machine est démarrée !';
        } else {
            btn.value = 'Démarrer la machine';
            txt.textContent = 'La machine est arrêtée.';
        }
    }



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

    $( ".nohidden" ).click(function() {
      $( ".hidden" ).toggle( "slow" );
    });

    });



    </script>
  </body>
</html>
