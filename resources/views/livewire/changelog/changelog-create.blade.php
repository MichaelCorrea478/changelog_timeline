<div>
    @if (!$showForm)
        <div class="d-flex justify-content-end px-4">
            <button class="btn btn-sm btn-success" wire:click="toggleForm">Novo Registro</button>
        </div>
    @else
        <div class="elevation-2 rounded rounded-2 p-2 m-3">
            <form wire:submit.prevent="storeChangelog">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" id="title" class="form-control" wire:model.lazy="changelog.title">
                    @error('changelog.title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" rows="5" wire:model.lazy="changelog.description"></textarea>
                    @error('changelog.description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-sm btn-secondary mx-2" wire:click.prevent="toogleForm">Cancelar</button>
                    <button class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    @endif
</div>
