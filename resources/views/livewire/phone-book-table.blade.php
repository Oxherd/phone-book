<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
