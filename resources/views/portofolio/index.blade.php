<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
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
        <h1>{{ $portofolio->name }}</h1>
        <img src="{{ asset('storage/profile_photos/' . $portofolio->profile_photo) }}" class="img-fluid" style="width:150px;height:auto;">
        <p><strong>NIM:</strong> {{ $portofolio->nim }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $portofolio->birthday }}</p>
        <p><strong>Alamat:</strong> {{ $portofolio->city }}</p>
        <p><strong>Jurusan:</strong> {{ $portofolio->study_program }}</p>
        <p><strong>Email:</strong> {{ $portofolio->email }}</p>
        <p><strong>Pendidikan:</strong> {{ $portofolio->resume }}</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
