<?php
    class Producto extends Conectar{
        public function getProducto()
        {   
            $conectar= parent::Conexion();
            parent::setNames();
            $sql = "SELECT * FROM tm_producto WHERE est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function getProductoById($prod_id)
        {   
            $conectar= parent::Conexion();
            parent::setNames();
            $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function deleteProducto($prod_id)
        {   
            $conectar= parent::Conexion();
            parent::setNames();
            $sql = "UPDATE tm_producto 
                SET
                    est=0,
                    fech_elim=now() 
                WHERE 
                    prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insertProducto($prod_nom,$prod_desc)
        {   
            $conectar= parent::Conexion();
            parent::setNames();
            $sql = "INSERT INTO tm_producto (prod_id, prod_nom, prod_desc, fech_crea, fech_modi, fech_elim, est) VALUES (NULL, ?,?, now(), NULL, NULL, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_desc);

            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function updateProducto($prod_id,$prod_nom,$prod_desc)
        {   
            $conectar= parent::Conexion();
            parent::setNames();
            $sql = "UPDATE tm_producto 
                SET
                    prod_nom=?,
                    prod_desc=?,
                    fech_modi=now() 
                WHERE 
                    prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_desc);
            $sql->bindValue(3,$prod_id);
            

            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


    }
?>