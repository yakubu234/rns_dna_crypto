<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Api_encrypt
{

    protected $CI;
    private $_encryptKey;
    private $_MD5Key;
    private $_MD5IV;
    private $_apiParams;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->_encryptKey = $this->CI->config->item("WS_ENC_KEY");
        $this->_MD5Key = substr(md5($this->_encryptKey), 0, 16);
        $this->_MD5IV = str_repeat("\0", mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
    }

    public function encrypt($sValue = '')
    {
        $block = 16;
        $pad = $block - (strlen($sValue) % $block);
        $sValue .= str_repeat(chr($pad), $pad);
        $str_output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->_MD5Key, $sValue, MCRYPT_MODE_CBC, $this->_MD5IV));
        $str_output = str_replace(array('+', '/', '='), array('-', '_', '.'), $str_output);
        return $str_output;
    }

    public function decrypt($sValue = '')
    {
        //$sValue = str_replace('~','+',$sValue);
        $sValue = str_replace(array('-', '_', '.'), array('+', '/', '='), $sValue);
        $sValue = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->_MD5Key, base64_decode($sValue), MCRYPT_MODE_CBC, $this->_MD5IV);
        $block = 16;
        $pad = ord($sValue[($len = strlen($sValue)) - 1]);
        $len = strlen($sValue);
        $pad = ord($sValue[$len - 1]);
        $str_output = substr($sValue, 0, strlen($sValue) - $pad);
        return $str_output;
    }

    public function encryptData($sValue = '')
    {
        $block = 16;
        $pad = $block - (strlen($sValue) % $block);
        $sValue .= str_repeat(chr($pad), $pad);
        $str_output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->_MD5Key, $sValue, MCRYPT_MODE_CBC, $this->_MD5IV));
        return $str_output;
    }

    public function decryptData($sValue = '')
    {
        $str_output = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->_MD5Key, base64_decode($sValue), MCRYPT_MODE_CBC, $this->_MD5IV);
        $block = 16;
        $pad = ord($str_output[($len = strlen($str_output)) - 1]);
        $len = strlen($str_output);
        $pad = ord($str_output[$len - 1]);
        $str_output = substr($str_output, 0, strlen($str_output) - $pad);
        return $str_output;
    }

    public function decrypt_params($request_arr = array())
    {
        if (!is_array($request_arr) || count($request_arr) == 0) {
            return $request_arr;
        }
        foreach ($request_arr as $key => $val) {
            $param_val = str_replace(' ', '+', $val);
            $request_arr[$key] = $this->decryptData($param_val);
        }
        return $request_arr;
    }
}
// Here is the code about how to use this library.

// //In Controller
// $request_params = $this->input->get_post(NULL, TRUE);
// $this->load->library('api_encrypt');
// $decrypt_params = $this->api_encrypt->decrypt_params($request_params);

// //do operations
// //prepare response array

// $encrypt_str = $this->api_encrypt->encrypt($response);