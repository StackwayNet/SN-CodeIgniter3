<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 自定义控制器超类
 * 增加返回JSON响应方法, 链式调用设置响应码, 响应消息和响应数据
 * User: StackwayNet
 * Date: 2019/4/8
 * Time: 17:30
 */

class MY_Controller extends CI_Controller
{

    // 快速默认成功状态和消息值
    public static $SUCCESS_CODE = 0;
    public static $SUCCESS_MSG = 'success';

    // 快速默认失败状态和消息值
    public static $ERROR_CODE = 101;
    public static $ERROR_MSG = 'error';

    // 待响应数据
    protected $responseData = array();

    /**
     * 设置接口响应码
     * @param $code
     * @return $this
     */
    protected function setCode($code)
    {
        $this->responseData['code'] = $code;
        return $this;
    }

    /**
     * 设置接口响应消息
     * @param $msg
     * @return $this
     */
    protected function setMsg($msg)
    {
        $this->responseData['msg'] = $msg;
        return $this;
    }

    /**
     * 设置接口响应携带数据
     * @param $data
     * @return $this
     */
    protected function setData($data)
    {
        $this->responseData['data'] = $data;
        return $this;
    }

    /**
     * 快速设置默认成功消息
     * @return $this
     */
    protected function success()
    {
        $this->responseData = array(
            'code' => MY_Controller::$SUCCESS_CODE,
            'msg' => MY_Controller::$SUCCESS_MSG
        );
        return $this;
    }

    /**
     * 快速设置默认错误消息
     * @return $this
     */
    protected function fail()
    {
        $this->responseData = array(
            'code' => MY_Controller::$ERROR_CODE,
            'msg' => MY_Controller::$ERROR_MSG
        );
        return $this;
    }

    /**
     * 输出JSON格式响应数据
     */
    protected function result()
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->responseData));
    }

    /**
     * 输出JSON格式响应数据, 中文部分不进行UNICODE转码
     */
    protected function resultCN()
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->responseData, JSON_UNESCAPED_UNICODE));
    }

}