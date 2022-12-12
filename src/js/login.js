
class login {
  
    constructor () {
    }
    confirmarlogin(information){
        switch(information){
            case "Cliente":
                if(window.localStorage.getItem('dato') == undefined)
                    window.location.href = "/SistemaCliente/login.html"
            break;
            case "No-Clientes":
                if(window.localStorage.getItem('dato') != undefined)
                    window.location.href = "/SistemaCliente/index.html"
            break;
            case "Empleado":
                if(window.localStorage.getItem('username') == undefined)
                    window.location.href = "/index.html"    
            break;
            case "No-Empleado":
                if(window.localStorage.getItem('username') != undefined)
                    window.location.href = "/menu.html"    
            break;

            default:
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

                if (users=="Cliente")
                    window.location.href = "/SistemaCliente/login.html"
                else
                    window.location.href = "/index.html"

            }
        })
    }

    cerrar(){
        Swal.close();
    }
    


    

}
