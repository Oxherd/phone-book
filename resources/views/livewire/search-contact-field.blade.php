<div class="input-group">
    <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="Search">

    @if ($search)
        <div class="input-group-append">
            <button wire:click="resetSearch" type="button" class="btn btn-outline-secondary">
                <span>&times;</span>
            </button>
        </div>
    @endif
</div>
