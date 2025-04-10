<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Portofolioku</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portofolio.index') }}">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Admin Page</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <h1>Admin Page</h1>
        <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Create New Portofolio</a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($portofolios as $portofolio)
                <tr>
                    <td>{{ $portofolio->name }}</td>
                    <td>{{ $portofolio->nim }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $portofolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $portofolio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
