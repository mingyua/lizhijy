<?php
class Cate{
	
	private $cid;	//分类id
	
	//组合一维数组
	Static public function unlimitedForlevel($cate,$html='┗━',$pid = 0,$level = 0){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['pid']== $pid){
				$v['level']=$level + 1;
				$v['html']=str_repeat($html,$level);
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitedForlevel($cate,$html,$v['id'],$level + 1));
				}
			
			}
			return $arr;
		}
		
	//组合多维数组	
	Static public function unlimitedForLayer($cate,$name='child',$pid=0){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['pid']== $pid){
			   $v[$name]=self::unlimitedForLayer($cate,$name,$v['id']);
			$arr[]=$v;
				}
			
			}
			return $arr;
		}
		
	//传递一个子分类ID返回所有的低级分类
	// $arr=array_merge(self::getParents($cate,$v['pid']),$arr);
	// 首页>>产品展示>>产品列表
	// $arr=array_merge($arr,self::getParents($cate,$v['pid']));
	// 产品列表>>产品展示>>首页
	
	Static public function getParents($cate,$id){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['id']== $id){
			   $arr[]=$v;
			   $arr=array_merge(self::getParents($cate,$v['pid']),$arr);
				}
			
			}
			return $arr;
		}
		
		
	//传递一个父级分类ID返回所有子分类ID
	Static public function getChildsId($cate,$pid){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['pid']== $pid){
			   $arr[]=$v['id'];
			   $arr=array_merge($arr,self::getChildsId($cate,$v['id']));
				}
			
			}
			return $arr;
		}
		
		
		
	//传递一个父级分类ID返回所有子分类
	Static public function getChilds($cate,$pid){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['pid']== $pid){
			   $arr[]=$v;
			   $arr=array_merge($arr,self::getChilds($cate,$v['id']));
				}
			
			}
			return $arr;
		}
		
	//显示层关系模型
	Static public function channel($cate,$html='&nbsp;',$pid = 0,$level = 0){
		
		$arr=array();
		foreach ($cate as $v){
			if($v['pid']== $pid){
				$v['level']=$level + 1;
				$v['html']=str_repeat($html,$level);
				$arr[]=$v;
				$arr=array_merge($arr,self::channel($cate,$html,$v['id'],$level + 1));
				}
			
			}
			return $arr;
		}
		
		
		
	 }
?>

