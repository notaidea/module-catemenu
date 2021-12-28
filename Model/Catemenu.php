<?php

namespace Notaidea\Catemenu\Model;

//model的基类
use Magento\Framework\Model\AbstractModel;

//这是缓存用的接口
use Magento\Framework\DataObject\IdentityInterface;

class Catemenu extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'notaidea_catemenu_catemenu';

    protected $_cacheTag = 'notaidea_catemenu_catemenu';

    protected $_eventPrefix = 'notaidea_catemenu_catemenu';

    protected function _construct()
    {
        //绑定资源模型
        $this->_init('Notaidea\Catemenu\Model\ResourceModel\Catemenu');
    }

    //返回一个唯一值
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}