<?php
    require_once 'Banco.php';
    class Usuario extends Banco{
        public function logar($vc_login, $vc_senha){
            $sql = "SELECT sr_id FROM tb_usuario WHERE vc_login = :vc_login AND vc_senha = :vc_senha";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':vc_login', $vc_login);
            $stmt->bindParam(':vc_senha', $vc_senha);
            $stmt->execute(); 
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($dados){
                $token = md5(uniqid(rand(), true));
                $sql = "UPDATE tb_usuario SET vc_token = :vc_token WHERE sr_id = :sr_id";
                $stmt = BANCO::prepare($sql);
                $stmt->bindParam(':vc_token', $token);
                $stmt->bindParam(':sr_id', $dados[0]['sr_id']);
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count > 0){
                    $sql = "SELECT * FROM tb_usuario WHERE vc_token = :vc_token";
                    $stmt = BANCO::prepare($sql);
                    $stmt->bindParam(':vc_token', $token);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = $stmt->rowCount();
                    return $result;
                  
                }else{
                    return "falha";
                }
            }else{
                return "erro";
            }
        }
        public function logarFace($email){
            $sql = "SELECT sr_id FROM tb_usuario WHERE vc_email = :vc_email";
            $stmt = BANCO::prepare($sql);
            $stmt->bindParam(':vc_email', $email);
            $stmt->execute(); 
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($dados){
                $token = md5(uniqid(rand(), true));
                $sql = "UPDATE tb_usuario SET vc_token = :vc_token WHERE sr_id = :sr_id";
                $stmt = BANCO::prepare($sql);
                $stmt->bindParam(':vc_token', $token);
                $stmt->bindParam(':sr_id', $dados[0]['sr_id']);
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count > 0){
                    $sql = "SELECT * FROM tb_usuario WHERE vc_token = :vc_token";
                    $stmt = BANCO::prepare($sql);
                    $stmt->bindParam(':vc_token', $token);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = $stmt->rowCount();
                    return $result;
                }else{
                    return "falha";
                }
            }else{
                return "erro";
            }
        }

    }