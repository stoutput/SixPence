<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonationsTable Test Case
 */
class DonationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DonationsTable
     */
    public $Donations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.donations',
        'app.transactions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Donations') ? [] : ['className' => 'App\Model\Table\DonationsTable'];
        $this->Donations = TableRegistry::get('Donations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Donations);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
