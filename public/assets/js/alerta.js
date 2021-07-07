function AlertaEliminar()
{
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'El registro no estará disponible para operaciones en el sistema',
    text: "para establecer el registro deberá hacerlo desde papelera",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        '¡Eliminado!',
        'El registro ha sido eliminado',
        'success'
      )
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'El registro no ha sido eliminado',
        'error'
      )
    }
  })

}

function Alertabtn()
{
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Operación exitosa',
    showConfirmButton: false,
    timer: 100000000
  })
}

function AlertaCancel()
{
  Swal.fire({
    title: '¿Seguro que desea regresar?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: 'btn btn-success',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Cancelado',
        'Operación cancelada',
        'error'
        
      )
    }
  })
}



function guardarUsuario() {
  
}

  function eliminarUsuario() {

  }

  function actualizarUsuario() {
    
  }

  function reestablecerUsuario() {
    
  }

function guardarEmpleado() {
  
}

  function eliminarEmpleado() {
    
  }

  function actualizarEmpleado() {
    
  }

  function reestablecerEmpleado() {
    
  }

function guardarPuesto() {
  
}

  function eliminarPuesto() {
    
  }

  function actualizarPuesto() {
    
  }

  function reestablecerPuesto() {
    
  }

function guardarCliente() {
  
}

  function eliminarCliente() {
    
  }

  function actualizarCliente() {
    
  }

  function reestablecerCliente() {
    
  }

