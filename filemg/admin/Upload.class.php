<?php

	class Upload{
		private $_max_size;
		private $_type_map;
		private $_allow_ext_list;
		private $_allow_mime_list;
		private $_upload_path;
		private $_prefix;
		
		private $_error;//当前错误信息
		public function getError(){
			return $this->_error;
		}

		public function __construct(){
			$this->_max_size = 1024*1024*400;
			$this->_type_map = array(
				'.pdf' => array('application/pdf'),
				'.doc' => array('application/msword'),
				'.docx'  => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
				'.xlsx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
				'.png' => array('image/png','image/x-png'),
				'.jpg' => array('image/jpeg','image/pjpeg'),
				'.jpeg' => array('image/jpeg','image/pjpeg'),
				'.gif' => array('image/gif')
			);
			$this->_allow_ext_list = array('.png','.gif','.jpg','.jpeg','.pdf','.doc','.xlsx','.docx');
			$allow_mime_list = array();
			foreach($this->_allow_ext_list as $value){
				//得到每个后缀名
				$allow_mime_list = array_merge($allow_mime_list,$this->_type_map[$value]);
			}
			//去重复
			$this->_allow_mime_list = array_unique($allow_mime_list);
			$this->_upload_path = './';
			$this->_prefix = '';
		}
		/**
		* 上传单个文件
		*/
		public function uploadOne($tmp_file){
			# 是否存在错误
			if($tmp_file['error']!= 0){
				$this->_error =  "文件上传错误";
				echo $tmp_file['error'];
				return false;
			}
			
			#尺寸
			//$max_size = 1024*1024;//最大尺寸1M
			if($tmp_file['size'] > $this->_max_size){
				$this->_error =  '文件过大';
				return false;
			}
			#类型
			#保证修改允许的后缀名，就可以影响到$allow_ext_list和$allow_mime_list
			#设置一个后缀名与mime的映射关系
			
			#MIME，type元素
			//$allow_ext_list = array('.png','.gif','.jpg','.jpeg');
			$ext = strtolower(strrchr($tmp_file['name'],'.'));//strtolower把所有字符转换成小写 strrchr截取最后一个分隔符后面的内容
			if(!in_array($ext,$this->_allow_ext_list)){
				$this->_error =  '类型不合法';
				return false;
			}
			if(!in_array($tmp_file['type'],$this->_allow_mime_list)){
				$this->_error =  '类型不合法';
				return false;
			}
			#后缀，从原始文件名中提取
			// $allow_mime_list = array('image/png','image/gif','image/pjpeg','image/x-png');
			
			//PHP自己获取文件的mime,进行检测
			//$finfo = new finfo(FILEINFO_MIME_TYPE);//获得一个可以检测文件MIME类型信息的对象
			//$mime_type = $finfo->file($tmp_file['tmp_name']);//检测	
		
			# 移动
			# 上传的文件存储地址
			$upload_path = './';
			//创建子目录
			$subdir = date('YmdH').'/';
			if(!is_dir($this->_upload_path.$subdir)){//检测是否存在
				//不存在
				mkdir($this->_upload_path.$subdir);
			}
			# 科学起名
			$prefix = 'file_';
			@$upload_filename = uniqid($this->_prefix,ture).$ext;
			if(move_uploaded_file($tmp_file['tmp_name'], $this->_upload_path.$subdir.$upload_filename)){
				//移动成功
				return $subdir.$upload_filename;
			}else{
				//移动失败
				$this->_error =  '移动失败';
				return false;
			}
		}
		public function __set($p,$v){
			$allow_set_list = array('_upload_path','_prefix','_allow_ext_list','_max_size');
			//可以不加：_进行设置
			if(substr($p, 0,1) != '_'){
				$p = '_'.$p;
			}
			$this->$p= $v;
		}
	}