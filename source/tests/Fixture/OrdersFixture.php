<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'users_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'id của người mua hàng', 'precision' => null, 'autoIncrement' => null],
        'delivery_at' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'thời gian mua hàng', 'precision' => null],
        'code' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Trang thái đơn hàng (chờ xử lí , giao hàng , nhận hàng , xác nhận , đánh giá sản phẩm )', 'precision' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Địa chỉ', 'precision' => null, 'fixed' => null],
        'phone_repicient' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'số điện thoại người nhận', 'precision' => null, 'autoIncrement' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => 'Thời gian đặt hàng', 'precision' => null],
        'updated_at' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'name_repicient' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'Tên người nhập ', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'users_id' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'orders_ibfk_1' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 1,
                'users_id' => 1,
                'delivery_at' => '2019-07-10 09:31:50',
                'code' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'phone_repicient' => 1,
                'created_at' => 1562751110,
                'updated_at' => 1562751110,
                'name_repicient' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
