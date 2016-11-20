<?php
	/*
	*	验证码 工具
	*/
	class Captcha{
		/* 
		* 输出生成的验证码
		*
		*	@param $code_len = 4 码值的长度
		*	@return void
		*/
		public function generate($code_len=4){
			//生成码值
			$chars = 'ABCDEFGHIGKLMNPQRSTUVWXYZ123456789';//所有可能的字符
			$chars_len = strlen($chars);
			$code = '';
			for($i=1; $i<=$code_len; ++$i){
				$rand_index = mt_rand(0, $chars_len-1);
				$code .= $chars[$rand_index];//字符串支持[]操作，通过下标取得某个字符
			}
			
			//存储于session,用于验证
			@session_start();//保证session机制一定是开启的，同时重复开启不会报错 用@屏蔽错误
			$_SESSION['captcha_code'] = $code;

			//生成验证码图片

			//背景图
			$bg_file = '../images/captcha_bg'.mt_rand(1,5).'.jpg';

			//基于jpg格式的图片创建画布
			$img = imageCreateFromJPEG($bg_file);

			//随机分配颜色
			$str_color = mt_rand(1,2) == 1 ? imagecolorallocate($img, 0, 0, 0) : imagecolorallocate($img, 0xff, 0xff, 0xff);

			//字符串
			$font = 5;
			//画布尺寸
			$img_w = imagesx($img);
			$img_h = imagesy($img);
			//字体的尺寸
			$font_w = imagefontwidth($font);
			$font_h = imagefontheight($font);
			//字符串的尺寸
			$code_w = $font_w * $code_len;
			$code_h = $font_h;
			$x = ($img_w-$code_w)/2;
			$y = ($img_h-$code_h)/2;
			imagestring($img, $font, $x, $y, $code, $str_color);

			//输出画布
			header("Content-Type:image/jpeg;");
			imagejpeg($img);

			//销毁画布
			imagedestroy($img);

		}
		/*
		* 验证
		* @param $request_code 用户表单中提交的码值
		* @return bool 是否匹配
		*/
		public function checkCaptcha($request_code){
			@session_start();

			//严格点，存在且相等
			//strcasecmp()不区分大小写的字符串比较函数
			//第一个大  返回1 第一个小返回 负 一样返回0
			$result = isset($request_code) && isset($_SESSION['captcha_code']) && (strcasecmp($request_code, $_SESSION['captcha_code'])==0);
			
			//安全考虑,销毁session中的验证码值
			unset($_SESSION['captcha_code']);

			return $result;
		}
	}
?>