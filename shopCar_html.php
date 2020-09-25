<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>购物车</title>
		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
		<script src="js/shopCar.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<link rel="stylesheet" type="text/css" href="css/shopCar.css"/>
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
		       	<span >(
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
			<form action="pay.php" method="post">
			<?php if(!isset($shopCarProductArr)){?>
				<div class="oneGood" >
					空空如也。。
				</div>
			<?php } else { ?>
				
			<?php foreach($shopCarProductArr as $key =>$v): ?>			
			<input type="hidden" name="hid" id="hid" value="<?php echo $key;?>" />
			<input type="hidden" name="hidPid" id="hidPid" value="<?php echo $shopCarProductArr[$key]["Pid"];?>" />
			<div class="oneGood" >
				<img  src="images/product/<?php echo $shopCarProductArr[$key]["PIMG"] ?>"/>
				<div class="GoodName">
					<?php echo $shopCarProductArr[$key]["Pname"] ?>
					 &nbsp&nbsp&nbsp&nbsp
					 <a href="shopCar.php?
					 	hid=<?php echo $key;?>
					 	&&hidPid=<?php echo $shopCarProductArr[$key]["Pid"];?>
					 	">删除</a> 
				</div>
			
			
				
				<!--该商品id-->
				<input type="hidden" name="pid[]" id="" value="<?php echo $shopCarProductArr[$key]["Pid"];?>" />
			
				<div class="oneMoney">
					单件价格： <span class="aMoney"><?php echo $shopCarProductArr[$key]["Ptotal"] ?></span>
				</div>
				<div class="numAndHow">
					数量： <input class="shopNum" type="text" name="shopNum[]" id="shopNum" value="1" />
					<input class="jian" type="button" name="jian" id="jian" value="-" />
					<input class="jia" type="button" name="jia" id="jia" value="+" />
				</div>
				<div class="sumMoney">
					单件总价： <span class="sumMoneyWord">
							<?php echo  $shopCarProductArr[$key]["Ptotal"] ?>
							</span>
					
				</div>	
			</div>
			<?php endforeach; ?>
			
			
			<div class="sumTotal">
				共 <?php echo sizeof($shopCarProductArr);?> 件商品 ，
				总价：<span id="sumTotalWord">  
					<?php $sum=0;
					foreach($shopCarProductArr as $key2 =>$v2){
						$sum=$sum+$shopCarProductArr[$key2]["Ptotal"];
					}echo $sum;	?>
					 元</span> 
				<br />
				
				<input type="submit" name="SsumTotal" id="SsumTotal" value="提交订单" />
				
			</div>
				
			</form>
			
			</div>
			<?php }?>
		</div>
	</body>
</html>
