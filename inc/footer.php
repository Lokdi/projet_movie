
      </div>
    </div>
    <footer>
      <a href="index.php"><img src="./assets/img/btn-reload.png" alt="Plus de films" /></a>
        <p><a href="index.php">Plus de films</a></p>
    </footer>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
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
});


    </script>
  </body>
</html>
