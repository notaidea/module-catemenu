<?php

namespace Notaidea\Catemenu\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    )
    {
        $installer = $setup;
        $installer->startSetup();

        if ($installer->tableExists('my_catemenu')) {
            return;
        }

        //创建table
        $table = $installer->getConnection()->newTable(
            $installer->getTable('my_catemenu')
        )->addColumn(
            'cat_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true,
            ],
            'Cat ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            20,
            [
                'nullable' => false,
            ],
            'URL name'
        )->addColumn(
            'url',
            Table::TYPE_TEXT,
            500,
            [
                'nullable' => false,
            ],
            'URL'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT,
            ],
            'Created At'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT_UPDATE,
            ],
            'Updated At'
        )->setComment('my_catemenu Table');

        //写入数据库
        $installer->getConnection()->createTable($table);

        //完成
        $installer->endSetup();
    }
}
