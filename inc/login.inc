
<form id="registerForm" action="control_acceso.php" method="post"
	onSubmit="return memberValidation(this)">
	<div id="userNameBlock">
		<label for="userName">
			<b>Usuario:</b>
		</label>
		<input type="text" id="userName" name="userName" placeholder="mi_nombre_usuario" />
	</div>
	<div id="passwordBlock">
		<label for="password">
			<b>Contraseña:</b>
		</label>
		<input type="password" id="password" name="password" placeholder="Contraseña"
			pattern="[A-Za-z0-9]{6}"
		/>
	</div>
	<input type="submit" id="submit" name="submit" value="Entrar">
</form>