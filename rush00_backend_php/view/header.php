<?php
  session_start();
  $list_cat = get_categories();
//   print_r($list_cat);
// //   print_r($_GET);
// 	print_r($_POST);
	if ($_GET['action'] == 'change')
		$list_item = get_list_items_cat($_POST['cat']);
	else
		$list_item = get_list_items();
?>
<body id="home">
      <div class="header">
          <h2>TECH STORE</h2>
          <p>Мы открылись!</p>
      </div>

  <ul>
      <li><a class="active" href="#home">Домой</a></li>
      <li><a class="dropbtn">Каталог</a>
          <div class="dropdown">
		  <form action="index.php?action=change" method="post">
	<select name="cat" id="">
<?php
		foreach($list_cat as $key => $value){
?>
			<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
<?php
		}
?>
	</select>
	<button type="submit">Изменить</button>
</form>
          </div>
		</li>
	
	<li class="cart buttons-right"><a href="cart.php"><img src="pictures/cart.svg"></a></li>
	<?php
		if (isset($_SESSION['active_session']) && ($_SESSION['group_id'] == 10 ||$_SESSION['group_id'] == 100)){
	?>
	<li class="user buttons-right"><a href="../create_user.php"><img src="pictures/user.svg"></a></li>
	<?php
	}
	?>
</ul>