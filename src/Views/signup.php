<form method="post">
	Nome:
	<input type="text" name="name" required><br>
	E-mail:
	<input type="email" name="email" required><br>
	Senha:
	<input type="password" name="password" required><br>
	Confirme sua senha:
	<input type="password" name="password_confirm" required><br>
	CPF:
	<input type="text" name="cpf" required><br>
	<input type="submit" value="Entrar">
</form>

<?php if(isset($viewData["message"])) 
		echo $viewData["message"]; 
?>