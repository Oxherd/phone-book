<div>
    <div class="input-group my-3">
        <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="Search">

        @if($search)
        <div class="input-group-append">
            <button wire:click="resetSearch" type="button" class="btn btn-outline-secondary">
                <span>&times;</span>
            </button>
        </div>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->address }}</td>
            </tr>
            @empty
            <tr class="alert alert-light text-center" role="alert">
                <td colspan="10">Sorry, no result.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
