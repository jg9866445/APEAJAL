
class login {
  
    constructor () {
    }
    confirmarlogin(information){
        switch(information){
            case "Cliente":
                if(window.localStorage.getItem('dato') == undefined)
                    window.location.href = "/SistemaCliente/login.html"
                    console.log(information);
            break;
            case "No-Clientes":
                if(window.localStorage.getItem('dato') != undefined)
                    window.location.href = "/SistemaCliente/index.html"
            break;
            case "Empleado":
                console.log("Empleado")
            break;

            case "No-Empleado":

            break;
            default:
                console.log("No-Empleado");
            break;
        }
    }
    alertLogout(users){
        Swal.fire({
        title: 'Usted desea cerrar sesion?',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
            denyButton: 'order-3',
        }
        }).then((result) => {
            if (result.isConfirmed) {
                window.localStorage.clear();
                console.log(users);
                if (users=="Cliente")
                    window.location.href = "/SistemaCliente/login.html"
                else
                    window.location.href = "/index.html"

            }
        })
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
