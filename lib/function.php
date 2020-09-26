<?php

function createCode($char_len){
	$char = array_merge(range('A','Z'), range('a','z'),range(1, 9));

	//随机获取$char_len个码值的键
	//array_rand  从$char中取$char_len个元素
	$rand_keys = array_rand($char, $char_len);
	
	//判断当码值长度为1时，将其放入数组中
	if ($char_len == 1) {
		$rand_keys = array($rand_keys);
	}
	
	//打乱随机获取的码值键的数组
	shuffle($rand_keys);
	
	//根据键获取对应的码值，并拼接成字符串
	$code = '';
	foreach($rand_keys as $key) {
		$code .= $char[$key];
	}
	return $code;
}




?>