<?php

    class Artista{
    
        private $con;
        private $idArtista;
        private $nome;
        private $fotoArtista;


        public function __construct($con, $idArtista) {
            $this->con = $con;
            $this->idArtista = $idArtista;

            $query = mysqli_query($this->con, "SELECT * FROM artistas WHERE id = $this->idArtista");
            $artist = mysqli_fetch_array($query);

            $this->name = $artist['nome'];
        }

        public function getIdArtista() {
            return $this->idArtista;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getfotoArtistas() {
            return $this->fotoArtista;
        }

        public function getIdMusicas() {
            $query = mysqli_query($this->con, "SELECT id FROM musicas WHERE artista = $this->idArtista ORDER BY 
            plays DESC");
            $array = array();

            while ($row = mysqli_fetch_array($query)) {
                array_push($array, $row['id']);
            }
            return $array;
        }
    }

/*

-- TABELA ARTISTAS ---

CREATE TABLE `artistas` (
  `id` SERIAL PRIMARY KEY,
  `nome` varchar(50) NOT NULL,
  `fotoArtista` varchar(500) NOT NULL
);

INSERT INTO `artistas` (`nome`, `fotoArtista`) VALUES
('Justin Bieber', './img/profile/jb.png'),
('Demi Lovato', './img/profile/dl.png'),
('Olivia Rodrigo', './img/profile/or.png'),
('Camila Cabello', './img/profile/cc.png'),
('Halsey', './img/profile/hy.png'),
('Billie Eilish', './img/profile/be.png'),
('Fifth Harmony', './img/profile/fh.png'),
('Melim', './img/profile/ml.png');

*/
?>