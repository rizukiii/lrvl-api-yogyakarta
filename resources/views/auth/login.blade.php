<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - SB Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: mistyrose;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .card {
            background-color: mistyrose;
            border: 2px solid maroon;
        }

        .card-header {
            background-color: maroon;
            color: mistyrose;
            text-align: center;
        }

        .btn-danger {
            background-color: maroon;
            border-color: maroon;
            color: mistyrose;
        }

        .btn-danger:hover {
            background-color: darkred;
            color: mistyrose;
        }

        .footer {
            background-color: mistyrose;
            border-top: 2px solid maroon;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }

        /* CSS untuk mengubah warna link menjadi maroon */
        a {
            color: maroon;
            text-decoration: none;
            /* Opsional: Menghilangkan garis bawah */
        }

        a:hover {
            color: darkred;
            /* Opsional: Warna saat hover */
        }

        /* Mengubah warna teks label "Remember Password" menjadi maroon */
        .form-check-label {
            color: maroon;
        }

        /* Mengubah warna checkbox menjadi maroon */
        .form-check-input {
            border: 2px solid maroon;
            /* Warna border checkbox */
            background-color: white;
            /* Latar belakang default */
        }

        /* Warna checkbox saat dicentang */
        .form-check-input:checked {
            background-color: maroon;
            border-color: maroon;
        }
    </style>

</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="my-1">Login</h3>
                                </div>
                                <div class="card-body mt-3">
                                    <form action="{{ route('authenticate') }}" method="post">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email"
                                                placeholder="name@example.com" name="email">
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="password">
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-danger" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="text-muted">&copy; Kota Yogyakarta 2025</div>
            <div>
                <a href="#">Privacy Policy</a> &middot; <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
