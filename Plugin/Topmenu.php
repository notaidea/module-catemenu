<?php

namespace Notaidea\Catemenu\Plugin;

use Magento\Framework\Data\Tree\NodeFactory;

class Topmenu
{
    private $modelFactory;

    public function __construct(\Notaidea\Catemenu\Model\ResourceModel\Catemenu\CollectionFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory->create();
    }

    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $topmenu, $html)
    {
        $list = $this->modelFactory->load();

        foreach ($list as $k => $v) {
            $html .= "<li class=\"level0 nav-4 level-top ui-menu-item\">";
            $html .= "<a href=\"" . "{$v->getUrl()}" . "\" class=\"level-top ui-corner-all\" aria-haspopup=\"true\" tabindex=\"-1\" role=\"menuitem\"><span class=\"ui-menu-icon ui-icon ui-icon-carat-1-e\"></span><span>" . __("{$v->getName()}") . "</span></a>";
            $html .= "</li>";
        }

        return $html;
    }
}