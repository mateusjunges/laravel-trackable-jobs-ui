# Laravel Trackable Jobs Ui
This package provides a simple UI for the Trackable Jobs package.

## Installation
You can install this package using composer:
```bash
composer require mateusjunges/laravel-trackable-jobs-ui
```

Now, you must publish the package assets:
```bash
php artisan vendor:publish --tag=trackable-jobs-ui-assets
```

You can also publish the package views for customization:
```php
php artisan vendor:publish --tag=trackable-jobs-views
```

## Usage
This package provides a simple livewire component that you can use to display the tracked jobs in your application.
You can include it in your blade files with this line of code:

```php
<livewire:trackable-jobs-job-status :trackedJobs="$trackedJobs"></livewire:trackable-jobs-job-status>
```
The `$trackedJobs` variables has the Collection of `Junges\TrackableJobs\Models\TrackedJob` models instance to be displayed using this component.
