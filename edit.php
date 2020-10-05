<?php
require_once('DBConnection.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $idget=mysqli_query($con,"SELECT * FROM users WHERE id=$id");
    $ftch=mysqli_fetch_array($idget);
}
?>
 <div class="container">
          <h3 class="text-center">Register</h3>
          <form action="" method="post">

          <div class="form-group">
            <label for="">Username</label>
            <input type="text"
              class="form-control" name="username" value="<?php echo $ftch[1] ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">User Password</label>
            <input type="text"
              class="form-control" name="password" value="<?php echo $ftch[2] ?>" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <img style="float:right" src="<?php echo $ftch[3] ?>" title="<?php echo $ftch[1] ?>"  width="500px" height="500px">

          <div class="form-group">
            <label for="">Image</label>
            <input type="file"
              class="form-control" name="image"  id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>

          <input name="upd" id="" class="btn btn-primary" type="submit" value="Register">
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

if(isset($_POST['upd']))
{
  $name = $_POST['username'];
  $pass = $_POST['password'];
  $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_temp = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];
    $target = 'images/'.$img_name;
    move_uploaded_file($img_temp,$target);
  $update = mysqli_query($con,"UPDATE users set username='$name',user_password='$pass' ,std_img='$img' where id=$id");
  if($update)
  {
    header('location:Users_List.php');
  }
}



?>