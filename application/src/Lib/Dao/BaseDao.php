<?php
/**
 * User: Peter Wang
 * Date: 16/9/23
 * Time: 下午2:04
 */

namespace App\Lib\Dao;

use Trensy\Foundation\Storage\Pdo;

class BaseDao extends Pdo
{
    public function __construct()
    {
        $storageConfig = config()->get("storage.server.pdo");
        parent::__construct($storageConfig);
    }

    /**
     * 自动添加
     *
     * @param $data
     * @param $daoObj
     * @return bool
     */
    public function autoAdd($data)
    {
        $allData = [];
        if(!$data) return false;
        foreach ($data as $k=>$v){
            $allData[$k] = $v;
        }
        $allData['created_at'] = date('Y-m-d H:i:s');
        $allData['updated_at'] = date('Y-m-d H:i:s');
        return $this->insert($allData);
    }

    /**
     * 自动更新
     * 
     * @param $data
     * @param $where
     * @param $daoObj
     * @return bool
     */
    public function autoUpdate($data, $where)
    {
        $allData = [];
        if(!$data) return false;
        foreach ($data as $k=>$v){
            $allData[$k] = $v;
        }
        $allData['updated_at'] = date('Y-m-d H:i:s');
        return $this->update($allData, $where);
    }
}