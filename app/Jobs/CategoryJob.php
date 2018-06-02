<?php

namespace App\Jobs;

use App\Events\CategoryBroadcast;
use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CategoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    protected $action;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var Request
     */
    protected $request;

    /**
     * Create a new job instance.
     *
     * @param $action
     * @param Category $category
     * @param $request
     */
    public function __construct($action, Category $category = null, $request = null)
    {
        $this->action = $action;

        $this->category = $category;

        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->action) {
            case 'STORE':
                $this->store();
                break;
            case 'UPDATE':
                $this->update();
                break;
        }
    }

    /**
     * Store Category
     *
     * @return void
     */
    private function store()
    {
        if ($this->request !== null) {
            $create = Category::create($this->request);

            if ($create) {
                event(new CategoryBroadcast($create, 'STORE'));
            }
        }
    }

    /**
     * Update Category
     *
     * @return void
     */
    private function update()
    {
        if ($this->request !== null) {
            $update = $this->category->fill($this->request);

            if ($update) {
                event(new CategoryBroadcast($update, 'UPDATE'));
            }
        }
    }
}
