<?php
namespace  App\Model\Admin;
use DB;

/**
 * Created by PhpStorm.
 * User: huwei
 * Date: 2016/11/21
 * Time: 15:17
 */
class ScmsModel
{
    use ScmsCore;
    public function __construct()
    {
        $this->setTable('scms_content_list');
    }
    

    /*定义添加数据方法
     * */
    public function addItem($datas)
    {
        //定义一个空数组
        $_datas = [];
        foreach($datas as $k=>$data)
        {
            //循环，将传入的值，依次放入$_datas中
            $_datas[$k] = $data;
        }
        //插入数据，并获得id
        $id = ScmsModel::insertGetId($_datas);
        //根据id查出，该条数据，并返回
        $result = ScmsModel::getItem($id);
        return $result;
    }
    /*定义删除数据方法
     * */
    public function deleteItem($id)
    {
        //假删除数据,只是将delete_at字段改为时间戳
        $this->modifyItem($id,$data['deleted_at'] = time());
        //删除数据过后，查找并返回
        $result = ScmsModel::getItem($id);
        return $result;
    }
    /*定义修改数据方法
     * */
    public function modifyItem($id, $data)
    {
        //查找该实例
        $flight = ScmsModel::find($id);
        //如果是假删除，传递过来的时间戳，或者是想恢复deleted_at的值为0
        if(!is_array($data) && $data>= 0)
        {
            $flight->deleted_at = $data;
            $flight->save();
            return true;
        }
        //普通更新操作
        else
        {
            //如果是数组值
            foreach($data as $k=>$value)
            {
                $flight->$k = $value;
            }
            $flight->save();
            $data = ScmsModel::getItem($id);
        }
        //修改成功，获取该条数据的详细信息
        return $data;
    }
    /*定义根据id获取详细记录方法（一条数据）
     * */
    public function getItem($id)
    {
        $res = ScmsModel::find($id);
        //将结果集，转换成数组，返回
        return $res->toArray();
    }
    /*定义获取记录列表方法
     * */
    public function getItems()
    {
        
    }
    /*定义恢复被删除数据方法
     * */
    public function resetItem()
    {
        
    }
}