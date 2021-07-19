<?php 
include('header.php'); 
include('./../../MODEL/Album.php');
$objAlbum = new Album();
?>
<style>
	.dropdown-item{
		cursor: pointer;
	}
</style>
<section class="container text-white">
	<div class="row">
		<div class=" col-8">
			<label class="text-info"><b>Member</b>: <?php echo $_SESSION['USER']['Name'];?></label>
		</div>		
		<div class="col-4">                
			<a class="m-l-5 text-danger" href="./../../index.php">Cerrar sesión</a>
		</div>
	</div>
	<section class="row">
		<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-bottom">  		
			<ul class="navbar-nav">
				<li class="nav-item m-1">				
					<div class="nav-link dropup">					
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Photos</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="?section=Photo"><b>Alls</b></a>
							<a class="dropdown-item" data-toggle="modal" data-target="#myModal">Upload</a>
						</div>
					</div>
				</li>
				<li class="nav-item m-1">				
					<div class="nav-link dropup">					
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Albums</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="?section=Album"><b>Alls</b></a>
							<a class="dropdown-item" data-toggle="modal" data-target="#myModalAlbum">Create</a>
						</div>
					</div>
				</li>
				<li class="nav-item m-1">				
					<div class="nav-link dropup">					
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Tags</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="?section=Tag"><b>Alls</b></a>
							<a class="dropdown-item" data-toggle="modal" data-target="#myModalTag">Create</a>
						</div>
					</div>
				</li>			
				<li class="nav-item m-1">				
					<div class="nav-link dropup">					
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Locations</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="?section=Location"><b>Alls</b></a>
							<a class="dropdown-item" data-toggle="modal" data-target="#myModalLocation">Create</a>
						</div>
					</div>
				</li>
				<li class="nav-item m-1">				
					<div class="nav-link dropup">					
						<a class="btn btn-primary" href="Member.php"> Home</a>	
					</div>
				</li>
			</ul>
		</nav>
		<?php
		if(isset($_GET['section'])){
			switch($_GET['section']){
				case 'Photo':
					include('Photo.php');
				break;
				case 'Album':
					include('Album.php');
				break;
				case 'Location':
					include('Location.php');
				break;
				case 'Tag':
					include('Tag.php');
				break;
			}
		}else{
		?>
			<div class="container">
				<div class="jumbotron text-info">
					<h1>Makita photos</h1>
					<p>Sube fotos, crea albumnes, etiquetas y locaciones.</p>
					<p class="h5 text-success">Ultimas fotos subidas:</p>								
				</div>
				<div class="row">
					<?php 
						$arrLast = $objAlbum->get_last_photos();
						foreach ($arrLast as $value) {													
					?>					
						<div class="col-sm-4 col-md-4 col-12 m-1">	
							<div class="container">
				                <div class="card" style="width:300px">
				                    <img class="card-img-top" src="<?php echo $value['ImagenPath']; ?>" alt="Card image" style="width:100%">
				                    <div class="card-body">
				                        <h4 class="card-title text-info"><b><?php echo $value['Title']; ?></b> <?php echo $value['UploadDate']; ?></h4>
				                        <p class="card-text"><?php echo $value['Description']; ?></p>
				                    </div>			                    
				                </div>		                
				            </div>			
		            	</div>			
		            	<?php } ?>
					</div>
			</div>
		<?php
		}
		?>						
	</section>
</section>
<!-- seccion modal-->
<!-- The Modal create photo -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload new photo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>      
      <div class="modal-body">
		<form enctype="multipart/form-data" action="./../../CONTROLLER/Photo.php" method="POST" class="was-validated">
			<input type="hidden" name="create_photo" value="hi">
			<div class="form group">
				<label for="Album">Album:</label>
				<select id="Album" name="Album" class="form-control" required="">
					<option value=""></option>
					<?php 
					//get albums
					$arrAlbums = $objAlbum->lista_albums('');
					foreach ($arrAlbums as $value) {											
					?>				
						<option value="<?php echo $value['ID']; ?>"><?php echo $value['Title'];?></option>					
					<?php } ?>
				</select>
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Seleccione album</div>
			</div>
			<div class="form group">
				<label for="Title">Photo:</label>
				<input id="Title" name="Photo" type="file"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Seleccione el archivo desde su equipo</div>
			</div>
			<div class="form group">
				<label for="Title">Title:</label>
				<input id="Title" name="Title" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese valor para title</div>
			</div>
			<div class="form group">
				<label for="Location">Location:</label>
				<select id="Location" name="Location" class="form-control" required="">
					<option value=""></option>
					<?php 
					//get albums
					$arrAlbums = $objAlbum->lista_locations('');
					foreach ($arrAlbums as $value) {											
					?>				
						<option value="<?php echo $value['ID']; ?>"><?php echo $value['Name'];?></option>					
					<?php } ?>
				</select>
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Seleccione location</div>
			</div>		
			<div class="form group">
				<label for="des">Description:</label>
				<input id="des" name="des" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese una descripción</div>
			</div>
			<div class="form group">
				<label for="privacy">Privacy:</label>
				<select id="privacy" name="privacy" class="form-control" required="">
					<option value=""></option>
					<option value="1">Privada</option>
					<option value="2">Publica</option>
				</select>
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese el telefono</div>				
			</div>
			<button class="btn btn-primary">Create</button>
		</form>
      </div>      
    </div>
  </div>
</div>

<!-- The Modal create album -->
<div class="modal" id="myModalAlbum">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create new album</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>      
      <div class="modal-body">
		<form action="./../../CONTROLLER/Album.php" method="POST" class="was-validated">			
			<input type="hidden" name="create_album">
			<div class="form group">
				<label for="Title">Title:</label>
				<input id="Title" name="Title" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese valor para title</div>
			</div>		
			<div class="form group">
				<label for="des">Description:</label>
				<input id="des" name="des" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese una descripción</div>
			</div>
			<button class="btn btn-primary">Create</button>
		</form>
      </div>      
    </div>
  </div>
</div>


<!-- The Modal create location -->
<div class="modal" id="myModalLocation">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create new location</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>      
      <div class="modal-body">
		<form action="./../../CONTROLLER/Location.php" method="POST" class="was-validated">			
			<input type="hidden" name="create_location">
			<div class="form group">
				<label for="Title">Title:</label>
				<input id="Title" name="Title" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese valor para title</div>
			</div>		
			<div class="form group">
				<label for="des">Shortname:</label>	
				<input id="des" name="des" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese un Shortname</div>
			</div>
			<button class="btn btn-primary">Create</button>
		</form>
      </div>      
    </div>
  </div>
</div>


<!-- The Modal create Tag -->
<div class="modal" id="myModalTag">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create new Tag</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>      
      <div class="modal-body">
		<form action="./../../CONTROLLER/Tag.php" method="POST" class="was-validated">			
			<input type="hidden" name="create_tag">
			<div class="form group">
				<label for="Title">Title:</label>
				<input id="Title" name="Title" type="text"  class="form-control" required="">
				<div class="valid-feedback">ok</div>
				<div class="invalid-feedback">Ingrese valor para title</div>
			</div>
			<button class="btn btn-primary">Create</button>
		</form>
      </div>      
    </div>
  </div>
</div>

<?php include('footer.php') ?>