<?php

namespace App\Http\Livewire\Changelog;

use App\Models\Changelog;
use Livewire\Component;

class ChangelogCreate extends Component
{
    public bool $showForm = false;
    public Changelog $changelog;

    protected $rules = [
        'changelog.title' => 'required|string|max:255',
        'changelog.description' => 'required|string',
    ];

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->changelog = new Changelog();
    }

    public function storeChangelog()
    {
        $this->validate();
        $this->changelog->release_date = now();
        $this->changelog->save();
        $this->toggleForm();
        $this->emit('changelogCreated', $this->changelog);
    }

    public function render()
    {
        return view('livewire.changelog.changelog-create');
    }
}
