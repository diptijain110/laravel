<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Response;

class generatecsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate CSV';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
                        );
        
        $users = [
            ['1', 'test','1','100','12345678','lorem ipsum','aa@aa.com'],
            ['2', 'test','1','80','12345678444','lorem ipsum','aa1@aa1.com'],
            ['3', 'test','1','90','12345678666','lorem ipsum','aa2@aa2.com'],
            ['4', 'test','1','100','12345678','lorem ipsum','aa@aa.com'],
            ['5', 'test','1','80','12345678444','lorem ipsum','aa1@aa1.com'],
            ['36', 'test','1','90','12345678666','lorem ipsum','aa2@aa2.com'],
            ['7', 'test','1','100','12345678','lorem ipsum','aa@aa.com'],
            ['28', 'test','1','80','12345678444','lorem ipsum','aa1@aa1.com'],
            ['39', 'test','1','90','12345678666','lorem ipsum','aa2@aa2.com'],
        ];
        
        $columns = array(
                'id', 
                'name', 
                'class', 
                'score',
                'phone',
                'address',
                'email' 
               
            );
            $filename =  public_path("dict.csv");
            $handle = fopen($filename, 'w');
            fputcsv($handle, $columns);
        
            foreach($users as $user) {
            fputcsv($handle, $user);
            
            }
            fclose($handle);
        
            return Command::SUCCESS;
           


        // ;
    }
}
