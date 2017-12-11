<?php
include('conf.php');
include('inc/pdo.php');
include('inc/fonctions.php');




include('inc/header.php'); ?>

    <form>
      <input class="liensFilms" type="button" value="film à retirer">
    </form>

    <table class="table table-striped">

      <thead>
        <tr>
          <th scope="col">Auteur</th>
          <th scope="col">Title</th>
          <th scope="col">Created_at</th>
          <th scope="col">voir l'article</th>
        </tr>
      </thead>
      <tbody>

    <?php foreach ($articles as $article): ?>

        <tr>
          <td><?php echo $article['auteur']; ?></td>
          <td><?php echo $article['title']; ?></td>
          <td><?php echo $article['created_at']; ?></td>
          <td><a href="single.php?id=<?php echo $article['id']; ?>">Détails</a></td>
        </tr>

    <?php endforeach; ?>
        </tbody>
    </table>

<?php
include('inc/footer.php');
