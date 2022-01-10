<?php
    require_once '../Model/UsersModel.php';
    
class UsersController {
  
    public static function listarUsers(){
       
        $mUsers = new UsersModel();
        $Users = $mUsers->listarUsers();
        return $Users;
    } 
    public static function listarUserID($id){
       
        $mUsers = new UsersModel();
        $Users = $mUsers->listarUserID($id);
        return $Users;
    }   
    public static function excluirUserID($id){
       $mUsers = new UsersModel();

       $Users = $mUsers->excluirUserID($id);
       return $Users;
      
    }   
    public static function inserirUser($dataUser){
      $mUser = new UsersModel();
      $Users = $mUser->inserirUser($dataUser);
      return $Users;
    }
    public static function editarUser($dataUser){
      $mUser = new UsersModel();
      $Users = $mUser->editarUser($dataUser);
      return $Users;
    }
}

?>