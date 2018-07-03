 <?php
 return array(
    'DB_CONFIG' => array(
        //数据库配置
        'DB_HOST'=>'localhost',    //服务器地址
        'DB_NAME' => 'mingyu', // 数据库名
        'DB_USER' => 'root', // 用户名
        'DB_PWD' => '123456', // 密码
        'DB_ENCODE'=>'utf8',//编码
        'DB_PREFIX' => 'think_' // 数据库表前缀
    )
);



        $db_config = $this->db_config;
   echo      $host = $db_config["DB_CONFIG"]["DB_HOST"];
        $user = $db_config["DB_CONFIG"]["DB_USER"];
        $pwd = $db_config["DB_CONFIG"]["DB_PWD"];
        $db_name = $db_config["DB_CONFIG"]["DB_NAME"];
        $db_encode = $db_config["DB_CONFIG"]["DB_ENCODE"];
        $this->prefix = $db_config["DB_CONFIG"]["DB_PREFIX"];
?>

