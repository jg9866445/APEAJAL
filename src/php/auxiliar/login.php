<?php 
session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");
class Login
{
    var $db;
    var $connect;
    var $conexion;

    function __construct(){        
        try {
            $this->db = new DB_Connect();
            $this->connect=$this->db->connect();
            $this->conexion = $this->connect;

            $this->API();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function API(){
        try{
            if(isset($_POST['Metodo'])){
                switch ($_POST['Metodo']) {
                    case 'login':
                        $resultado = $this->login($_POST['Username'],$_POST['Passwor']);
                        if(isset($resultado[0][0])){
                           $_SESSION["id"] = $resultado[0][0];
                           $_SESSION["Zona"] = $_POST["Zona"];
                            echo json_encode($resultado);
                        }else{
                            echo json_encode($resultado);
                        }
                    break;
                }
            }
        }catch (Exception $e){
                save(var_dump($e));
        }
    }   

    function login($Username,$Passwor){
        $sql = "SELECT if(COUNT(idUsuario)>0,true,false) as estado,u.Puesto FROM User as u WHERE u.Username = :Username && u.Pass =:Passwor ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':Username', $Username);
        $query->bindParam(':Passwor', $Passwor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
}

    new Login();