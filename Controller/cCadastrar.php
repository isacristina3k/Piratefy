<?php

    if(isset($_POST['cadastrarButton'])){
        //se clicar no botao de cadastro

        $username = $_POST['username'] ;
        $username = strip_tags($username); //funçao utilizada para filtrar e remover tags html e php na entrada dos campos
        $username = str_replace(" ", "", $username); //funçao que substitui (replace), 
                                                     //nesse caso esta removendo os espaços da string username
    
        $nome = $_POST['nome'] ;
        $nome = strip_tags($nome);
        $nome = str_replace(" ", "", $nome);
        $nome = ucfirst(strtolower($nome)); //ucfirst é a funçao que deixa a primeira letra da string maiuscula (Nomes e Sobrenomes)
                                            //strtolower é a funcao que deixa todo o resto da string em minusculo
    
        $sobrenome = $_POST['sobrenome'];
        $sobrenome = strip_tags($sobrenome);
        $sobrenome = str_replace(" ", "", $sobrenome);
        $sobrenome = ucfirst(strtolower($sobrenome));
    
        $email = $_POST['email'];
        $email = strip_tags($email);
        $email = str_replace(" ", "", $email);
    
        $email2 = $_POST['email2'];
        $email2 = strip_tags($email2);
        $email2 = str_replace(" ", "", $email2);
    
        $senha = $_POST['senhaCad'];
         
        $senha2 = $_POST['senhaConfirm'];

        $bemSucedido = $conta->cadastrar($username, $nome, $sobrenome, $email, $email2, $senha, $senha2);

        /* a função cadastrar irá retornar se a condição foi verdadeira ou falsa (se houve erros ou
        não) e atribuirá o valor na variavel bemSucedido*/

        if($bemSucedido == true){
            $_SESSION['usuarioLogado'] = $username;
            header("Location: cadastrar.php");
        }
    }
?>