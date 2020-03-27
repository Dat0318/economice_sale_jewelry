<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ConfigsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ConfigsHelper Test Case
 */
class ConfigsHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\ConfigsHelper
     */
    public $Configs;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Configs = new ConfigsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Configs);

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
