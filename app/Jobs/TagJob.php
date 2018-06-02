<?php

namespace App\Jobs;

use App\Events\TagBroadcast;
use App\Models\Tag;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TagJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    protected $action;

    /**
     * @var Tag
     */
    protected $tag;

    /**
     * @var null
     */
    protected $request;

    /**
     * Create a new job instance.
     *
     * @param $action
     * @param Tag $tag
     * @param $request
     */
    public function __construct($action, Tag $tag = null, $request = null)
    {
        $this->action = $action;

        $this->tag = $tag;

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
            $create = Tag::create($this->request);

            if ($create) {
                event(new TagBroadcast($create, 'STORE'));
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
            $update = $this->tag->fill($this->request);

            if ($update) {
                event(new TagBroadcast($update, 'UPDATE'));
            }
        }
    }
}
