
class login {
  
    constructor () {
    }
    confirmarlogin(){
        
    }
    alertLogout(typeUser,){

    }

    alert(mensaje,botton,eliminar){
        Swal.fire({
            html: mensaje,
            showConfirmButton: botton,
            allowOutsideClick: eliminar,

        });
    }

    cerrar(){
        Swal.close();
    }
    


    

}
