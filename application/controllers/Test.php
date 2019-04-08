<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    /**
     * 链式调用设置响应消息
     */
    public function chain()
    {
        // 响应消息内数据
        $data = array(
            'id' => 1,
            'name' => 'test'
        );

        $this->setCode(0)
            ->setMsg('成功')
            ->setData($data)
            ->resultCN();
    }

    /**
     * 快速使用默认设置响应消息
     */
	public function simple()
	{
        $this->success()
            ->result();
	}
}
