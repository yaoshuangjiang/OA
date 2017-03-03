<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 17:04
 */
class WorklogValue
{
    public $id = null;
    public $content = null;//内容
    public $date = null;//日期
    public $starttime = null;//开始时间
    public $endtime = null;//结束时间

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'content' => $this->content,
            'date' => $this->date,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
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
        if ($this->content != null)
            $data['content'] = $this->content;
        if ($this->date != null)
            $data['date'] = $this->date;
        if ($this->starttime != null)
            $data['starttime'] = $this->starttime;
        if ($this->endtime != null)
            $data['endtime'] = $this->endtime;

        return $data;
    }
}

class Worklog extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'worklog';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_worklogs()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * 插入一条记录
     *
     * @param $value
     * @return mixed
     */
    public function insert_worklog($value)
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
    public function update_worklog($value, $id)
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
    public function delete_worklog($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}

?>