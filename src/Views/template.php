<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandbox E-commerce</title>
    <link rel="stylesheet" href="assets/css/template.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="#home">SANDBOX E-COMMERCE</a>
  <?php if(!isset($_SESSION['login_data'])): ?>
  <div class="login-container">
    <form action="login" method="post">
      <input type="text" placeholder="e-mail" name="email">
      <input type="password" placeholder="senha" name="password">
      <button type="submit">Login</button>
      <button><a href="http://local:8080/sandbox-ecommerce/login/signup">Cadastrar</a></button>
    </form>
  <?php else: ?>
    <?php echo "Seja bem vindo,{$_SESSION['login_data']['name']}";?>
  <?php endif ?>  
  </div>
</div> 
    <?php $this->loadView($viewName,$viewData); ?>

</body>
</html>