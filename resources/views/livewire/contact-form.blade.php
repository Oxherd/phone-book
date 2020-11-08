<div>
    <div class="d-flex justify-content-between align-items-start">
        @if ($contact->exists)
            <h5 class="modal-title">Edit Contact</h5>
        @else
            <h5 class="modal-title">Create A New Contact</h5>
        @endif
        <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
        </button>
    </div>
    <hr>
    <form wire:submit.prevent="store" action="#">
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model.defer="name" type="text" class="form-control" id="name">

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone_number">Phone</label>
            <input wire:model.defer="phone_number" type="text" class="form-control" id="phone_number">

            @error('phone_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input wire:model.defer="email" type="text" class="form-control" id="email">

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input wire:model.defer="address" type="text" class="form-control" id="address">
        </div>

        <hr>
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            @if ($contact->exists)
                <button type="submit" class="btn btn-primary">Update</button>
            @else
                <button type="submit" class="btn btn-primary">Create</button>
            @endif
        </div>
    </form>
</div>
