<?php
    session_start();
    $id=0;
    require_once("../controllers/security.php");
$array_error=[];
//if (isset($_POST["btn-submit"]))

$resultat= $nom=$prenom=$login=$password=$confirmerpassword=$role=" ";

if (isset ($_POST["btn-submit"])){
    valide_info($_POST["nom"],$array_error,"nom");
    valide_info($_POST["prenom"],$array_error,"prenom");
    valide_login($_POST ["login"],$array_error,"login","login invalide");
    valide_info($_POST["password"],$array_error,"password");
    valide_info($_POST["confirmerpassword"],$array_error,"confirmerpassword");


    if (form_valide($array_error) && $_POST["password"]===$_POST["confirmerpassword"]){
        switch($role){
            case "admin": $role = $_POST["admin"];
                break;
            case "visiteur": $role = $_POST["visiteur"];
                break;
            default :
                "" ;
        }
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $login=$_POST["login"];
        $password=$_POST["password"];
        $confirmerpassword=$_POST["confirmerpassword"];
        $_SESSION[$id]=$_POST;
    }
    
}else{
   $_POST["nom"]=$_POST["prenom"]=$_POST["login"]=$_POST["password"]=$_POST["confirmerpassword"]=$_POST["role"]="";
}


?>
















<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container mt-5">
        <div class="container mt-20" >
            <h3 class="text-center text-info " style="text-decoration: underline">Formulaire d'enregistrement</h3>
            <form method="POST" action="">
                <div class="form-group row mt-5">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Nom</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="nom"  placeholder="" value=" <?php echo isset($array_error["nom"]) ? $array_error["nom"] : "";?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["nom"]) ? $array_error["nom"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Prenom</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="prenom"  placeholder="" value="<?php echo isset($array_error["prenom"]) ? $array_error["prenom"] : "";?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["prenom"]) ? $array_error["prenom"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">login</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="login"  placeholder="" value="<?php echo isset($array_error["login"]) ? $array_error["login"] : "";?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["login"]) ? $array_error["login"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Password</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="password"  placeholder="" value="<?php echo isset($array_error["password"]) ? $array_error["password"] : "";?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["password"]) ? $array_error["password"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Confirmer password</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="confirmerpassword"  placeholder="" value=" <?php echo isset($array_error["confirmerpassword"]) ? $array_error["confirmerpassword"] : "";?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["confirmerpassword"]) ? $array_error["confirmerpassword"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Role</label>
                    <div class="col-sm-1-8">
                         <select class="form-control " name="$role" id="">
                           <option value="admin">Admin</option>
                           <option value="visiteur">Visiteur</option>
                         </select>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn_submit" value="btn_enregistrer">Enregister</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>