
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
    </script>
  </body>
</html>
