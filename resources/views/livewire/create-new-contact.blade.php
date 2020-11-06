<div>
    <button type="button" class="btn btn-outline-primary" data-target="#create-new-contact-form" data-toggle="modal">
        New Contact</button>

    <div class="modal fade" id="create-new-contact-form" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create A New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
