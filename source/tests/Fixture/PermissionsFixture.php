<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionsFixture
 */
class PermissionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'list_permissions_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'lấy 2 khóa chính của 2 bảng phân quyền và group để tạo khóa chính', 'precision' => null, 'autoIncrement' => null],
        'groups_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'lấy 2 khóa chính của 2 bảng phân quyền và group để tạo khóa chính', 'precision' => null, 'autoIncrement' => null],
        'value' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '1: được cấp quyền ,0 : không được cấp quyền', 'precision' => null],
        '_indexes' => [
            'list_permissions_id' => ['type' => 'index', 'columns' => ['list_permissions_id'], 'length' => []],
            'groups_id' => ['type' => 'index', 'columns' => ['groups_id'], 'length' => []],
        ],
        '_constraints' => [
            'permissions_ibfk_1' => ['type' => 'foreign', 'columns' => ['list_permissions_id'], 'references' => ['list_permissions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'permissions_ibfk_2' => ['type' => 'foreign', 'columns' => ['groups_id'], 'references' => ['groups', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'list_permissions_id' => 1,
                'groups_id' => 1,
                'value' => 1
            ],
        ];
        parent::init();
    }
}
