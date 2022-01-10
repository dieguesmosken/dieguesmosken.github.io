<?php
require_once '../Conexao/ConexaoPDO.php';

class UsersModel {

    public function listarUsers(){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "SELECT * FROM hpt_usr";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $Users = $stmt->fetchAll();

        return $Users;
    }
    
    public function listarUserID($id){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "SELECT * FROM hpt_usr WHERE id=:x";
        $stmt = $conexao->prepare($query);
        $stmt->bindvalue(":x", "$id", PDO::PARAM_INT);
        
        $stmt->execute();
        $Users = $stmt->fetchObject();

        return $Users;
    }
    public function excluirUserID($id){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "DELETE FROM hpt_usr WHERE id=:x";
        $stmt = $conexao->prepare($query);
        $stmt->bindvalue(":x", "$id", PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->rowCount();
    }
    public function inserirUser($dataUser){
        

        $conexao = ConexaoPDO::getInstance();
        $query = "INSERT INTO hpt_usr (nome_usr,pass_usr,cpf_usr,dtnasc_usr,email_usr,tipo_usr,dtcriado_usr,dtmodificado_usr) values (:nome_usr,:pass_usr,:cpf_usr,:dtnasc_usr,:email_usr,:tipo_usr,:dtcriado_usr,:dtmodificado_usr)";
        $stmt = $conexao->prepare($query);
        $stmt->bindvalue(":nome_usr", $dataUser['txtNome'], PDO::PARAM_STR);
        $stmt->bindvalue(":pass_usr", $dataUser['txtSenha'], PDO::PARAM_STR);
        $stmt->bindvalue(":cpf_usr", $dataUser['txtCpf'], PDO::PARAM_STR);
        $stmt->bindvalue(":dtnasc_usr", $dataUser['txtDtnasc'], PDO::PARAM_STR);
        $stmt->bindvalue(":email_usr", $dataUser['txtEmail'], PDO::PARAM_STR);
        $stmt->bindvalue(":tipo_usr", $dataUser['txtTipo'], PDO::PARAM_INT);
        $stmt->bindvalue(":dtcriado_usr", $dataUser['dtcriado_usr'] , PDO::PARAM_STR);
        $stmt->bindvalue(":dtmodificado_usr", $dataUser['dtmodificado_usr'] , PDO::PARAM_STR);
       
        $stmt->execute();

        return $stmt->rowCount();
    }
    public function editarUser($dataUser){
        

        $conexao = ConexaoPDO::getInstance();
        $query = "UPDATE hpt_usr SET nome_usr=:nome_usr,pass_usr=:pass_usr,cpf_usr=:cpf_usr,dtnasc_usr=:dtnasc_usr,email_usr=:email_usr,tipo_usr=:tipo_usr,dtcriado_usr=:dtcriado_usr,dtmodificado_usr=:dtmodificado_usr WHERE id=:id";
        $stmt = $conexao->prepare($query);
        $stmt->bindvalue(":nome_usr", $dataUser['txtNome'], PDO::PARAM_STR);
        $stmt->bindvalue(":pass_usr", $dataUser['txtSenha'], PDO::PARAM_STR);
        $stmt->bindvalue(":cpf_usr", $dataUser['txtCpf'], PDO::PARAM_STR);
        $stmt->bindvalue(":dtnasc_usr", $dataUser['txtDtnasc'], PDO::PARAM_STR);
        $stmt->bindvalue(":email_usr", $dataUser['txtEmail'], PDO::PARAM_STR);
        $stmt->bindvalue(":tipo_usr", $dataUser['txtTipo'], PDO::PARAM_INT);
        $stmt->bindvalue(":dtcriado_usr", $dataUser['dtcriado_usr'] , PDO::PARAM_STR);
        $stmt->bindvalue(":dtmodificado_usr", $dataUser['dtmodificado_usr'] , PDO::PARAM_STR);

        $stmt->bindvalue(":id", $dataUser['txtId'], PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->rowCount();
    }
}

?>