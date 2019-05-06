<?php
if (!isset($_SESSION['active_session'])){
?>
	<form action="login.php" method="get">
		Username: <input type="text" name="login" required pattern="^[a-zA-Z]+$" title="Только латинские буквы"/>
		<br />
		Password: <input type="password" name="passwd" required/>
		<input type="submit" name="submit" value="OK"/>
	</form>
<?php
}
else {
//print_r($_SESSION['active_session']);
//print_r($_SESSION);
?>
<form action="logout.php">
	<label for=""><?php echo $_SESSION['active_session'];?></label>
	<button type="submit">LogOut</button>
	<a href="basket_info.php">Basket info</a>
	<br>
</form>
<?php
	if ($_SESSION['group_id'] == 100){
?>
	<form action="drop_db.php"><button type="submit">DropDB</button></form>
	<form action="create_user.php"><button type="submit">Create user</button></form>
<?php
	}
?>
<?php
}
?>