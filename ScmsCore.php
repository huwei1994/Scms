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
    private $scms_table = 'scms_content_list';

    /*string 定义默认字段名
     * */
    private $scms_fields = [
        'id'=>'id',
        'category_id'=>'category_id',
        'title'=>'title',
        'summary'=>'summary',
        'preview_big_image'=>'preview_big_image',
        'preview_image'=>'preview_image',
        'original_link'=>'original_link',
        'published_time'=>'published_time',
        'created_at'=>'created_at',
        'modified_at'=>'modified_at',
        'deleted_at'=>'deleted_at'
    ];
    
    /*定义添加数据抽象方法
     * */
    abstract public function addItem($datas);
    /*定义删除数据抽象方法
     * */
    abstract public function deleteItem($id);
    /*定义修改数据抽象方法
     * */
    abstract public function modifyItem($id,$datas);
    /*定义根据id获取详细记录抽象方法
     * */
    abstract public function getItem($id);
    /*定义获取记录列表抽象方法
     * */
    abstract public function getItems($datas);
    /*定义恢复被删除数据抽象方法
     * */
    abstract public function resetItem($id);

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
}
