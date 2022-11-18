<?php

namespace App\Tests\Command;

use App\Console\Commands\generatecsv;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class GenerateCSVTest extends TestCase
{
    /**
     * @var CommandTester
     */
    private $tester;

    protected function setUp(): void
    {
        $command      = new generatecsv();
        $this->tester = new CommandTester($command);
    }
    
    public function tearDown(): void
    {
        if (file_exists(dirname(__FILE__) . '/dict.csv') === true) {
            rmdir(dirname(__FILE__) . '/dict.csv');
        }
    }

    public function testFileCreation()
    {
        $this->tester->execute([
            'out' => dirname(__FILE__) . '/dict.csv',
        ]);

        $this->assertTrue(file_exists(dirname(__FILE__) . '/dict.csv'));
    }
}