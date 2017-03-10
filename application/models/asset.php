<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:32
 */
class AssetValue
{
    public $id = null;
    public $name = null;//资产名称
    public $PID = null;//资产编号
    public $userid = null;//用户id
    public $username = null;//用户名
    public $groupid = null;//组id
    public $groupname = null;//组名
    public $buyingtime = null;//购入时间
    public $scraptime = null;//报废时间
    public $price = null;//价格

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'name' => $this->name,
            'PID' => $this->PID,
            //'userid' => $this->userid,
            'username' => $this->username,
            // 'groupid' => $this->groupid,
            // 'groupname' => $this->groupname,
            'buyingtime' => $this->buyingtime,
            'scraptime' => $this->scraptime,
            'price' => $this->price,
        );
    }

    /**
     * 部分转换成数组
     *
     * @return array
     */
    public function someToArray()
    {
        $data = array();
        if ($this->name != null)
            $data['name'] = $this->name;
        if ($this->PID != null)
            $data['PID'] = $this->PID;
        if ($this->userid != null)
            $data['userid'] = $this->userid;
        if ($this->username != null)
            $data['username'] = $this->username;
        if ($this->groupid != null)
            $data['groupid'] = $this->groupid;
        if ($this->groupname != null)
            $data['groupname'] = $this->groupname;
        if ($this->buyingtime != null)
            $data['buyingtime'] = $this->buyingtime;
        if ($this->scraptime != null)
            $data['scraptime'] = $this->scraptime;
        if ($this->price != null)
            $data['price'] = $this->price;

        return $data;
    }
}

class Asset extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'asset';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_assets()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 获取一条记录
     *
     * @return mixed
     */
    public function get_asset_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 获取总个数
     *
     * @return mixed
     */
    public function get_assets_count()
    {
        $sql = "SELECT count(*) as count FROM $this->table";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_asset($value)
    {
        $data = $value->alltoArray();
        if (count($data) <= 0)
            return null;

        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    /**
     * 更新一条记录
     *
     * @param $value
     * @param $id
     * @return mixed
     */
    public function update_asset($value, $id)
    {
        $data = $value->someToArray();
        if (count($data) <= 0)
            return null;

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     *  删除一条记录
     *
     * @param $id
     * @return mixed
     */
    public function delete_asset($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     *删除所有记录
     *
     * @return mixed
     */
    public function delete_allAsset()
    {
        return $this->db->empty_table($this->table);
    }

    public function check_asset($value)
    {
        $sql = "SELECT * FROM $this->table WHERE PID=$value->PID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>