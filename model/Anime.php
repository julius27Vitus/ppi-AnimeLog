<?php 
require_once "conexao.php";

class Anime{
    private $id;
    private $nomeAnime;
    private $nomeAutor;
    private $estudio;
    private $numeroEpisodios;
    private $duracaoEpisodios;
    private $status;
    private $capa = array("tipo"=>"","pasta"=>"");
    private $generos = array();
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
}
    public function getNomeAnime(){
        return $this->nomeAnime;
    }
    public function setNomeAnime($nomeAnime){
        $this->nomeAnime = $nomeAnime;
        return $this;
    }
    public function getNomeAutor(){
        return $this->nomeAutor;
    }
    public function setNomeAutor($nomeAutor){
        $this->nomeAutor = $nomeAutor;
        return $this;
    }
    public function getEstudio(){
        return $this->estudio;
    }
    public function setEstudio($estudio){
        $this->estudio = $estudio;
        return $this;
    }
    public function getNumeroEpisodios(){
        return $this->numeroEpisodios;
    }
    public function setNumeroEpisodios($numeroEpisodios){
        $this->numeroEpisodios = $numeroEpisodios;
        return $this;
    }
    public function getDuracaoEpisodios(){
        return $this->duracaoEpisodios;
    }
    public function setDuracaoEpisodios($duracaoEpisodios){
        $this->duracaoEpisodios = $duracaoEpisodios;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getCapa(){
        return $this->capa;
    }
    public function getCapaCaminho(){
        return $this->capa["pasta"];
    }
    public function setCapa($tipo,$pasta){
       
        $this->capa['tipo']=$tipo;
        $this->capa['pasta']=$pasta;
        return $this;
    }
    public function getGeneros(){
        return $this->generos;
    }
    public function setGeneros($generos){
        for($i=0;$i<6;$i++){
            if(!isset($this->generos[$i])){
                $this->generos[$i] = $generos;
                break;
            }
        }
        return $this;
    }
    public function salvar(){
        $tabela = "anime2";
        $parametros = "nomeanime, nomeautor, estudio, numeroepisodios, duracaoepisodios, status, generos, caminho";
        $valores = "'". $this->nomeAnime."', ". "'". $this->nomeAutor."', ". "'". $this->estudio."', "
        .$this->numeroEpisodios.", ".$this->duracaoEpisodios.", '".$this->status."', '".$this->getGenerosToBd()."', '".
        $this->capa["pasta"]."'";
        conexao::insert($tabela, $parametros, $valores);    
    }
    public static function listarTodos(){
        $tabela = "anime2";
        $parametros = "id, nomeanime, nomeautor, estudio, numeroepisodios, duracaoepisodios, status, generos, caminho";
        $dados = conexao::select($tabela, $parametros);
        $animes = [];
        foreach($dados as $d){
            $a = new Anime();
            $a->id = $d["id"];
            $a->nomeAnime = $d["nomeAnime"];
            $a->nomeAutor = $d["nomeAutor"];
            $a->estudio = $d["estudio"];
            $a->numeroEpisodios = $d["numeroEpisodios"];
            $a->duracaoEpisodios = $d["duracaoEpisodios"];
            $a->status = $d["status"];
            $a->generos = $d["generos"];
            $a->capa["pasta"]=$d["caminho"];
            $animes[] = $a;
        }
        
        return $animes;

    }
    public static function getPorId($id){
        $tabela = "anime2";
        $parametros = "id, nomeanime, nomeautor, estudio, numeroepisodios, duracaoepisodios, status, generos, caminho";
        $dados = conexao::selectById($tabela, $parametros, $id);
       
        foreach($dados as $d){
            $a = new Anime();
            $a->id = $d["id"];
            $a->nomeAnime = $d["nomeAnime"];
            $a->nomeAutor = $d["nomeAutor"];
            $a->estudio = $d["estudio"];
            $a->numeroEpisodios = $d["numeroEpisodios"];
            $a->duracaoEpisodios = $d["duracaoEpisodios"];
            $a->status = $d["status"];
            $a->generos = $d["generos"];
            $a->capa["pasta"] = "../".$d["caminho"];
            return $a;
        }
        
        return null;

    }
    public static function deletar($id){
        conexao::delete("anime2", $id);
    }
    public function editar(){
        $tabela = "anime2";
        $parametros = "nomeanime='". $this->nomeAnime."', nomeautor='".$this->nomeAutor."', estudio='".$this->estudio.
        "', numeroepisodios=".$this->numeroEpisodios.", duracaoepisodios=".$this->duracaoEpisodios.", status='"
        .$this->status."', generos='".$this->getGenerosToBd()."', caminho='".$this->capa["pasta"]."'";
        conexao::update($tabela, $parametros, $this->id);    
    }

    private function getGenerosToBd(){
        return implode("-", $this->generos);
    }
}
?>