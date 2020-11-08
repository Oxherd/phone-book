<div class="btn-group dropright">
    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
        &#9881;
    </button>
    <div class="dropdown-menu">
        <a wire:click="openEditModal" data-target="#modal" data-toggle="modal" class="dropdown-item" href="#">Edit</a>
        <div class="dropdown-divider"></div>
        <a wire:click="openDeleteModal" data-target="#modal" data-toggle="modal" class="dropdown-item" href="#">Delete</a>
    </div>
</div>
