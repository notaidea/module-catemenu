<?php

namespace Notaidea\Catemenu\Model\ResourceModel;

//资源model的基类
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Catemenu extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ){
        parent::__construct($context);
    }

    protected function _construct()
    {
        //数据表名，主键名
        $this->_init('my_catemenu', 'cat_id');
    }
}