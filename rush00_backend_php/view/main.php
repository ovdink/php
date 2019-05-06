  <!-- <div class="block">
    <h3>Здесь может быть ваша реклама или нет</h3>
  </div> -->
  <?php
if (!isset($_SESSION['active_session'])){
?>
  <form action="../login.php" method="get">
  <h1>Войти</h1>
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
<form action="../logout.php" style="text-align: right;">
	<label for=""><?php echo $_SESSION['active_session'];?></label>
	<button type="submit">LogOut</button>
	<br>
</form>
<?php
	if ($_SESSION['group_id'] == 100){
?>
	<form action="drop_db.php"><button type="submit">DropDB</button></form>
  <form action="../page_show_orders.php"><button type="submit">Посмотреть заказы</button></form>
  <form action="../create_user.php"><button type="submit">Create user</button></form>
<?php
	}
?>
<?php
}
?>
  </div>
  <div class="gallery">
      <div class="line" ><?php echo $list_cat[$_POST['cat']]['name'];?></div>
    <div class="grid-row">
    <?php
	foreach($list_item as $key => $value){
?>
      <div class="grid-item">
    <form action="../add_to_basket.php" method="post">
      <img src="<?php echo $value['img']?>" alt="<?php echo $value['name']?>">
      <label for="" id="name"><?php echo $value['name']?></label>
      <label for="" id="name"><?php echo $value['description']?></label>
      <input type="hidden" name="product_id" value="<?php echo $value['id']?>">
      <label for="" id="cost"><?php echo $value['cost']?> руб.</label>
      <input type="number" id="count" name="count" min="0" value="0">
      <button>Add to basket</button>
    </form>
  </div>
<?php
}
?>
