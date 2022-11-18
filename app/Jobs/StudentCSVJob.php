<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\JobCompleted;
use App\Models\Student;
use Event;


class StudentCSVJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $header;
    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       //use to empty for same csv
        Student::truncate();

        foreach ($this->data as $student) {
            $csv_data = array_combine($this->header,$student);
            Student::create($csv_data);

        }
        $subject='Job completed';
    

        // Dispatch event after insertion
        event(new JobCompleted($subject));

    	
       
        echo "Job completed !!";
    }
}
