<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
</head>
<body>
    <h1>Tambah pelanggan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>z
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="name">Nama:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>

        <label for="address">Alamat:</label><br>
        <textarea name="address">{{ old('address') }}</textarea><br>

        <label for="phone">Nomor Telepon:</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}"><br>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">--Select Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('customers.index') }}">Back</a>
</body>
</html>
