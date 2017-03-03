<?php

/**
 * Created by PhpStorm.
 * User: yao
 * Date: 2017/3/2
 * Time: 16:43
 */
class NoticementValue
{
    public $id = null;
    public $title = null;//标题
    public $content = null;//内容
    public $releasetime = null;//发布日期

    /**
     * 全部转换成数组
     *
     * @return array
     */
    public function allToArray()
    {
        return array(
            'title' => $this->title,
            'content' => $this->content,
            'releasetime' => $this->releasetime,
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
        if ($this->title != null)
            $data['title'] = $this->title;
        if ($this->content != null)
            $data['content'] = $this->content;
        if ($this->releasetime != null)
            $data['releasetime'] = $this->releasetime;

        return $data;
    }
}

class Noticement extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * 表名
     */
    private $table = 'noticement';

    /**
     * 获取所有记录
     *
     * @return mixed
     */
    public function get_noticements()
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
    public function insert_noticement($value)
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
    public function update_noticement($value, $id)
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
    public function delete_noticement($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}