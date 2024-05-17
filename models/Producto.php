<?php
    class Producto extends Conectar{
        public function insert_producto($rule_name){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO rules (rule_id,rule_name) VALUES (null,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $rule_name);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }
?>