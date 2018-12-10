<?php
    require_once 'Banco.php';
    class Lembretes extends Banco{
        
        public function inserirLembrete($lembrete, $prazo){
            $sql = "INSERT INTO tb_lembretes VALUES (default, :lembrete, :prazo, 'N')";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':lembrete', $lembrete);
            $stmt->bindParam(':prazo', $prazo);
            $stmt->execute(); 
            $count = $stmt->rowCount();
            if($count > 0){
                return "sucesso";
            }else{
                return "erro";
            }
        }
        public function deletarLembrete($id){
            $sql  = "DELETE FROM tb_lembretes WHERE sr_id = :id";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute(); 
            $count = $stmt->rowCount();
            if ($count > 0){
                return "sucesso";
            }else{
                return  "erro";
            }
        }
        public function findAll(){
            $sql  = "SELECT * FROM tb_lembretes ORDER BY dt_data";
            $stmt = BANCO::prepare($sql);
            $stmt->execute();
		    return $stmt->fetchAll();
        }
        public function riscarLembrete($riscar, $id){
            $sql = "UPDATE tb_lembretes SET ch_riscado = :riscar WHERE sr_id = :id";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':riscar', $riscar);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0){
                return "sucesso";
            }else{
                return "erro";
            }
        }
    }
?>