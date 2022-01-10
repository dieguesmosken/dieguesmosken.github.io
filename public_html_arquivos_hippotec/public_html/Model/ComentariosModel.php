<?php 
require_once '../Conexao/ConexaoPDO.php';

class ComentariosModel {
    public function listarTodos(){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "SELECT * FROM hpt_coment";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $dados = $stmt->fetchAll();

        return $dados;
    }
    public function listarTodosID($id_user){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "SELECT * FROM hpt_coment where id_user = :id_user";
        $stmt = $conexao->prepare($query);
        
        $stmt->bindvalue(":id_user", $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetchAll();

        return $dados;
    }
    public function inserirComentario($dataComentario){
        $conexao = ConexaoPDO::getInstance();

        $query = "INSERT into hpt_coment (coment_usr, coment_criado, id_user) VALUES (:coment_usr, :coment_criado, :id_user)";

        $stmt = $conexao->prepare($query);

        $stmt->bindvalue(":coment_usr", $dataComentario['coment_usr'] , PDO::PARAM_STR);
        $stmt->bindvalue(":coment_criado", $dataComentario['coment_criado'] , PDO::PARAM_STR);
        $stmt->bindvalue(":id_user", $dataComentario['id_user'] , PDO::PARAM_INT);
        
        $stmt->execute();
       
        return $stmt->rowCount();
    }
    public function excluirComentarioID($id_comentario){
        
        $conexao = ConexaoPDO::getInstance();
        $query = "DELETE FROM coment_usr WHERE id=:id_comentario";
        $stmt = $conexao->prepare($query);
        $stmt->bindvalue(":id_comentario", "$id_comentario", PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->rowCount();
    }
}
?>