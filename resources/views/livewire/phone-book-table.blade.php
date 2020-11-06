<div>
    <div class="my-3 row">
        <div class="col pt-3 pt-md-0">
            <div class="float-right">
                @livewire('create-new-contact')
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

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

    <div class="row justify-content-center">
        {{ $contacts->links() }}
    </div>
</div>
