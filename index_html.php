<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		
	</head>
	<body>
		<div id="top">
		    <div class="top-cent" >	
		       <a href="index.php" class="top-cent-left">
		            DIMAO&nbsp&nbsp&nbsp&nbsp&nbsp上地猫，就够了  
		       </a>
		       <!--这里进行GET传值$_GET['action'] == logout-->
		       <a href="?action=logout" class="top-cent-right">退出</a>
		       <a href="" class="top-cent-right">当前用户： 
			        <span>
			        	<?php
			        		$uno1=$_SESSION['usersinfo'];
							$uno=$uno1['Uno'];
			        		echo "$uno";  	
			        	?>
			        </span>
		       </a>
		       
		       <a href="?action=shopCar" class="top-cent-right">购物车 
		       	<span id="">(
		       		<?php if(isset($_SESSION['pid'])){		       				       									
					$pid_length=$_SESSION['pid'];
					echo sizeof($pid_length) ;
			       	}else{
			       		echo 0;
			       	}?> 
			       	)
		       	</span>
		       	
		       	</a>
		       <a href="admin.php" class="top-cent-right">管理员页面</a>
		    </div>
		</div>
		
		<div id="mid">
			<div class="shopTitle">
				商品
			</div>
			<div class="shop">
				<?php foreach($product as $key => $v): ?>
				
														
				<div class="thing">
					<a href=""><img src="images/product/<?php echo $product[$key]["PIMG"] ?>"/></a>
					
					<div class="shopName"><a href=""><?php echo $product[$key]["Pname"] ?></a> </div>
					<div class="word">
						<a href=""><?php echo $product[$key]["Pword"] ?></a>				
					</div>
					<div class="money">价格：<?php echo $product[$key]["Ptotal"] ?>	</div>
					<div class="add_shopCar">
									
						<a class="AddShop" href="index.php?pid=<?php echo $product[$key]["Pid"];?>" >
							加入购物车
						</a>
																				
					</div>
				</div>
				
				<?php endforeach; ?>
			</div>
			
		</div>
		
	</body>
</html>
