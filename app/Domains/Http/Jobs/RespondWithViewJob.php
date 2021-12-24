<?php

namespace App\Domains\Http\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

class RespondWithViewJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected $view, 
        protected $data = []
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return view($this->view, $this->data);
    }
}