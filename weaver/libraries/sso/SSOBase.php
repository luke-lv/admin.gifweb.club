<?PHP
/**
 * Sina sso base class , 2008-07-02
 * @author lijunjie <junjie2@staff.sina.com.cn>
 * @package SSOBase.php
 * @version 1.0
 */

class SSOBase {
    
    /**
     * ��ʶ�Ƿ����
     */
    private $_is_error	= false;
    /**
     * ��������
     */
    private $_err_str	= '';	
    /**
     * �������
     */
    private $_err_no	= '';	

    //============== method about error ==========//
    /**
     * ���ó�����Ϣ
     */
    protected function _setError($str,$num = '') {
        $this->_is_error = true;
        $this->_err_str = $str;
        $this->_err_no = $num;
        return true;
    }
    /**
     * �ж��Ƿ����
     */
    public function isError() {
        return $this->_is_error;
    }
    /**
     * ���س�����Ϣ
     */
    public function getError() {
        return $this->_err_str;
    }
    /**
     * ���ش����
     */
    public function getErrno() {
        return $this->_err_no;
    }
    /**
     * ���������Ϣ
     */
    public function clearError() {
        $this->_is_error = false;
        $this->_err_str = '';
        $this->_err_no = '';
        return true;
    }

}
?>
