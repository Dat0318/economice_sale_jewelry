<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersProductsFixture
 */
class OrdersProductsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'orders_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'products_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'giá sản phẩm', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số lượng sản phẩm', 'precision' => null, 'autoIncrement' => null],
        'products_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Tên sản phẩm', 'precision' => null, 'fixed' => null],
        'price_sale' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price_entered' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Giá tại lúc đã nhập ', 'precision' => null, 'autoIncrement' => null],
        'price_comercial' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Giá thị trường', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'orders_id' => ['type' => 'index', 'columns' => ['orders_id'], 'length' => []],
            'products_id' => ['type' => 'index', 'columns' => ['products_id'], 'length' => []],
        ],
        '_constraints' => [
            'orders_products_ibfk_1' => ['type' => 'foreign', 'columns' => ['orders_id'], 'references' => ['orders', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'orders_products_ibfk_2' => ['type' => 'foreign', 'columns' => ['products_id'], 'references' => ['products', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'orders_id' => 1,
                'products_id' => 1,
                'price' => 1,
                'quantity' => 1,
                'products_name' => 'Lorem ipsum dolor sit amet',
                'price_sale' => 1,
                'price_entered' => 1,
                'price_comercial' => 1
            ],
        ];
        parent::init();
    }
}
