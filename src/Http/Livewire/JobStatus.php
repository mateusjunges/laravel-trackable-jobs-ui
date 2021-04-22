<?php

namespace Junges\TrackableJobsUi\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class JobStatus extends Component
{
    public Collection $trackedJobs;

    public function mount(Collection $trackedJobs)
    {
        $this->trackedJobs = $trackedJobs;
    }

    public function render()
    {
        return view('components.job-status', [
            'trackedJobs' => $this->trackedJobs
        ]);
    }
}
