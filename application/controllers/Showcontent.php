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
                $data['msg'] = "ok";
                $this->load->view('background/usermanager', $data);
                break;
            }
            case 1: {
                $this->load->model('Group');
                $this->load->view('background/groupmanager');
                break;
            }
            case 2: {
                //$this->load->view('test');
                $this->load->model('Asset');
                $data['asset'] = $this->Asset->get_assets();
                $row = $this->Asset->get_assets_count();
                $data['count'] = $row[0]['count'];
                $data['msg'] = "ok";
                $this->load->view('background/assetmanager', $data);
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

    /**
     * user用户管理*************************************************************************/
    function insert_user()
    {
        try {
            //$this->load->view('test');
            $this->load->model('User');

            //添加用户
            $uservalue = new UserValue();
            $uservalue->username = $_POST['username'];
            $uservalue->mobile = $_POST['mobile'];
            $uservalue->password = $_POST['password'];
            $uservalue->usernumber = $_POST['usernumber'];
            $uservalue->PID = $_POST['PID'];

            //判断是否有重复user
            $checkuser = $this->User->check_user($uservalue);
            if (isset($checkuser[0]['username'])) {
                $checkmsg = array();
                if ($checkuser[0]['username'] == $uservalue->username) {
                    $checkmsg['username'] = "1";
                }
                if ($checkuser[0]['usernumber'] == $uservalue->usernumber) {
                    $checkmsg['usernumber'] = "1";
                }
                if ($checkuser[0]['PID'] == $uservalue->PID) {
                    $checkmsg['PID'] = "1";
                }
                $data['checkmsg'] = $checkmsg;
            } else {
                $this->User->insert_user($uservalue);
                $data['msg'] = "ok";
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

    function get_user()
    {
        //$this->load->view('test');
        try {
            $this->load->model('User');
            $data['curuser'] = $this->User->get_user_id($_GET['id']);
            $data['user'] = $this->User->get_users();
            $row = $this->User->get_users_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/usermanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    function modify_user()
    {
        try {
            //$this->load->view('test');
            $this->load->model('User');

            //添加用户
            $uservalue = new UserValue();
            $uservalue->username = $_POST['username'];
            $uservalue->mobile = $_POST['mobile'];
            $uservalue->password = $_POST['password'];
            $uservalue->usernumber = $_POST['usernumber'];
            $uservalue->PID = $_POST['PID'];

            //判断是否有重复user
            $checkuser = $this->User->check_user($uservalue);
            if (isset($checkuser[0]['username'])) {
                $checkmsg = array();
                if ($checkuser[0]['username'] == $uservalue->username) {
                    $checkmsg['username'] = "1";
                }
                if ($checkuser[0]['usernumber'] == $uservalue->usernumber) {
                    $checkmsg['usernumber'] = "1";
                }
                if ($checkuser[0]['PID'] == $uservalue->PID) {
                    $checkmsg['PID'] = "1";
                }
                $data['checkmsg'] = $checkmsg;
            } else {
                $this->User->update_user($uservalue, $_POST['id']);
                $data['msg'] = "ok";
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

    function del_user()
    {
        try {
            $this->load->model('User');

            if ($_GET['type'] == 0) {
                //删除所有用户
                $this->User->del_alluser();
            } else {
                //删除用户
                $ids = explode(",", $_GET['id']);
                foreach ($ids as $id) {
                    $this->User->del_user($id);
                }
            }

            $data['msg'] = "ok";
            //重新刷新界面
            $data['user'] = $this->User->get_users();
            $row = $this->User->get_users_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/usermanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    /**
     * asset资产管理**************************************************************************/

    function get_asset()
    {
        //$this->load->view('test');
        try {
            $this->load->model('Asset');
            $data['curAsset'] = $this->Asset->get_asset_id($_GET['id']);
            $data['asset'] = $this->Asset->get_assets();
            $row = $this->Asset->get_assets_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/assetmanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    function insert_asset()
    {
        try {
            //$this->load->view('test');
            $this->load->model('Asset');

            //添加资产
            $assetValue = new AssetValue();
            $assetValue->name = $_POST['name'];
            $assetValue->PID = $_POST['PID'];
            $assetValue->username = $_POST['username'];
            $assetValue->price = $_POST['price'];
            $assetValue->buyingtime = $_POST['buyingtime'];
            $assetValue->scraptime = $_POST['scraptime'];

            //判断是否有重复资产
            $checkuser = $this->Asset->check_asset($assetValue);
            if (isset($checkuser[0]['PID'])) {
                $checkmsg = array();
                if ($checkuser[0]['PID'] == $assetValue->PID) {
                    $checkmsg['PID'] = "1";
                }
                $data['checkmsg'] = $checkmsg;
            } else {
                $this->Asset->insert_asset($assetValue);
                $data['msg'] = "ok";
            }

            //重新刷新界面
            $data['asset'] = $this->Asset->get_assets();
            $row = $this->Asset->get_assets_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/assetmanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    function modify_asset()
    {
        try {
            $this->load->model('Asset');

            //添加资产
            $assetValue = new AssetValue();
            $assetValue->name = $_POST['name'];
            $assetValue->PID = $_POST['PID'];
            $assetValue->username = $_POST['username'];
            $assetValue->price = $_POST['price'];
            $assetValue->buyingtime = $_POST['buyingtime'];
            $assetValue->scraptime = $_POST['scraptime'];

            //判断是否有重复资产
            $checkuser = $this->Asset->check_asset($assetValue);
            if (isset($checkuser[0]['PID'])) {
                $checkmsg = array();
                if ($checkuser[0]['PID'] == $assetValue->PID) {
                    $checkmsg['PID'] = "1";
                }
                $data['checkmsg'] = $checkmsg;
            } else {
                $this->Asset->update_asset($assetValue, $_POST['id']);
                $data['msg'] = "ok";
            }

            //重新刷新界面
            $data['asset'] = $this->Asset->get_assets();
            $row = $this->Asset->get_assets_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/assetmanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    function del_asset()
    {
        try {
            $this->load->model('Asset');

            if ($_GET['type'] == 0) {
                //删除所有用户
                $this->Asset->delete_allAsset();
            } else {
                //删除用户
                $ids = explode(",", $_GET['id']);
                foreach ($ids as $id) {
                    $this->Asset->delete_asset($id);
                }
            }

            $data['msg'] = "ok";
            //重新刷新界面
            $data['asset'] = $this->Asset->get_assets();
            $row = $this->Asset->get_assets_count();
            $data['count'] = $row[0]['count'];
            $this->load->view('background/assetmanager', $data);
        } catch (Exception $e) {
            $this->load->view('test');
        }
    }

    /**
     * *************************************************************************/
}
