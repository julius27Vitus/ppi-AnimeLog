<?php 
require_once "model/Anime.php";
if(isset($_GET["id"])){
    $anime = Anime::getPorId($_GET["id"]);
}
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
    <title>AnimeLog - registrar anime</title>
</head>

<body>
    <div id="content-form-page">    
        <header>
            <h1 id="title">AnimeLog</h1>
            <nav>
                <ul>
                    <li>
                        <a href="">Registrar</a>
                    </li>
                    <li>
                        <a href="catalogo.php">Catálogo</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2 class="form-title">Registrar um anime</h2>
                    </div>
                    <div class="card-body">
                        <form onsubmit="validation(event, this)" action="ws/salvar-anime.php" method="post" enctype="multipart/form-data">
                           
                            <input type="text" name="nomeAnime" class="form-control" id="name" placeholder="Nome do anime"
                                minlength="5" maxlength="20" required autofocus 
                                value="<?= isset($anime)? $anime->getNomeAnime() : '';?>">
                            <input type="text" name="nomeAutor" class="form-control" id="author" placeholder="Autor do anime"
                                minlength="5" maxlength="20" required value="<?= isset($anime)? $anime->getNomeAutor() : '';?>">
                            <input type="text" name="estudio" class="form-control" id="studio" placeholder="Estúdio do anime"
                                minlength="1" maxlength="15" required value="<?= isset($anime)? $anime->getEstudio() : '';?>">
                            <div class="form-row">
                                <div class="col">
                                    <input type="number" name="numeroEpisodios" class="form-control" id="episodes"
                                        placeholder="Número de episódios" min="1" required 
                                        value="<?= isset($anime)? $anime->getNumeroEpisodios() : '';?>">
                                </div>
                                <div class="col">
                                    <input type="number" name="duracaoEpisodios" class="form-control" id="ep-time"
                                        placeholder="Duração dos episódios (em minutos)" min="5" max="60" required 
                                        value="<?= isset($anime)? $anime->getDuracaoEpisodios() : '';?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <select class="custom-select" name="status" id="status" value="<?= isset($anime)? $anime->getStatus() : '';?>">
                                        <option selected>Status</option>
                                        <option value="em lançamento">Em lançamento</option>
                                        <option value="finalizado">Finalizado</option>
                                        <option value="hiato">Hiato</option>
                                        <option value="cancelado">Cancelado</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cover" name="capa" required 
                                        value="<?= isset($anime)? $anime->getCapa() : '';?>">
                                        <label class="custom-file-label" for="cover">Escolha uma capa</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="category-title">Gênero(s)</span>
                                <div class="form-row" value="<?= isset($anime)? $anime->getGeneros() : '';?>">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox d-i">
                                            <input type="checkbox" class="custom-control-input d-inline" id="customCheck1"
                                                name="romance">
                                            <label class="custom-control-label" for="customCheck1">Romance</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2"
                                                name="scifi">
                                            <label class="custom-control-label" for="customCheck2">Sci-fi</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3"
                                                name="acao">
                                            <label class="custom-control-label" for="customCheck3">Ação</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4"
                                                name="shounen">
                                            <label class="custom-control-label" for="customCheck4">Shounen</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5"
                                                name="suspense">
                                            <label class="custom-control-label" for="customCheck5">Suspense</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6"
                                                name="comedia">
                                            <label class="custom-control-label" for="customCheck6">Comédia</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7"
                                                name="Fantasia">
                                            <label class="custom-control-label" for="customCheck7">Fantasia</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                            <input type="hidden" name="id" value="<?= isset($anime)? $anime->getId() : '';?>">
                                <input type="submit" class="btn btn-success" value="Registrar">
                                <input type="reset" class="btn btn-danger" value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <h4 id="title1">Copyright&copy;2021 todos direitos reservados</h4>
            <ul>
                <li>Professor Marcelo Júnior |</li>
                <li>Bernardo Macedo |</li>
                <li>Felipe Heverson |</li>
                <li>Júlio Vitor |</li>
                <li>Thomas Riandeson</li>
            </ul>
            <h4 id="title2">Links de sites parceiros</h4>
            <ul>
                <li><a href="https://app-especiaisnba.herokuapp.com/">Especiais NBA </a>|</li>
                <li><a href="http://ressacaliteraria.herokuapp.com/">Ressaca literária </a>|</li>
                <li><a href="https://ppi-projeto-4bi.herokuapp.com/">Catálogo de livros</a></li>
            </ul>
        </footer>
    </div>
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
    <script src="js/form.js"></script>
</body>

</html>