<?php

namespace Notaidea\Catemenu\Model\ResourceModel\Catemenu;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    //主键ID名
    protected $_idFieldName = 'cat_id';

    protected $_eventPrefix = 'notaidea_catemenu_catemenu_collection';

    protected $_eventObject = 'catemenu_collection';

    protected function _construct()
    {
        //1：普通model；2：资源model
        $this->_init(
            \Notaidea\Catemenu\Model\Catemenu::class,
            \Notaidea\Catemenu\Model\ResourceModel\Catemenu::class
        );
    }
}