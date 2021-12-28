<?php

namespace Notaidea\Catemenu\Block\Adminhtml\Catemenu\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Save extends Generic implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                //targetName = ui_component配置中的namespace.namespace
                                'targetName' => 'notaidea_catemenu_catemenu_form.notaidea_catemenu_catemenu_form',
                                'actionName' => 'save',
                                'params' => [false],
                            ],
                        ],
                    ],
                ],
            ],
            'class_name' => Container::SPLIT_BUTTON,
            'options' => $this->getOptions(),
        ];
    }

    /**
     * Retrieve options
     *
     * @return array
     */
    protected function getOptions()
    {
        $options[] = [
            'id_hard' => 'save_and_new',
            'label' => __('Save & New'),
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                //targetName = ui_component配置中的namespace.namespace
                                'targetName' => 'notaidea_catemenu_catemenu_form.notaidea_catemenu_catemenu_form',
                                'actionName' => 'save',
                                'params' => [
                                    true, [
                                        'back' => 'add',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $options[] = [
            'id_hard' => 'save_and_close',
            'label' => __('Save & Close'),
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                //targetName = ui_component配置中的namespace.namespace
                                'targetName' => 'notaidea_catemenu_catemenu_form.notaidea_catemenu_catemenu_form',
                                'actionName' => 'save',
                                'params' => [true],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $options;
    }
}