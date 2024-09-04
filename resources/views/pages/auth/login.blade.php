<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.</title>
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

        .custom-button {
            background-color: #dbc1ac;
            /* Custom button background color */
            border-color: #634832;
            /* Custom button border color */
            color: #000000;
            /* Custom button text color */
            
        }
    
        .center-button {
            padding-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }
        .custom-text-color {
            color: #ffd9ade7;
            /* Custom text color (Tomato) */
        }
    </style>
</head>

<body>
    <div class="container mt-5 p-4 pe-5 ps-5">
        <div class="row">
            <h1 class="fw-bold fs-1 text-center mb-4">
                login.
            </h1>
            <div class="col"></div>
            <div class="card custom-card p-4 col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="user_username">Username</label>
                        <input type="text" class="form-control" name="user_username" id="user_username" required
                            autofocus>
                        @error('user_username')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control" name="user_password" id="user_password" required>
                        @error('user_password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="center-button">
                        <button type="submit" class="btn custom-button fw-bold">Login</button>
                        <a class="custom-text-color" href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
