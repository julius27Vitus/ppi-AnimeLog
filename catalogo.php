<?php 
require_once "model/Anime.php";
?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="js/confirmar.js"></script>
  <title>AnimeLog - registrar anime</title>
</head>

<body>
  
    <header>
      <h1 id="title">AnimeLog</h1>
      <nav>
        <ul>
          <li>
            <a href="index.php">Registrar</a>
          </li>
          <li>
            <a href="">Catálogo</a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="text-center" id="body-main" >
            <?php 
            $animes = Anime::listarTodos();
            //var_dump($animes);
            foreach($animes as $a):
            ?>
        <div class="card card-w d-inline-block m-2 text-left">
            <div class="card-body">
              <figure class="mx-auto text-center">
                <img src="<?=$a->getCapaCaminho(); ?>" alt="Capa do Anime">
              </figure>
                  <h4 class="card-title text-center">
                      <?php 
                      echo $a->getNomeAnime();
                      ?>
                  </h4>
                  <p class = "card-subtitle">
                    Nome do Autor:
                      <?= $a->getNomeAutor(); ?>
                  </p>
                  <p class="card-text">
                    Estúdio:
                      <?= $a->getEstudio(); ?>
                  </p>
                  <p class="card-text">
                    Número de Episódios:
                      <?= $a->getNumeroEpisodios(); ?>
                  </p>
                  <p class="card-text">
                    Duração dos Episódios:
                      <?= $a->getDuracaoEpisodios(); ?>
                  </p>
                  <p class="card-text">
                    Status:
                      <?= $a->getStatus(); ?>
                  </p>
                  <p class="card-text">
                    Gêneros:
                      <?= $a->getGeneros(); ?>
                  </p>
                  <a href="index.php?id=<?= $a->getId();?>" class="card-link">Editar</a>
                  <a href="ws/deletar-anime.php?id=<?= $a->getId();?>" class="card-link" onclick ="confirma(this);">Deletar</a>
              </div>
            </div>
        <?php 
        endforeach;
        ?>
    </main>

    <footer  id="corpo">
      <h4 id="title1">Copyright&copy;2021 todos direitos reservados</h4>
      <ul>
        <li>Professor Marcelo Júnior |</li>
        <li>Bernardo Macedo |</li>
        <li>Felipe Heverson |</li>
        <li>Júlio Vitor |</li>
        <li>Thomas Riandeson</li>
      </ul>
    </footer>
  
  <div class="modal" tabindex="-1" id="info-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title-modal">Confirmação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="info-text"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-close-modal">Continuar</button>
        </div>
      </div>
    </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
   <script src="js/bootstrap.min.js"></script>
      
  
</body>

</html>