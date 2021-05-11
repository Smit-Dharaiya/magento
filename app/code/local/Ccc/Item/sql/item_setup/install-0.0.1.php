<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('item/item'))
    ->addColumn(
        'item_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        [
            'identity' => true,
            'nullable' => false,
            'primary' => true
        ],
        'Item Id'
    )
    ->addColumn(
        'item_name',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        null,
        [
            'nullable' => true
        ],
        'Item Name'
    )
    ->addColumn(
        'sku',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        [
            'nullable' => false
        ],
        'Item Sku'
    )
    ->addColumn(
        'created_date',
        Varien_Db_Ddl_Table::TYPE_DATETIME,
        null,
        [
            'nullable' => false
        ],
        'Created Date'
    );

$installer->getConnection()->createTable($table);
$installer->endSetup();
