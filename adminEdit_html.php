<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员编辑界面</title>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <form action="adminEdit.php" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="pid" id="pid" value="<?php echo $product['Pid'];?>" />
        <table>
        <!-- 标题开始 -->
            <tr>
                <td width="10%" > 商品名</td>
                <td width="40%" ><input type="text" id='pname' name="pname" value="<?php echo $product['Pname'];?> "></td>
            </tr>
        <!-- 标题结束 -->
        
        <tr>
            <td width="10%" >金额</td>
            <td width="40%" ><input type="text" id='ptotal' name="ptotal" value="<?php echo $product['Ptotal'];?> "></td>
        </tr>
        <!-- 内容 -->
        <tr>
            <td width="10%" >商品简介</td>
            <td colspan="3">
                <textarea name="pword" id="pword" rows="15" style="width:100%;"><?php echo $product['Pword'];?></textarea>
            </td>
        </tr>
        <!-- 内容 -->
      	<!--选择图片-->
      	<tr>
      		<td>上传图片：</td>
      		<td><input name="pic" id="pic" type="file" onchange="xmTanUploadImg(this)"/></td>
      		<td>如果没有选择图片或者选择的文件不是图片，显示原图片</td>
      	</tr>
		 <!--选择图片-->
		 <!--图片缩略图-->
		 <tr>
		 	<td>图片图片：</td>
		 	<td>
		 		<!--<img height="160px" src="<?php echo './'.$info['id'].'.jpg?rand='.rand(); ?>" onerror="this.src=''" />-->
		 		<img id="selecting" height="160px" src="" onerror="this.src='images/product/<?php echo $product['PIMG']?>'" />
		 	</td>
		 </tr>
		 <!--图片缩略图-->
		 
        <tr>
                <td ></td>
                <td colspan="3">
                    <input type="submit" class="btn btn-primary" value="保存"/>
                    &nbsp;&nbsp;
                    <a href="admin.php?action=back"><input type="button" class="btn btn-success" name="backid" id="backid" value="返回"/></a>
                    &nbsp;&nbsp;<font color="red"></font>
                </td>
        </tr>
        </table>
    </form>
    
    <script type="text/javascript">
     $('#pic').change(function () {
        // 先获取用户上传的文件对象
        let fileObj = this.files[0];
        // 生成一个文件读取的内置对象
        let fileReader = new FileReader();
        // 将文件对象传递给内置对象
        fileReader.readAsDataURL(fileObj); //这是一个异步执行的过程，所以需要onload回调函数执行读取数据后的操作
        // 将读取出文件对象替换到img标签
        fileReader.onload = function(){  // 等待文件阅读器读取完毕再渲染图片
           $('#selecting').attr('src',fileReader.result)
        }
    });
    </script>
</body>
</html>