<?php 

class conexao{
    
    public static function delete($tabela, $id){
        $sql = "DELETE FROM $tabela WHERE id=$id";
        self::getConexao()->exec($sql);
    }

    public static function selectById($tabela, $projecao, $id){
        $sql = "SELECT $projecao FROM $tabela WHERE id=$id;";
        $resource = conexao::getConexao()->prepare($sql);
        $resource->execute();
        return $resource->fetchAll();
    }
    public static function update($tabela, $valores, $id){
        $sql = "UPDATE $tabela SET $valores WHERE id=$id;";
        $resource = conexao::getConexao()->prepare($sql);
        $resource->execute();

    }

    public static function select($tabela, $projecao){
        $sql = "SELECT $projecao FROM $tabela;";
        $resource = conexao::getConexao()->prepare($sql);
        $resource->execute();
        return $resource->fetchAll();
    }
    
    public static function insert($tabela, $parametros, $valores){
        $sql = "INSERT INTO ".$tabela." (".
            $parametros.") VALUES (".$valores.");";
        var_dump($sql);
        self::getConexao()->exec($sql);
        echo $sql;
    }

    private static function getConexao(){
        try{
        $conexao = new PDO(
            "mysql:host=ec2-3-227-55-25.compute-1.amazonaws.com; port=5432; dbname=d6p0dfmpskof16",
            "bwekwrpinvohyj",
            "f018ae5247d4a8e021d070a55a89553eb02a85fa155e54c2962c8a32dbfc5607"
        );
        $conexao-> setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        //echo "Deu certo porque deu certo, se não tivesse dado certo, tinha dado errado!";
        return $conexao;
    }
    catch(PDOException $e){
        echo "Deu erro: ".$e->getMessage();
    }
    }
}
?>