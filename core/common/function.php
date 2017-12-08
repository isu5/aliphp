<?php

/**
 * 打印函数
 */
function p($arr){
	
	$str = '<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid red;border-radius: 4px;">';
	if(is_bool($arr)) {
		$show = $arr? 'true' : 'false';
		
	}elseif(is_null($arr)){
		$show = 'null';
	}else{
		$show = print_r($arr,true);
	}
	$str .= $show;
	$str .= '</pre>';
	echo $str;
	
}