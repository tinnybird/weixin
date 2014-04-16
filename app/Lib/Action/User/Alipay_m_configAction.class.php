<?php
class Alipay_m_configAction extends UserAction
{
    public $alipay_config_db;
	
    public function _initialize()
    {
        parent::_initialize();
        $this->alipay_config_db = M('Alipay_m_config');
        if (!$this->token) {
            exit();
        }
		$this->assign('modulename', "支付宝支付接口");
    }
	
    public function index()
    {
        $config = $this->alipay_config_db->where(array(
            'token' => $this->token
        ))->find();
        if (IS_POST) {
			$row['open']  = $this->_post('open');
			$row['type']  = $this->_post('type');
            $row['pid']   = $this->_post('pid');
            $row['key']   = $this->_post('key');
            $row['name']  = $this->_post('name');
            $row['token'] = $this->_post('token');
            if ($config) {
                $where = array(
                    'token' => $this->token
                );
                $this->alipay_config_db->where($where)->save($row);
            } else {
                $this->alipay_config_db->add($row);
            }
            $this->success('设置成功', U('Alipay_m_config/index', $where));
        } else {
            $this->assign('config', $config);
            $this->display();
        }
    }
}
?>