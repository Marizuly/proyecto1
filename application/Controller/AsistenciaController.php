<?php
namespace Mini\Controller;

use Mini\Model\asistencia;
use Mini\Model\Persona;
class asistenciaController {
    
    public function __construct(){
        if(!isset($_SESSION['admin']) && !isset($_SESSION['cliente'])){
            header("location:".URL."Login");
        }
    }
    
    public function crear($insert){
        $TD= new asistencia();

        $res = $TD->listarDocumento();
        $asis = $insert; 
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/asistencia/crear.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    public function index(){
        $control = new asistencia;
        if(isset($_SESSION['admin'])){
        $asis = $control -> listarAsistencia();
    }if(isset($_SESSION['cliente'])){
        $ids=$_SESSION["idAdmin"];
        $asis = $control -> listarAsistencia2($ids);
    }
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/asistencia/index.php';
        include APP.'view/_templates/footerAdmin.php';

    }

//metodo que instancia el modelo, manda los datos por set
    public function registrar(){
        $control = new asistencia;  
        $control->__SET('idcomprobante',$_POST['documento']);
        $idcompro = $_POST['documento'];
        $con=$control->cantidad();
        $can=$con->cantidad;
        //Actualizamos asistencia 
        if ($can == 0) {
            $insert = $control->insertarAsistencia();
             if ($insert) {
                echo '<script>alert("Tiquetera actualizada (Mem)");</script>'; 
                $insert = $control->consultarAsistencia();
                $this->crear($insert);
                
            }

            //Actualizamos tiquetes y se marca asistencia
         }elseif ($can != 0) {
            $insert = $control->actualizarTiquetes();
            $insert = $control->insertarAsistencia();
            if ($insert) {
                echo '<script>alert("Tiquetera actualizada (Tiq)");</script>'; 
                // header("location: ".URL."/asistencia/crear");
                $insert = $control->consultarAsistencia();
                $this->crear($insert);

                // $asis = $control->consultarAsistencia(); 
                // if ($can == 0) {
                //     $cambiarE = $control->estadoVenta();
                // }
            
            }
        }

    }
 
   
    public function editar($idcontrolE_S)
    {
        $control= new controlE_S;
        $control->__SET('idcontrolE_S',$idcontrolE_S);
        $respuesta = $control->editar();
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/controlE_S/editar.php';
        include APP.'view/_templates/footerAdmin.php';
    }


    //metodo que instancia el modelo, manda los datos por set
    public function modificar()
    {   
         $control= new controlE_S();
        $control->__SET('idcontrolE_S',$_POST['idcontrolE_S']);
        $control->__SET('horaE',$_POST['horaE']);
        $control->__SET('horaS',$_POST['horaS']);
        $control->__SET('fecha',$_POST['fecha']);
        //llama al metodo guardar
        $respuesta = $control->modificar();       
    } 
}
?>