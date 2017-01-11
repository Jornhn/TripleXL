<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CvTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CvTable Test Case
 */
class CvTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CvTable
     */
    public $Cv;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cv'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cv') ? [] : ['className' => 'App\Model\Table\CvTable'];
        $this->Cv = TableRegistry::get('Cv', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cv);

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
}
