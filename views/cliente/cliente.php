<?php

session_start();

if(!isset($_SESSION['idUsuario'])){

    echo '
    
     <script>
       alert("Por favor  inicia sesión ");
       window.location="../../controllers/inicio.php";
       </script>
    
    ';
        
     header("location: ../../controllers/inicio.php");
     session_destroy();
     die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"> </script>
    <script src="../../assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/estiloCliente.css">
    <link href='../../assets/css/main.css' rel='stylesheet' />
    <script src='../../assets/js/main.js'></script>
    <script src='../../assets/js/es.js'></script>
    <script src='../../assets/js/moment.js'></script>
    <script src='../../assets/js/moment.min.js'></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>-->
<script>
     
      document.addEventListener('DOMContentLoaded', function() { 
        let formulario= document.querySelector("form");
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',

          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right:'dayGridMonth,timeGridWeek,listWeek'
          },
         
         /* eventSources:[{
            events:[
                    { // this object will be "parsed" into an Event Object
                    title: "PRUEBA", // a property!
                    descripcion: "Hola esto es una prueba",
                    start: "2022-08-26", // a property!
                    end: "2022-08-27" // a property! ** see important note below about 'end' **
                    }
                ],
               
                color:"black",
                textColor:"white"

          }],

          /*eventClick:function(calEvent,jsEvent,view){
            $('#tituloEvento').html(calEvent.title);
            $('#descripcionEvento').html(calEvent.descripcion);
            $("#evento").modal();

          },*/

          events: 'http://localhost/MGDSoft/models/agendarModel.php',
         
          eventClick: function(info){
            document.querySelector('#tituloEvento').innerHTML = info.event.title;            
            document.querySelector('#descripcionEvento').innerHTML = info.event.extendedProps.descripcion;
            document.querySelector('#idEvento').innerHTML = info.event.id;
          
            //document.querySelector('#startEvento').innerHTML = info.event.start.toLocaleString();  
            //document.querySelector('#endEvento').innerHTML = info.event.end.toLocaleString(); 
            //document.querySelector('#timeEvento').innerHTML = info.event.extendedProps.time; 
            /*var model = new bootstrap.Modal(document.getElementById('evento'),{
                    keyboard: false
            });*/

            $("#btnEliminar").attr("href", "../../controllers/agendaDelete.php?id="+info.event.id);
                     
                      $('#btnModificar').click(function(){
                        formulario.reset();
                            $('#eventoModificar #idEvento').val(info.event.id);
                            $('#eventoModificar #txtTitulo').val(info.event.title);
                            $('#eventoModificar #txtDescripcion').val(info.event.extendedProps.descripcion);
                            $('#eventoModificar #start').val(info.event.start);
                            $('#eventoModificar #txtTime').val(info.event.time);
                            $('#eventoModificar #end').val(info.event.end);
                            $('#eventoModificar #txtColor').val(info.event.txtColor);
                            $('#eventoModificar #txtColor2').val(info.event.backgroundColor);
                            $("#modificar").attr("action", "../../controllers/agendarUpdate.php?id="+info.event.id);
                        $("#eventoModificar").modal("show")
                      });


               $("#evento").modal('show');
            
          },

        
           dateClick: function(info){
           // $('#txtFecha').val(date.format());       
            //$("#eventoAcciones").modal();
            formulario.reset();
            
            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;

            $("#eventoAcciones").modal("show");


          },
          
      

          
            /*dateClick:function(info){
              
            
              var title= prompt("ada");  
          
              if(title){
              var start=info.dateStr;//=FullCalendar.formatDate(start,"Y-MM-DD HH:mm:ss");
              var end=info.dateStr;//=FullCalendar.formatDate(end,"Y-MM-DD HH:mm:ss");
              $.ajax({
                url:"../../controllers/agendar.php",
                type:"POST",
                data:{title:title, start:start, end:end},
                succes:function(){
                  calendar.fullCalendar('refetchEvents');
                  alert("Added succesfuly");
                }
              })
              }

            }*/
          
        /* dateClick:function(info){
           
            $('#eventoAcciones').modal('show');
          

          },*/
        
          /*editable:true,
          eventDrop:function(event){
              
              
             var start= moment(event.start,'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');//$.fullCalendar.formatDate(event.start,"Y-MM-DD HH:mm:ss");
             var end= moment(event.end,'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');//$.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss");
              //var title= event.title;
             var id=event.id; 
              

              $.ajax({
                url:"../../controllers/agendarUpdate.php",
                type:"POST",
                data:{start:start, end:end, id:id},
                success:function(){
                  //calendar.fullCalendar('refetchEvents');
                  alert('Cambio de fecha exitoso');
                }

              })

          },  */


         
        
        });
        calendar.render();

        

    

      });

    </script>

</head>
<body>
    <nav class="navbar">
        <h4>Llantas Moreno Lopez</h4>
        <div class="profile">
            <span class="fas fa-search"></span>
            <img class="profile-image" src="https://picsum.photos/200/200?random=1">
            <p class="profile-name">Cliente</p>
        </div>
    </nav>

    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>

    <div class="slidebar">
      <a href="#">
        <div class="slidebar-menu" id="sidebar">
            <span  class='bx bxs-home' ></span><p>INICIO</p>
        </div>
      </a>
      <a href="infoCliente.php">
       <div class="slidebar-menu">
            <span class='bx bxs-user-detail'></span><p>Información</p>
      </div>  
       <a href="#">
       <div class="slidebar-menu">
            <span class="bx bxs-map-pin"></span><p>Citas</p>
        </div>
       </a>
       <a href="#">
        <div class="slidebar-menu">
            <span class='bx bx-message-rounded-error' ></span><p>PQR</p>
        </div>
       </a>
      
       <a href="../../index.html">
        <div class="slidebar-menu">
            <span  class='bx bx-log-out-circle' ></span><p>Salir</p>
        </div>
       </a>
    </div>


    <main>
        <div class="dashboard-container">
        <div class="card detail">

              <div class="dividir">


                  <div class="izquierda">
                    <div class="slider" id="slider">

                       <ul>
                          <li>  <img src="../../assets/img/slider1.jpg" alt="" > </li>
                       
                          <li> <img src="../../assets/img/slider2.jpg" alt="" > </li>
                       
                          <li> <img src="../../assets/img/slider3.jpg" alt="" > </li>
                     
                          <li> <img src="../../assets/img/slider4.jpg" alt="" > </li>
                  
                       </ul>
                    </div>

                  </div>

                   <div class="derecha">
                    <h1>SERVICIOS</h1>
                    <h5>Venta De Productos Y Prestación De Servicios Dirigidos Al Sistema De Dirección Vehicular, servicios como:</h5>
                    <ul>
                    <li>Inflado y rectificación de llantas.</li>
                    <li>Despinchamos motos, carros, camiones, tractomulas.</li>
                    <li>Venta de llantas nuevas.</li>
                    <li>Mantenimiento preventivo del sistema de suspensión.</li>
                    <li>Reparación técnica de llantas al calor (Vulcanizado).</li>
                    <li>Balanceo y alineación para carros, camiones, tractomulas.</li>

                    </ul>

                    <h3>¿Como agendar una cita LML?</h3>
                    <ul>
                    <li>Seleccione un dia de su preferencia en el calendario.</li>
                    <li>Registre los datos del formulario.</li>
                   
                    <li>Usted podrá modificar los datos de su cita, seleccionando la cinta que se creo en su calendario.</li>
                    <li>Si no puede asistir a la cita, recuerde eliminarla dando click en la cinta, luego seleccione la opcion de eliminar.</li>
                    <li>Recuerde revisar la dirección de nuestra empresa en el mapa.</li>
                    </ul>
                  
                  </div>

              </div> 
                
              
                
    
                    
    
                
            </div>
           

            <div class="card total1">
               
                    <div class="info-detail">
                    
                    </div>
                   
                    <div id='calendar'></div>
                                    
             

            </div>
            
            <div class="card total2">
               
                    <div class="info-detail">
                    
                
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.595808211346!2d-74.14764538255615!3d4.665928400000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c6058869ac1%3A0xd1c32cd9683c7527!2zQWMgMTMgIzkwLCBGb250aWLDs24sIEJvZ290w6E!5e0!3m2!1ses!2sco!4v1662143583760!5m2!1ses!2sco"  width="760" height="660" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
                
             

            </div>
            

           



    </main>

    <div class="modal"  id="evento" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="tituloEvento"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body1">
        <br>
        <h5>Identificador de la cita</h5>
     
        <h6 id="idEvento"></h6>
        <br>
        <h5>Descripción de la cita</h5>
    
         <h6 id="descripcionEvento"></h6>
      
        <br>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
        <a type="button" class="btn btn-danger" id="btnEliminar">Eliminar</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal"  id="eventoAcciones" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agendador de citas LML</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
                <form class="formularioAgendar" method="POST" action="../../controllers/agendar.php" >

            
                     <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Registrar un titulo que identifique su problema</small>
                     </div>
                     <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3" required></textarea>
                        <small id="helpId" class="form-text text-muted">Registrar la descripción del problema de su vehiculo</small>
                     </div>
                     <div class="form-group">
                        <label for="fecha">Fecha de inicio</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Agregar una fecha para la cita" required>
                        <small id="helpId" class="form-text text-muted">Registrar la fecha de su preferencia</small>
                     </div>
                     <div class="form-group">
                        
                        <label for="hora">Hora</label>
                        <input type="time" class="form-control" name="txtTime" id="txtTime" value="10:30" aria-describedby="helpId" placeholder="Agregar una hora" required>
                        <small id="helpId" class="form-text text-muted">Registrar la hora de su preferencia</small>
                     </div>
                     <div class="form-group">
                     <label for="fecha">Fecha de fin</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="Agregar una fecha para la cita" required>
                        <small id="helpId" class="form-text text-muted">Finalizacion de su cita</small>
                     </div>
                     <div class="form-group">
                        <label for="color">Color del texto</label>
                        <input type="color" class="form-control" name="txtColor" required id="txtColor" value="#ff0000" aria-describedby="helpId" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Seleccione un color</small>
                     </div>
                     <div class="form-group">
                        <label for="color">Color de fondo</label>
                        <input type="color" class="form-control" name="txtColor2" id="txtColor2" value="#ff0000" aria-describedby="helpId" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Seleccione un color</small>
                     </div>

                     
                

      </div>
      <div class="modal-footer">
        <input type="submit" name="Enviar" class="btn btn-success" >
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </form> 
        
      </div>
  
    </div>
  </div>

     
</div>

<script>

   

         /* var NuevoEvento;
          $('#btnGuardar').click(function(){
                RecolectarDatosGUI();
                FullCalendar.Calendar('renderEvent',NuevoEvento);
                $("#eventoAcciones").modal('toggle');

          });
          
          
          function RecolectarDatosGUI(){
                       NuevoEvento= {
                        //title: document.querySelector('#txtTitle').value, 
                          id:$('txtID'),
                          title: $('#txtTitulo').val(),
                          descripcion: $('#txtDescripcion').val(),
                          start: $('#start').val()+" "+$('#txtTime').val(),
                          end: $('#end').val(),
                          color: $('#txtColor').val(),
                          textColor:"FFFFFF"
      
                          
                        };

          }*/
</script>
<div class="modal"  id="eventoModificar" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar cita LML</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
                <form class="formularioAgendar" id="modificar" method="POST" >

                       <input type="hidden" class="form-control" name="idEvento" id="idEvento" placeholder="Agregar un titulo">
                     <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Registrar un titulo que identifique su problema</small>
                     </div>
                     <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3"></textarea>
                        <small id="helpId" class="form-text text-muted">Registrar la descripción del problema de su vehiculo</small>
                     </div>
                     <div class="form-group">
                        <label for="fecha">Fecha de inicio</label>
                        <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Agregar una fecha para la cita" required>
                        <small id="helpId" class="form-text text-muted">Registrar la fecha de su preferencia</small>
                     </div>
                     <div class="form-group">
                        
                        <label for="hora">Hora</label>
                        <input type="time" class="form-control" name="txtTime" id="txtTime" value="10:30" aria-describedby="helpId" placeholder="Agregar una hora" required>
                        <small id="helpId" class="form-text text-muted">Registrar la hora de su preferencia</small>
                     </div>
                     <div class="form-group">
                     <label for="fecha">Fecha de fin</label>
                        <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="Agregar una fecha para la cita" required>
                        <small id="helpId" class="form-text text-muted">Finalizacion de su cita</small>
                     </div>
                     <div class="form-group">
                        <label for="color">Color del texto</label>
                        <input type="color" class="form-control" name="txtColor" id="txtColor" value="#ff0000" aria-describedby="helpId" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Seleccione un color</small>
                     </div>
                     <div class="form-group">
                        <label for="color">Color de fondo</label>
                        <input type="color" class="form-control" name="txtColor2" id="txtColor2" value="#ff0000" aria-describedby="helpId" placeholder="Agregar un titulo" required>
                        <small id="helpId" class="form-text text-muted">Seleccione un color</small>
                     </div>

                     
                

      </div>
      <div class="modal-footer">
        <input type="submit" name="Editar" id="Editar" class="btn btn-success" >
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </form> 
        
      </div>
  
    </div>
  </div>

     
</div>
<script>
 /* $("#editEvent").on("submit",function(event){

      event.preventDefault();
      $.ajax({
          method: "POST",
          url: "../../controllers/agendarUpdate.php",
          data: new FormData(this),
          contentType: false,
          processData: false,
          succes:function(retorna){
            if(retorna['sit']){
              location.reload();
            }else{
               
              $("#msg-cad").html(retorna['msg']);
            }
          }


      })


  });*/



</script>


<!-- 
  <h4>Tipo de carrocería</h4>
                     <select name="carroceria" class="box">
                         <Opciones de la lista 
                         <option value="1">Sedán</option>
                         <option value="2" selected>Hatchback</option>  Opción por defecto 
                         <option value="3">Suv</option>
                         <option value="4">Pick-Up</option>
                         <option value="5">Minivan</option>
                         <option value="6">Crossover</option>
                     </select>
              
                     <h4>Cantidad de ejes</h4>
                     <select name="ejes" class="box">
                          Opciones de la lista 
                         <option value="1">2-Ejes</option>
                         <option value="2" selected>3-Ejes</option>  Opción por defecto 
                         <option value="3">4-Ejes</option>
                         <option value="4">5-Ejes</option>
                         <option value="5">6-Ejes</option>
                     </select>
                 
                     <h4>Marca del vehículo</h4>
                     <select name="vehiculo" class="box">
                         Opciones de la lista 
                         <option value="1">Ford</option>
                         <option value="2" selected>Chevrolet</option> Opción por defecto 
                         <option value="3">Renault</option>
                         <option value="4">Kenworth</option>
                         <option value="5">Toyota</option>
                     </select>
                
                     <h4>Modelo del vehículo</h4>
                     <input type="number" name="modelo" class="box" placeholder="2012">
                  
                     <h4>Seleccione el servicio que desea</h4>
                     <select name="servicio" class="box">
                         <!-- Opciones de la lista 
                         <option value="1">Vulcanizado</option>
                         <option value="2" selected>Despinchar</option> <!-- Opción por defecto 
                         <option value="3">Regrabado</option>
                         <option value="4">Mantenimiento</option>
                         <option value="5">Otro</option>
                     </select>
               
                
                     <h4>Registre una observación</h4>
                     <input type="text" name="observacion" class="box">

                     <input type="submit" name="agendar" value="Agendar cita" class="btn">

-->

</body>
</html>