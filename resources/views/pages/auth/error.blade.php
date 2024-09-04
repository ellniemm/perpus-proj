<!-- resources/views/auth/error.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized</title>
    @vite(['/resources/css/app.css','/resources/js/app.js'])
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized',
                text: '{{ $message }}',
                confirmButtonText: 'OK'
            }).then(function () {
                window.location.href = '{{ route('pages.auth.login') }}'; // Redirect ke halaman utama atau halaman lain yang sesuai
            });
        });
    </script>
</body>
</html>
