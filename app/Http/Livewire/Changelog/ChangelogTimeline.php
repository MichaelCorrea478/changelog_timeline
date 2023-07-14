<?php

namespace App\Http\Livewire\Changelog;

use App\Models\Changelog;
use Illuminate\Support\Collection;
use Livewire\Component;

class ChangelogTimeline extends Component
{
    public Collection $changelogs;

    protected $listeners = [
        'changelogCreated' => 'refreshChangelogs'
    ];

    public function mount()
    {
        $this->refreshChangelogs();
    }

    public function refreshChangelogs()
    {
        $this->changelogs = Changelog::orderByDesc('release_date')->get();
    }

    public function render()
    {
        return view('livewire.changelog.changelog-timeline');
    }
}
