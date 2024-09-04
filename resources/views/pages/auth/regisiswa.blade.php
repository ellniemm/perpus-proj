<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: url('https://i.pinimg.com/564x/0a/bd/ab/0abdabf1dbabb91f90cb732dbd4ec295.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .custom-card {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            color: white;
        }

        .custom-text-color {
            color: #ffd9ade7;
            /* Custom text color */
        }
    </style>
</head>

<body>
    <div class="container mt-5 p-4 pe-5 ps-5">
        <div class="row">
            <h1 class="fw-bold fs-1 text-center mb-4">
                Register.
            </h1>
            <div class="card custom-card p-4">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="nama."
                            value="{{ old('user_nama') }}" required>
                        @error('user_nama')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="user_alamat" name="user_alamat"
                            placeholder="alamat." value="{{ old('user_alamat') }}" required>
                        @error('user_alamat')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <input type="email" class="form-control" id="user_email" name="user_email"
                                placeholder="email." value="{{ old('user_email') }}" aria-label="email" required>
                            @error('user_email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="user_notelp" name="user_notelp"
                                placeholder="no.telp" value="{{ old('user_notelp') }}" aria-label="notelp" required>
                            @error('user_notelp')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" id="user_username" name="user_username"
                                placeholder="username." value="{{ old('user_username') }}" aria-label="username"
                                required>
                            @error('user_username')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" id="user_password" name="user_password"
                                placeholder="password." aria-label="password" required>
                            @error('user_password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select class="form-select" name="user_level" aria-label="Default select example" required>
                                <option selected disabled>role.</option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning fw-bolder">register</button>
                    </div>
                    <div class="d-flex pt-3 justify-content-center fw-medium">
                        <a class="custom-text-color" href="{{ route('login') }}">haved account? login.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
