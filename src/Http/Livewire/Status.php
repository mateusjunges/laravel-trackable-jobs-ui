<?php

namespace Junges\TrackableJobsUi\Http\Livewire;

use Junges\TrackableJobs\Models\TrackedJob;
use Livewire\Component;

class Status extends Component
{
    public function render()
    {
        return view('components.status');
    }

    public function color()
    {
        switch (strtolower($this->status)) {
            case TrackedJob::STATUS_QUEUED:
            case TrackedJob::STATUS_STARTED:
                $color = 'yellow';
                break;

            case TrackedJob::STATUS_FINISHED:
                $color = 'green';
                break;

            case TrackedJob::STATUS_FAILED:
                $color = 'red';
                break;

            default:
                $color = 'gray';
                break;
        }

        return $color;
    }

    public function classList()
    {
        return "inline-block uppercase tracking-wide text-xs text-{$this->color()}-600 bg-{$this->color()}-200 rounded p-1 px-2";
    }
}