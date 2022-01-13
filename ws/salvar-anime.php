<pre>
    <?php
    
    require_once "../model/Anime.php";
    
    

    print_r($_POST);
    var_dump($_FILES);
    var_dump($_POST);

    $novoAnime = new Anime();

    $novoAnime->setNomeAnime($_POST["nomeAnime"]);
    $novoAnime->setNomeAutor($_POST["nomeAutor"]);
    $novoAnime->setEstudio($_POST["estudio"]);
    $novoAnime->setNumeroEpisodios($_POST["numeroEpisodios"]);
    $novoAnime->setDuracaoEpisodios($_POST["duracaoEpisodios"]);
    $novoAnime->setStatus($_POST["status"]);
    
    //enviando a imagem
    if(!$_FILES["capa"]["error"] == 0 ){
        echo "Deu erro ao enviar o arquivo";
    }else{

        if($_FILES["capa"]["size"] <= 16777216){
            
            $pasta = "../arquivos/";
            $nome = uniqid();
            $extensao = strtolower(pathinfo($_FILES["capa"]["name"],PATHINFO_EXTENSION));
            $caminho = $pasta . $nome .".".$extensao;
            print_r ($caminho);
            if(!$extensao == "jpeg" || !$extensao == "png"){
                echo "tipo de arquivo diferente de .png ou .jpeg";
            }else{
                $deu_certo = move_uploaded_file($_FILES['capa']['tmp_name'],$caminho);
                if($deu_certo == false){
                    echo "Deu erro ao enviar o arquivo no modulo final";
                }else{
                    //echo "<p>Deu certo enviar o arquivo -  <a href='../arquivos/$nome.$extensao'>Clique aqui<a><p>";

                    //enviando agora para a classe Anime
                    $novoAnime->setCapa($extensao,$caminho);
                }
                
            }

        }else{
            echo "arquivo grande demais patrão - Max: 16MB";
        }
    }
    
    //Enviando cada genero separadamente
    if(isset($_POST["romance"])){
        $novoAnime->setGeneros("romance");
    }
    if(isset($_POST["scifi"])){
        $novoAnime->setGeneros("scifi");
    }
    if(isset($_POST["acao"])){
        $novoAnime->setGeneros("ação");
    }
    if(isset($_POST["shounen"])){
        $novoAnime->setGeneros("shounen");
    }
    if(isset($_POST["suspense"])){
        $novoAnime->setGeneros("suspense");
    }
    if(isset($_POST["comedia"])){
        $novoAnime->setGeneros("comedia");
    }
    
    $novoAnime->setId($_POST["id"]);

    var_dump($novoAnime);
    print_r($novoAnime);
    
    if($novoAnime->getId() == ""){
        $novoAnime->salvar();
    }
    else{
        $novoAnime->editar();
    }
    header("Location: ../catalogo.php");
    ?>
</pre>