<?php

    class Usuario{
        
        private $con;
        private $username;

        public function __construct($con, $username){
            $this->con = $con;
            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getEmail(){
            $query = mysqli_query($this->con, "SELECT email FROM usuarios WHERE username = '$this->username'");
            $row = mysqli_fetch_array($query);

            return $row['email'];
        }

        public function getNomeSobrenome() {
            $query = mysqli_query($this->con, "SELECT CONCAT(nome, ' ', sobrenome) AS 'nome' FROM usuarios WHERE username = '$this->username'");
            $row = mysqli_fetch_array($query);

            return $row['nome'];
        }
    }

/*

-- TABELA USUARIOS ---

CREATE TABLE `usuarios` (
  `id` SERIAL PRIMARY KEY,
  `username` varchar(25) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `dataLogin` date NOT NULL,
  `fotoPerfil` varchar(500) NOT NULL
);

INSERT INTO `usuarios` (`username`, `nome`, `sobrenome`, `email`, `senha`, `dataLogin`, `fotoPerfil`) VALUES
('user', 'Guest', 'Account', 'guest@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-09-13', '../View/img/profile/User-profile.png');

*/
?>