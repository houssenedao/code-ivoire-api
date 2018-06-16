<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TaskProcessingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $action;

    /**
     * @var User
     */
    private $user;

    /**
     * @var null
     */
    private $model;

    /**
     * @var array
     */
    private $request;

    /**
     * Create a new job instance.
     *
     * @param string $action
     * @param User $user
     * @param null $model
     * @param array|null $request
     */
    public function __construct(string $action, User $user, $model = null, array $request = null)
    {
        $this->action = $action;
        $this->user = $user;
        $this->model = $model;
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
            case 'create':
                $this->createAction();
                break;
            case 'update':
                $this->updateAction();
                break;
            case 'delete':
                $this->deleteAction();
                break;
        }
    }

    /**
     * Create Action
     */
    protected function createAction()
    {
        $create = $this->model::create($this->request);
    }

    /**
     * Update action
     */
    protected function updateAction()
    {
        //
    }

    /**
     * Delete Action
     */
    protected function deleteAction()
    {
        //
    }

}
