<?php

namespace App\Domains\Pagination\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Pagination\Paginator;

class MakeSimplePaginatorJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected $items, 
        protected $perPage, 
        protected $currentPage = null,
        protected $options = []
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
        return new Paginator(
            $this->items, 
            $this->perPage, 
            $this->currentPage, 
            $this->options
        );
    }
}