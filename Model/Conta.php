<?php

    class Conta{

        private $erroArray;
        private $con;

        public function __construct($con){
            $this->erroArray = array();
            $this->con = $con;
        }

        public function login($un, $s){
            $s = md5($s);

            $query = mysqli_query($this->con, "SELECT * FROM usuarios WHERE username = '$un' AND senha = '$s'");

            if(mysqli_num_rows($query) == 1){
                return true;
            }
            else{
                array_push($this->erroArray, Constantes::$loginFailed);
                return false;
            }

        }

        public function cadastrar($un, $nm, $sn, $em, $em2, $s, $s2){
            $this->validarUsername($un);
            $this->validarNome($nm);
            $this->validarSobrenome($sn);
            $this->validarEmails($em, $em2);
            $this->validarSenhas($s, $s2); 

            //se não houver erros enviar dados para o banco de dados
            if(empty($this->erroArray) == true){
                //insert into db
                return $this->inserirUsuario($un, $nm, $sn, $em, $s);
            }
            else{
                return false; //significa que uma das verificações falhou

            }
        }

        //checar se existe erro no array
        public function getErro($erro){
            if(!in_array($erro, $this->erroArray)){ //se nao existir
                $erro = "";
            }
            return "<span class='errorMessage'>$erro</span>";

        }

        private function inserirUsuario($un, $nm, $sn, $em, $s){
            $senhaCripto = md5($s);
            $fotoPerfil = "../View/img/profile/User-profile.png";
            $data = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO usuarios VALUES ('', '$un', '$nm', '$sn', '$em', '$senhaCripto', '$data', '$fotoPerfil')");

            return $result;
        } 

        private function validarUsername($un){
            
            if(strlen($un) > 25 || strlen($un) < 4){
                array_push($this->erroArray, Constantes::$usernameLen);
                return;
            }

            $verificarUsername = mysqli_query($this->con, "SELECT username FROM usuarios WHERE username = '$un'");

            if(mysqli_num_rows($verificarUsername) != 0){
                array_push($this->erroArray, Constantes::$usernameExiste);
                return;
            }
        }

    
        private function validarNome($nm){
            if(strlen($nm) > 25 || strlen($nm) < 3){
                array_push($this->erroArray, Constantes::$nomeLen);
                return;
            }
        }

    
        private function validarSobrenome($sn){
            if(strlen($sn) > 25 || strlen($sn) < 3){
                array_push($this->erroArray, Constantes::$sobrenomeLen);
                return;
            }
        }

    
        private function validarEmails($em, $em2){
            if($em != $em2){
                array_push($this->erroArray, Constantes::$emailsNaoCombinam);
                return;
            }

            /* o input do tipo "e-mail" faz apenas a verificacao se existe "@" na string de entrada.
            Para o e-mail ser válido é necessario fazer uma verificaçao manual para checar se
            o e-mail possui o ".com" ou ".br" ou ".org" etc para que ele seja um e-mail válido */

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->erroArray, Constantes::$emailInvalido);
                return;
            }

            $verificarEmail = mysqli_query($this->con, "SELECT email FROM usuarios WHERE email = '$em'");

            if(mysqli_num_rows($verificarEmail) != 0){
                array_push($this->erroArray, Constantes::$emailExiste);
                return;
            }
        }

    
        private function validarSenhas($s, $s2){

            if($s != $s2){
                array_push($this->erroArray, Constantes::$senhasNaoCombinam);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $s)){ //se a senha conter caracteres especiais nao sera válida
                array_push($this->erroArray, Constantes::$senhaLetraNumero);
                return;
            }

            if(strlen($s) > 30 || strlen($s) < 5){
                array_push($this->erroArray, Constantes::$senhaLen);
                return;
            }

            /* Obs: as verificações de caracteres especiais e letras/números são feitas apenas 
            na senha pois se a senha não passar nas verificações entao ela não será igual a 
            senha2 e não passará na primeira verificação para ser uma senha válida */
        }
    }
?>