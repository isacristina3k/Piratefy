<?php

    class Playlist {
        
        private $con;
        private $idPlaylist;
        private $nome;
        private $autor;

        public function __construct($con, $data) {
            if (!is_array($data)) {
                $query = mysqli_query($con, "SELECT * FROM playlists WHERE id = '$data'");
                $data = mysqli_fetch_array($query);
            }

            $this->con = $con;
            $this->idPlaylist = $data['id'];
            $this->nome = $data['nome'];
            $this->autor = $data['autor'];
        }

        public function getIdPlaylist() {
            return $this->idPlaylist;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function getQtdMsc() {
            $query = mysqli_query($this->con, "SELECT idMusica FROM musicasPlaylists WHERE idPlaylist = '$this->idPlaylist'");
            return mysqli_num_rows($query);
        }

        public function getIdMsc() {
            $query = mysqli_query($this->con, "SELECT idMusica FROM musicasPlaylists WHERE idPlaylist = $this->idPlaylist ORDER BY 
                ordemPlaylist ASC");
            $array = [];

            while ($row = mysqli_fetch_array($query)) {
                array_push($array, $row['idMusica']);
            }

            return $array;
        }

        public static function getPlaylistDropdown($con, $username) {
            $dropdown = "
                <select class='item playlist'>
                    <option value=''>Adicionar na playlist</option>
            ";

            $query = mysqli_query($con, "SELECT id, nome FROM playlists WHERE autor = '$username'");
            while ($row = mysqli_fetch_array($query)) {
                $idPlaylist = $row['id'];
                $nome = $row['nome'];
                $dropdown = $dropdown . "<option value='$idPlaylist'>$nome</option>";
            }
            return $dropdown . "</select>";
        }
    }

/*

-- TABELA PLAYLISTS ---

CREATE TABLE `playlists` (
  `id` SERIAL PRIMARY KEY,
  `nome` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL
);

INSERT INTO `playlists` (`nome`, `autor`) VALUES
('favoritas', 'camilacabello97');  
  
  
  -- TABELA MUSICAS PLAYLISTS ---

CREATE TABLE `musicasPlaylists` (
  `id` SERIAL PRIMARY KEY,
  `idMusica` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
);

INSERT INTO `musicasPlaylists` (`idMusica`, `idPlaylist`) VALUES
(15, 3),
(13, 3),
(17, 3),
(17, 2),
(14, 2),
(14, 3),
(13, 2),
(27, 4);

*/
?>