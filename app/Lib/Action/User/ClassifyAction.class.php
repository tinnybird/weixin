<?php
/**
 *分类导航
**/
function strExists($haystack, $needle)
{
	return !(strpos($haystack, $needle) === FALSE);
}
class ClassifyAction extends UserAction{
	public function index(){
		$db=D('Classify');
		$where['token']=session('token');
		$count=$db->where($where)->count();
		$page=new Page($count,25);
		$info=$db->where($where)->order('sorts desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('info',$info);
		$this->display();
	}
	
	public function add(){
		$this->assign('actmenu', $this->getActMenu());
		$this->display();
	}
	
	public function edit(){
		$id=$this->_get('id','intval');
		$info=M('Classify')->find($id);
		$this->assign('info',$info);
		$this->assign('actmenu', $this->getActMenu());
		$this->display();
	}

	public function getActMenu(){
		return array(
			'Guajiang','Lottery','Coupon','Zadan','Wedding','Weidiaoyan','Photo','Panorama','Card','Member_card','Product','Groupon','Home','Liuyan','Reservation'
		);
	}
	
	public function del(){
		$where['id']=$this->_get('id','intval');
		$where['uid']=session('uid');
		if(D(MODULE_NAME)->where($where)->delete()){
			$this->success('操作成功',U(MODULE_NAME.'/index'));
		}else{
			$this->error('操作失败',U(MODULE_NAME.'/index'));
		}
	}
	public function insert(){
		if($_POST['url_desc']){
			$_POST['url'] = strval($this->getLink($_POST['url_desc'], $_POST['url_num']));
		}
		$this->all_insert();
	}
	public function upsave(){
		if($_POST['url_desc']){
			$_POST['url'] = strval($this->getLink($_POST['url_desc'], $_POST['url_num']));
		}
		$this->all_save();
	}

	/**
	 * 关键字转为URL
	 * @param unknown_type $url
	 * @return unknown
	 */
	public function getLink($url, $num){
		if ($num){
			$itemid=intval($num);
		}
		//会员卡 刮刮卡 团购 商城 大转盘 优惠券 订餐 商家订单 表单
		if ($url == 'Guajiang'){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($url == 'Lottery'){
			$link='/index.php?g=Wap&m=Lottery&a=index&token='.$this->token;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($url == 'Coupon'){
			$link='/index.php?g=Wap&m=Coupon&a=index&token='.$this->token;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($url == 'Guajiang'){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($url == 'Host'){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Host&a=index&token='.$this->token.'&hid='.$itemid;
			}else {
				$link='/index.php?g=Wap&m=Host&a=Detail&token='.$this->token;
			}
		}elseif ($url == 'Selfform'){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Selfform&a=index&token='.$this->token.'&id='.$itemid;
			}
		}elseif ($url == 'Photo'){
			$link='/index.php?g=Wap&m=Photo&a=index&token='.$this->token;
			if ($itemid){
				$link='/index.php?g=Wap&m=Photo&a=plist&token='.$this->token.'&id='.$itemid;
			}
		}elseif ($url == 'Panorama'){
			$link='/index.php?g=Wap&m=Panorama&a=index&token='.$this->token;
			if ($itemid){
				$link='/index.php?g=Wap&m=Panorama&a=item&token='.$this->token.'&id='.$itemid;
			}
		}elseif ($url == 'Card' || $url == 'Member_card'){
			$link='/index.php?g=Wap&m=Card&a=index&token='.$this->token;
		}elseif ($url == 'Product'){
			$link='/index.php?g=Wap&m=Product&a=index&token='.$this->token;
		}elseif ($url == 'Groupon'){
			$link='/index.php?g=Wap&m=Groupon&a=grouponIndex&token='.$this->token;
		}elseif ($url == 'Index' || $url == 'Home'){
			$link='/index.php?g=Wap&m=Index&a=index&token='.$this->token;
		}elseif ($url == 'Liuyan'){
			$link='/index.php?g=Wap&m=Liuyan&a=index&token='.$this->token;
		}else {
		}
		return $link;
	}
}
?>