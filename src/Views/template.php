<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandbox E-commerce</title>
    <link rel="stylesheet" href="assets/css/template.css">
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
</head>
<body>
<div class="topnav">
  <a class="active" href="http://local:8080/sandbox-ecommerce/products">SANDBOX E-COMMERCE</a>
  <?php if(!isset($_SESSION["login_data"])): ?>
  <div class="login-container">
    <form action="http://local:8080/sandbox-ecommerce/login" method="post">
      <input type="text" placeholder="e-mail" name="email">
      <input type="password" placeholder="senha" name="password">
      <button class="login_button"type="submit">Login</button>
      <button><a href="http://local:8080/sandbox-ecommerce/login/signup">Cadastrar</a></button>
    </form>
  <?php else: ?>
    <?php echo "Seja bem vindo,".$_SESSION['login_data']['name']."!";?>
    <button><a href="http://local:8080/sandbox-ecommerce/login/logout">Sair</a></button>
  <?php endif ?>  
  </div>
</div> 
    <?php $this->loadView($viewName,$viewData); ?>

</body>
</html>