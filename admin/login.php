<?php 
  error_reporting(0);
  session_start();

  if(isset($_SESSION['username'])){
    header("Location: admin.php");
  }

  if(isset($_POST['submit'])){
    $_username = 'admin';
    $_password = 'admin';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $_username AND $password == $_password){
      $_SESSION['username'] = $username;
      header('Location: admin.php');
    }else{
      echo "<script>alert('Username atau Password salah, silahkan coba lagi!')</script>";
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="stylee.css" rel="stylesheet">
    <title>Login</title>
  </head>

  <body>
    <div class="container">
      <div class="d-flex align-items-center justify-content-center" style="height: 100vh; width: 100%;">
        <div class="card" style="width: 50%">
          <div class="card-body">
            <h1 class="text-center">Login</h1>
            <form action="" method="POST" class="login-email">
              <div class="form-group">
                <label class="form-control-label">Username</label>
                <input type="text" placeholder="Username" name="username" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                <label class="form-control-label">Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control" required>
              </div>
              <div class="d-grid gap-2">
                <button name="submit" class="btn btn-primary mt-3">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
