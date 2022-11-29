<?php

if(isset($_POST['loginButton'])){
      $username = $_POST['loginUsername'];
      $senha = $_POST['loginSenha'];

      $result = $conta->login($username, $senha);

      if($result == true){
        $_SESSION['usuarioLogado'] = $username;
        header("Location: index.php");
      }
    }
?>