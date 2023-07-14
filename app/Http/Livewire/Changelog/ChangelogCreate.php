<?php

namespace App\Http\Livewire\Changelog;

use App\Models\Changelog;
use App\Models\ChangelogImage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangelogCreate extends Component
{
    use WithFileUploads;

    public bool $showForm = false;
    public Changelog $changelog;
    public $changelog_images = [];

    protected $rules = [
        'changelog.title' => 'required|string|max:255',
        'changelog.description' => 'required|string',
        'changelog_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->changelog = new Changelog();
        $this->resetErrorBag();
    }

    public function storeChangelog()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $this->changelog->release_date = now();
                $this->changelog->save();
                $this->saveImages();
            });
            $this->toggleForm();
            $this->emit('changelogCreated', $this->changelog);
        } catch (\Exception $e) {
            $this->addError('changelog_images', 'Erro ao salvar imagens: ' . $e->getMessage());
        }
    }

    function saveImages()
    {
        if ($this->changelog_images) {
            foreach ($this->changelog_images as $image) {
                $imagePath = $image->store('public/changelog/changelog_images');
                ChangelogImage::create([
                    'changelog_id' => $this->changelog->id,
                    'image' => $imagePath,
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.changelog.changelog-create');
    }
}
