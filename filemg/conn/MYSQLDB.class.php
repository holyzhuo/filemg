<?php
	class MYSQLDB{
		public $host;
		//public $port;
		public $username;
		public $password;
		public $charset;
		public $dbname;
		//连接结果（资源）
		private static $link;
		private $resourc;

		public static function getInstance($config){
			if(!isset(self::$link)){
				self::$link = new self($config);
			}
			return self::$link;
		}
		
		//构造函数:禁止new
		private function  __construct($config){
			//初始化数据
			$this->host = isset($config['host']) ? $config['host'] : 'localhost';
			//$this->port = isset($config['port']) ? $config['port'] : '3306';
			$this->username = isset($config['username']) ? $config['username'] : 'root';
			$this->password = isset($config['password']) ? $config['password'] : '123456';
			$this->charset= isset($config['charset']) ? $config['charset'] : 'utf8';
			$this->dbname = isset($config['dbname']) ? $config['dbname'] : '';
			
			//连接数据库
			$this->connect();
			//设定链接编码
			$this->setCharset($this->charset);
			//选定数据库
			$this->selectDb($this->dbname);
		}
		//禁止克隆
		private function __clone(){}
		//连接方法
		public function connect(){
			$this->resourc = mysqli_connect("$this->host",$this->username
			,$this->password) or die('数据库连接失败！');
		}
		public function setCharset($charset){
			$this->query("set names ".$charset);
		}
		public function selectDb($dbname){
			$this->query("use ".$dbname);
		}
		/**
		* 功能：执行sql语句
		* 返回：如果失败直接结束,若成功，返回执行结果
		*/
		public function query($sql){
			if(!$result = mysqli_query($this->resourc,$sql)){
				echo "<br/>执行失败！";
				echo "<br/>失败的sql语句为：".$sql;
				echo "<br/>出错信息为：".mysqli_error($this->resourc);
				echo "<br/>错误代号为：".mysqli_errno($this->resourc);
				die();
			}
			return $result;
		}
		/**
		* 功能：执行select语句,返回二维数组
		* 参数：$sql字符串类型 select语句
		*/
		public function getAll($sql){
			$result = $this->query($sql);
			$arr = array();//空数组
			while($rec = mysqli_fetch_assoc($result)){
				$arr[] = $rec; 
			}
			return $arr;
		}
		//返回一行数据（作为一位数组）
		public function getRow($sql){
			$result = $this->query($sql);
			if($rec2 = mysqli_fetch_assoc($result)){
				return $rec2; 
			}
			return false;
		}
		//返回一个数据（select语句的第一行第一列）
		public function getOne($sql){
			$result = $this->query($sql);
			$rec = mysqli_fetch_row($result);//返回下标为数字的数组
			if($rec === false){
				return false;
			}
			return $rec[0];
		}
		/**
		*	获取select查询出的数据的行数
		*   @return int
		*/
		public function affected_rows(){
				return mysqli_affected_rows($this->resourc);
			}
		/**
		* 转义用户数据，防止SQL注入
		* @param $data string 待转换字符
		* @return 转换后的字符串
		*/
		public function escapeString($data){
			return mysqli_real_escape_string($this->resourc,$data);
		}
		/*
		*	实现页面输出信息并跳转
		*   @param $url $info string
		*   @param $wait int 
		*/
		public function _jump($url,$info=NULL,$wait=3){
			//判断立即还是提示
			if(is_null($info)){
				//立即,header('Location:')
				header('Location:'.$url);
			}else{
				//提示后，Refresh:n;url=$url
				header("refresh:$wait;URL=$url");
				echo $info;
			}
			//终止脚本
			die;
		}
		/**
		*	验证管理员是否合法
		*
		*	@param $admin_name
		*	@param $admin_pass
		*
		*	@return mixed,合法：管理员信息数组；非法：false
		***/
		public function check($tablename,$admin_name,$admin_pass){
			$admin_name_escape = $this->escapeString($admin_name);
			$admin_pass_escape = $this->escapeString($admin_pass);
			$sql = "SELECT * FROM $tablename WHERE admin_name='".$admin_name_escape."' and 
			admin_password='".MD5($admin_pass_escape)."'";
			$row = $this->getRow($sql);
			return $row;
		}
		/**
		*	弹出提示并跳转页面
		*	@param $content string
		*   @param $url string
		*/
		public function _alert($content,$url){
			echo "<script>alert('".$content."');location.href='".$url."'</script>";
		}
	}
	