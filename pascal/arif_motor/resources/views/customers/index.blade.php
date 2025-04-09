<!DOCTYPE html>
<html>
<head>
    <title>daftar Pelanggan</title>
</head>
<body>
    <h1>daftar Pelanggan</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('customers.create') }}">Tambah pelanggan</a><br><br>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>nama</th>
                <th>Alamat</th>
                <th>Nomor telepon</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ ucfirst($customer->gender) }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a> |
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure to delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
