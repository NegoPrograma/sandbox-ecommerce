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
  <div class="login-container">
    <form action="login">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="pass">
      <button type="submit">Login</button>
    </form>
  </div>
</div> 
    <?php $this->loadView($viewName,$viewData); ?>

</body>
</html>