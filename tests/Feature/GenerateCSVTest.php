<?php

namespace App\Tests\Feature;

use App\Console\Commands\generatecsv;
use Tests\TestCase;

class GenerateCSVTest extends TestCase
{
  
    
    public function tearDown(): void
    {
        if (file_exists(dirname(__FILE__) . '/dict.csv') === true) {
            rmdir(dirname(__FILE__) . '/dict.csv');
        }
    }

    public function testFileCreation()
    {
       
        $this->artisan('generate:csv')
        ->assertExitCode(0);
       
    }
}