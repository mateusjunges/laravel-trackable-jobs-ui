<div>
    <div class="bg-white">
        <div class="p-4 border-b">
            <div class="flex items-center mb-1">
                <h1 class="text-xl mr-4">Tracked Jobs</h1>
            </div>
{{--            <p class="text-sm text-gray-600">--}}
{{--                Deployed to <b>{{ $deployment->environment->name }}</b> by--}}
{{--                <b>{{ $deployment->initiator->name }}</b>--}}
            </p>
        </div>
        @foreach ($trackedJobs as $job)
            <div class="border-b">
                <div class="flex justify-between items-center p-2 px-4">
                    <div class="flex items-center">
                        <span class="text-gray-700 text-sm"># {{ $job->id }}</span>
                    </div>

                    <div class="flex items-center">
                        <span class="text-sm mr-2 text-gray-600">
{{--                            {{ $job->duration() }}--}}1 Hour
                        </span>
                        <x-trackable-jobs-status :status="$job->status" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>