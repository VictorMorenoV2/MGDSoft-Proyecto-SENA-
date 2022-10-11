
function fntDelPersona(idUsuario){ 
Swal.fire({
    title: '¿Realmente quiere eliminar el registro?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar',
    cancelButtonText: 'Cancelar'

    
  }).then((result) => {
    if (result.isConfirmed) {
     
      Swal.fire(
        'Eliminado',
        'Se elimino el usuario',
        'success'
      )
      location.href='index.php?c=usuarios&a=eliminar&idUsuario='+idUsuario;
    }else{
        
        Swal.fire(
            'Cancelado',
            'El usuario no se elimino',
            'succes'
        )
       
    }
     
  })
 }


function fntDelPersona1(idUsuario){ 

    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    
    })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true,
        timer:10000,
        }).then((result) => {
        if (result.isConfirmed) {

            alerta=true
            swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            
            )
           
          // location.href='index.php?c=usuarios&a=eliminar&idUsuario='+idUsuario

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel     
        ) {
            alerta=false
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error',  
          
            );
         
            //location.href="index.php";
        }
        })

        if(alerta==true){
            location.href='index.php?c=usuarios&a=eliminar&idUsuario='+idUsuario
        }else{
            location.href='index.php'
        }

}


function modificarPersona(){

    Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire('Saved!', '', 'success')
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })

}


function cancelarPersona(id){

    Swal.fire({

        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
    //location.href='index.php';

}





//==================PRODUCTOS=================//

function fntDelProducto(idProducto){ 
    Swal.fire({
        title: '¿Realmente quiere eliminar el producto?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'Cancelar'
    
        
      }).then((result) => {
        if (result.isConfirmed) {
         
          Swal.fire(
            'Eliminado',
            'Se elimino el producto',
            'success',
            
          )
         location.href='../../../controllers/productoDelete.php?idProducto='+idProducto;
        }else{
            
            Swal.fire(
                'Cancelado',
                'El producto no se elimino',
                'succes'
            )
           
        }
         
      })
}


function modificarProducto(id){

   /* Swal.fire({
        title: '¿Quieres guardar los cambios?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        denyButtonText: `Editar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
      /*  if (result.isConfirmed) {
          Swal.fire('Saved!', 'productoUpdate.php?idProducto='+id, 'success')
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })*/
      Swal.fire({

        icon: 'success',
        title: 'Los datos no fueron alterados',
        showConfirmButton: false,
        timer: 1000
    })
   

}



  
 
//============================CATEGORIAS===============================//
function fntDelCategoria(idCategoria){ 
    Swal.fire({
        title: '¿Realmente quiere eliminar la categoía?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'Cancelar'
    
        
      }).then((result) => {
        if (result.isConfirmed) {
         
          Swal.fire(
            'Eliminado',
            'Se elimino la categoría',
            'success'
          )
          location.href='../../../controllers/categoriaDelete.php?idCategoria='+idCategoria;
        }else{
            
            Swal.fire(
                'Cancelado',
                'la categoría no se elimino',
                'succes'
            )
           
        }
         
      })
     }


