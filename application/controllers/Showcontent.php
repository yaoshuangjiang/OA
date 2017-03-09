<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/7
 * Time: 15:52
 */
class Showcontent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
    }

    function sendcontent()
    {
        $type = $_GET['type'];
        switch ($type) {
            case 0: {
                $this->load->model('User');
                $data['user'] = $this->User->get_users();
                $row = $this->User->get_users_count();
                $data['count'] = $row[0]['count'];
                $this->load->view('background/usermanager', $data);
                $this->load->view('test');
                break;
            }
            case 1: {
                $this->load->model('Group');
                $this->load->view('background/groupmanager');
                break;
            }
            case 2: {
                $this->load->model('Asset');
                $this->load->view('background/assetmanager');
                break;
            }
            case 3: {
                $this->load->model('Noticement');
                $this->load->view('background/noticemanager');
                break;
            }
            case 4: {
                $this->load->model('Document');
                $this->load->view('background/documentmanager');
                break;
            }
            default:
                break;
        }
    }

    function insert_user()
    {
        //$this->load->view('test');
        $this->load->model('User');

        //添加用户
        $uservalue = new UserValue();
        $uservalue->username = $_POST['username'];
        $uservalue->mobile = $_POST['mobile'];
        $uservalue->password = $_POST['password'];
        $uservalue->usernumber = $_POST['usernumber'];
        $uservalue->PID = $_POST['PID'];
        $this->User->insert_user($uservalue);

        //重新刷新界面
        $data['user'] = $this->User->get_users();
        $row = $this->User->get_users_count();
        $data['count'] = $row[0]['count'];
        $this->load->view('background/usermanager', $data);
    }

    function del_user()
    {
        try {
            $this->load->model('User');
            //删除用户
            $ids = explode(",",$_GET['id']);
            foreach ($ids as $id) {
                $this->User->del_user($id);
            }

            //重新刷新界面
            $data['user'] = $this->User->get_users();
            $row = $this->User->get_users_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/usermanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }
}
