<!DOCTYPE html>
<html>
<head>
	<title>HISTORIA CLINICA</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">HISTORIAS <small>Clinicas</small> </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	REGISTRAR
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">					
					<thead>
						<tr>
							<th>Id</th>
							<th>nombre</th>
							<th>historia</th>											
							<th>hora de salida</th>
							<th>hora de retorno</th>
							<th>especialidad</th>
							<th>especialista</th>								
							<th>estado</th>
							<th>opcion</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- agregar modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	REGISTRAR</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/aquí aparecerá el error "hash-add-class" -->
			    <label for="nombre" class="col-sm-2 control-label">nombre</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				<!-- aquí el texto se apper  -->
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="historia" class="col-sm-2 control-label">historia</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="historia" name="historia" placeholder="Historia">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="horasalida" class="col-sm-2 control-label">hora de salida</label>
			    <div class="col-sm-10">
			      <input type="datetime-local" class="form-control" id="horasalida" name="horasalida" placeholder="Hora de salida ">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="horaretorno" class="col-sm-2 control-label">hora de retorno</label>
			    <div class="col-sm-10">
			      <input type="datetime-local" class="form-control" id="horaretorno" name="horaretorno" placeholder="Hora de retorno">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="especialidad" class="col-sm-2 control-label">especialidad</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Especialidad">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="especialista" class="col-sm-2 control-label">especialista</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="especialista" name="especialista" placeholder="Especialista">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">estado</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Completado</option>
			      	<option value="2">Imcompleto</option>
			      </select>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Eliminar</h4>
	      </div>
	      <div class="modal-body">
	        <p>Quieres Eliminar ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Guardar Cambios</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar Mienbro</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/aquí aparecerá el error "hash-add-class" -->
			    <label for="editnombre" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editnombre" name="editnombre" placeholder="Nombre">
				<!-- aquí el texto se apper  -->
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="edithistoria" class="col-sm-2 control-label">historia</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="edithistoria" name="edithistoria" placeholder="Historia">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="edithorasalida" class="col-sm-2 control-label">hora de salida</label>
			    <div class="col-sm-10">
			      <input type="datetime-local" class="form-control" id="edithorasalida" name="edithorasalida" placeholder="Hora de salida">
			    </div>
			  </div>


			  <div class="form-group">
			    <label for="edithoraretorno" class="col-sm-2 control-label">hora de retorno</label>
			    <div class="col-sm-10">
			      <input type="datetime-local" class="form-control" id="edithoraretorno" name="edithoraretorno" placeholder="Hora de retorno">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editespecialidad" class="col-sm-2 control-label">especialidad</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editespecialidad" name="editespecialidad" placeholder="Especialidad">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editespecialista" class="col-sm-2 control-label">especialista</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editespecialista" name="editespecialista" placeholder="Especialista">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="editActive" class="col-sm-2 control-label">estado</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editActive" id="editActive">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Completado</option>
			      	<option value="2">Imcompleto</option>
			      </select>
			    </div>
			  </div>	
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>

</body>
</html>