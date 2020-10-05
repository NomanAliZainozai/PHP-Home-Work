<?php
require_once('DBConnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>SMS --- Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <h3 class="text-center">Register</h3>
          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Image</label>
              <input type="file"
                class="form-control" name="image" id=""  placeholder="">
            </div>

          <div class="form-group">
            <label for="">Username</label>
            <input type="text"
              class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">User Password</label>
            <input type="password"
              class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
          
          <input name="reg" id="" class="btn btn-primary" type="submit" value="Register">

          </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['reg']))
{
    $user = $_POST['username'];
    $password = $_POST['password'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_temp = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];
    $target = 'images/'.$img_name;
    move_uploaded_file($img_temp,$target);
    $ins=mysqli_query($con,"INSERT into users (username,user_password,std_img) VALUES ('$user','$password','$target')");

    if($ins)
{
    header('location:Index.php');
}
else{
    
    ?>
    <div class="alert alert-danger" role="alert">
        <strong>Not Inserted</strong>
    </div>
    <?php
    
}
}


?>