<?php
    Class Conectar{
        protected $dbh;

        protected function Conexion()
        {
            try {
                
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=crud","root","root");
                return $conectar;


            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function setNames()
        {
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>