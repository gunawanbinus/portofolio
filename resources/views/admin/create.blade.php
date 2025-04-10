<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Portofolio</title>
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
        <h1>Create Portofolio</h1>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" name="nim" required maxlength="10">
            </div>
            <div class="form-group">
                <label for="birthday">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="city">Alamat:</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
                <label for="study_program">Jurusan:</label>
                <input type="text" class="form-control" name="study_program" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="resume">Pendidikan:</label>
                <textarea class="form-control" name="resume" required></textarea>
            </div>
            <div class="form-group">
                <label for="profile_photo">Profile Photo:</label>
                <input type="file" class="form-control-file" name="profile_photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Create Portofolio</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
