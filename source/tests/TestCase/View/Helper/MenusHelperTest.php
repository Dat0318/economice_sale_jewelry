<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MenusHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MenusHelper Test Case
 */
class MenusHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\MenusHelper
     */
    public $Menus;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Menus = new MenusHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Menus);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
