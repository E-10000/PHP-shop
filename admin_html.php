<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员页面</title>
    <link rel="stylesheet" type="text/css" href="css/table.css"/>
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    <link rel="stylesheet" type="text/css" href="css/button.css"/>
</head>
<body>
    <form action="admin.php" method="post" style="margin: 10px auto; width: 38%;">
        	搜索：<input  name="title" id="title" value=""></input>&nbsp;&nbsp;
        	<input type="submit" name="btn" id="btn" value="查询" />&nbsp;&nbsp;
            <button type="button" onclick="location='admin_add.html'">商品添加</button>&nbsp;&nbsp;
            <button type="button" onclick="location='admin_order.php'">订单表操作</button>&nbsp;&nbsp;
            <button type="button" onclick="location='index.php'">首页</button>&nbsp;&nbsp;
    </form>
    <table>
        <thead>
        	
            <tr>
                <th>商品编号</th>
                <th>商品名</th>
                <th>金额</th>
                <th>商品图片URL</th>
                <th>商品图片缩略图</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php for ($i=0; $i < sizeof($product); $i++): ?>
        <tr>
            <td><?php echo $product[$i]['Pid']; ?> </td>
            <td><?php echo $product[$i]['Pname']; ?> </td>
            <td><?php echo $product[$i]['Ptotal'];?> </td>
            <td>&nbsp;images/product/<?php echo $product[$i]['PIMG'];?> </td>
            <td><img width="64px" height="36px" src="images/product/<?php echo $product[$i]['PIMG'];?>"/></td>
            <td style="text-align:center;">
                <a href="adminEdit.php?id=<?php echo $product[$i]['Pid']; ?>">修改</a>&nbsp;|                
                <a href="adminEdit.php?delete=<?php echo $product[$i]['Pid']; ?>" onclick="return confirm('是否确定删除该商品？');">删除</a>&nbsp;    
            </td>
        </tr>
    <?php endfor ?>
    </table>
</body>
</html>
