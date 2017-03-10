<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 17:14
 */
class  Loginbackground extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin');
        $this->load->helper("url");
    }

    /**
     *转到登录界面
     */
    public function login()
    {
        //$this->load->view('test');
        $this->load->view('background/loginbackground');
    }

    /**
     *查看账号密码
     */
    public function check()
    {
        /*if (!isset($_POST['username']) || $_POST['password'])
            return;*/

        $user = $_POST['username'];
        $pwd = $_POST['password'];

        $row = $this->Admin->get_admin_adminname($user);
        if (count($row) > 0) {
            if ($row[0]['adminname'] == $user) {
                if ($row[0]['password'] == $pwd) {
                    $this->load->view('header');
                    $this->load->view('background/main');
                    $this->load->view('footer');
                }
            } else {
                $re['response'] = "密码不正确！";
                $this->load->view('background/loginbackground', $re);
            }
        } else {
            $re['response'] = "账号不正确！";
            $this->load->view('background/loginbackground', $re);
        }
    }
}