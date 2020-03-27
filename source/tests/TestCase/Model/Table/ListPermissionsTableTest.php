<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListPermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListPermissionsTable Test Case
 */
class ListPermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListPermissionsTable
     */
    public $ListPermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ListPermissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ListPermissions') ? [] : ['className' => ListPermissionsTable::class];
        $this->ListPermissions = TableRegistry::getTableLocator()->get('ListPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ListPermissions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
