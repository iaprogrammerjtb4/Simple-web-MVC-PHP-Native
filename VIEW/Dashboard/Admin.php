<?php 
    include('header.php');
    include('./../../MODEL/Admin.php');
    // instan.. class admin
    $objAdmin = new Admin();    
    if(isset($_GET['ACTION'])){
        if($_GET['ACTION']=='go') {                            
            $objAdmin->action('Inactivar',$_GET['userID']);
        }
        if($_GET['ACTION']=='Activar') {                
            $objAdmin->action('Activar',$_GET['userID']);
        }
    }
 ?>
<section class="container text-white">
    <div class="row">
        <div class="col-6">
            <label class="text-info"><b>Admin</b>: <?php echo $_SESSION['USER']['Name'];?></label>
        </div>
        <div class="col-6">                
            <a class="m-l-5 text-danger" href="./../../index.php">Cerrar sesión</a>
        </div>
    </div>

    <h2 class="text-white">Members:</h2>
    <p>Estos son todos los usuarios registrados:</p>   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Crear
    </button>         
    <table class="table table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Email</th>
            <th>MD5</th>
            <th>Name</th>
            <th>PhoneNum</th>
            <th>Address</th>
            <th>stats</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $arrMembers = $objAdmin->lista_users();
                foreach ($arrMembers as $value) {
                ?>       
                <tr>
                    <td><?php echo $value['ID'] ?></td>
                    <td><?php echo $value['rol'] ?></td>
                    <td><?php echo $value['Email'] ?></td>
                    <td><?php echo $value['Password'] ?></td>
                    <td><?php echo $value['Name'] ?></td>
                    <td><?php echo $value['PhoneNum'] ?></td>
                    <td><?php echo $value['Address'] ?></td>
                    <td><?php echo $value['stats'] ?></td>    
                    <?php
                    if($value['stats']=='ACTIVO'){?>
                        <td><a class="btn btn-danger" href="?ACTION=go&userID=<?php echo $value['ID'];?>">Inactivar</a></td>                
                    <?php }else{ ?>                            
                        <td><a class="btn btn-danger" href="?ACTION=Activar&userID=<?php echo $value['ID'];?>">Activar</a></td>                
                    <?php } ?>
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>        
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Crear member</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>                
                <!-- Modal body -->
                <div class="modal-body">
                <form action="./../../CONTROLLER/Admin.php" method="POST" class="was-validated">
                    <div class="form group">
                        <label for="Name">Name:</label>
                        <input id="Name" name="Name" type="text"  class="form-control" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Ingrese valor para name</div>
                    </div>
                    <div class="form group">
                        <label for="Role">Role:</label>
                        <select id="Role" name="Role" class="form-control" required="">
                            <option value=""></option>
                            <option value="1">Administrador</option>
                            <option value="2">Member</option>
                        </select>
                        <div class="valid-feedback">Seleccione rol</div>
                        <div class="invalid-feedback">Seleccione rol</div>
                    </div>
                    <div class="form group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="text"  class="form-control" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Ingrese el email</div>
                    </div>
                    <div class="form group">
                        <label for="pass">Contraseña:</label>
                        <input id="pass" name="pass" type="text"  class="form-control" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Ingrese la contraseña</div>
                    </div>
                    <div class="form group">
                        <label for="tel">Telefono:</label>
                        <input id="tel" name="tel" type="tel"  class="form-control" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Ingrese el telefono</div>
                    </div>
                    <div class="form group">
                        <label for="address">Address:</label>
                        <input id="address" name="address" type="text"  class="form-control" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Ingrese la dirección</div>
                    </div>
                    <button class="btn btn-primary">Create</button>
                </form>
                </div>
            
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>                
            </div>
        </div>
    </div>
</section>    
<?php include('footer.php') ?>