<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CartsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CartsHelper Test Case
 */
class CartsHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\CartsHelper
     */
    public $Carts;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Carts = new CartsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carts);

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
