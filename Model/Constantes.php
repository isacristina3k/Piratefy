<?php

    class Constantes{

        //mensagens de erro cadastrar
        public static $usernameLen =        "Seu nome de usuário deve conter entre 4 e 25 caracteres";
        public static $nomeLen =            "Seu nome deve conter entre 3 e 25 caracteres";
        public static $sobrenomeLen =       "Seu sobrenome deve conter entre 3 e 25 caracteres";
        public static $emailsNaoCombinam =  "Os e-mails não combinam";
        public static $emailInvalido =      "O e-mail é inválido";
        public static $senhasNaoCombinam =  "As senhas não combinam";
        public static $senhaLetraNumero =   "Sua senha deve conter apenas letras e números";
        public static $senhaLen =           "Sua senha deve conter entre 5 e 30 caracteres";
        public static $usernameExiste =     "nome de usuário já existe";
        public static $emailExiste =        "e-mail já está em uso";
        
        //mensagens de erro login
        public static $loginFailed =        "Nome de usuário ou senha incorreto";
    }
?>