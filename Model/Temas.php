<?php
    require_once 'Banco.php';
    class Temas extends Banco{
        public function inserirTema($id, $tema){
            $sql = "INSERT INTO tb_temas VALUES (:id, :tema, 'N'))";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tema', $tema);
            return $stmt->execute(); 
        }
        public function findAll(){
            $sql  = "SELECT * FROM tb_temas";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':offset', $offset);
            $stmt->bindParam(':limite', $limit);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        public function find($id){
            $sql  = "SELECT * FROM tb_temas WHERE sr_id = :id";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
		    return $stmt->fetchAll();
        }
        public function atualizarTemas($id, $tema, $sn){
            $sql  = "UPDATE tb_temas SET vc_tema = :tema, ch_atualizado = :sn WHERE sr_id = :id";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tema', $tema);
            $stmt->bindParam(':sn', $sn);
            $stmt->execute();

        }

    }