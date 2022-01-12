<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <form action="../app/user/register.php" method="POST">
    <label for="login">Login</label>
    <input type="text" name="login">
    <label for="password">Password</label>
    <input type="password" name="password">
    <label for="name">Name</label>
    <input type="text" name="name">
    <label for="email">Email</label>
    <input type="email" name="email">
    <button type="submit" name="btn-register">Enviar</button>
  </form>
</body>

</html>