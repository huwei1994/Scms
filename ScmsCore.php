<?php
/**
 * Created by PhpStorm.
 * User: huwei
 * Date: 2016/11/21
 * Time: 14:48
 */
/*定义一个核心文件，用于增删改查数据库。
 *用于按条件搜索数据和生成分页链接
 * */
Trait ScmsCore
{
    /* string 定义默认表名
     * */
    private $scms_table = 'testcomposer';

    /*string 定义默认字段名
     * */
    private $scms_fields = [
        'id'=>'id',
        'title'=>'title'
    ];
    
    /*定义添加数据抽象方法
     * */
    abstract public function insert($datas);

    /*自定义设置表名
     * */
    public function setTable($table)
    {
        $this->scms_table = $table;
    }
    /*获取表名
     * */
    public function getTable()
    {
        return $this->scms_table;
    }

    /*一条一条的设置 数据库字段名？？？？？
     * */
     public function addItem($data)
    {
        return $this->insert($data);
    }
}
