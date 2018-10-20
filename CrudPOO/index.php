<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CRUD AJAX POO(PDO)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Estilos -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Javascript -->
	<script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
<!--Cuadro principal  -->
<div  class="cuadro">
	<h3 class="text-uppercase text-center mt-2">CRUD + AJAX + POO (PDO)</h3>
	<!-- Botón abrir modal -->
	<div class="form-group">
		<button id="btn_insertar" class="btn btn-default" title="Insertar nuevo usuario" data-toggle="modal" data-target="#ventanaModal"><i class="fa fa-user"></i></button>
	</div>

	<!-- Input campo de búsqueda -->
	<div class="form-group">
		<input type="text" id="txt_busqueda" class="form-control" placeholder="Escriba aquí su término de búsqueda">
	</div>

	<!-- Tabla -->
	<div id="div_tabla">

	</div>
	<!-- Fin Tabla -->

	<!-- Paginación -->
	<div class="d-flex justify-content-center paginas" >
		<nav aria-label="Page navigation example" class="">
		  <ul class="pagination" id="pagination">

		  </ul>
		</nav>
	</div>
	<!-- Fin Paginación -->
</div>
<!--Fin cuadro principal   -->

<!-- Modal-->
<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    	<!-- div para mostrar la alerta -->
  	<div id="alerta"></div>

	<!-- Cabecera modal -->
    	<div class="modal-header">
       	 	<h5 class="modal-title h4 text-center text-uppercase">Insertar un nuevo usuario</h5>
        	 	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	 		 <span aria-hidden="true">&times;</span>
       		 </button>
     	</div>
     	<!-- Fin cabecera modal -->

	<!-- Cuerpo  modal -->
      	<div class="modal-body">
		<!-- Gif "Cargando" -->
		<div class="form-group d-none" id="gif">
			<label><img src="images/ajax-loader.gif"> Procesando...</label>
		</div>
		<!-- Campos ocultos -->
		<div class="form-group">
			<input type="hidden" id="opcion">
			<input type="hidden" id="id">
		</div>
		<!-- Campo nombre -->
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" id="txt_nombre" class="form-control" placeholder="Ingrese su nombre">
		</div>
		<!-- Campo país -->
		<div class="form-group">
			<label for="">País: </label>
			<input type="text" id="txt_pais" class="form-control" placeholder="Ingrese su país">
		</div>
		<!-- Campo edad -->
		<div class="form-group">
			<label for="">Edad: </label>
			<input type="text" id="txt_edad" class="form-control" placeholder="Ingrese su edad">
		</div>
     	 </div>
     	 <!-- Fin cuerpo modal -->

	<!-- Pie del modal -->
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary" id="btn_guardar_cambios">Guardar cambios</button>
	</div>
	<!-- Fin pie modal -->
</div>
</div>
</div>
<!-- Fin modal -->
</body>
</html>
