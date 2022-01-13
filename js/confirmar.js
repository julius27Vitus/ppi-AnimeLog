function confirma(){
    var mensagem;
    var retorno = confirm("Tem certeza de que quer deletar o item?")
    if(retorno == true){
        mensagem = "Item Excluido com sucesso!";
    }
    else{
        mensagem = "Item não excluido";
    }
    
    document.write(mensagem);
}