
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/icons/favicon.png">
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="/template/css/login-style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/registerAuth" method="POST">
                {{csrf_field()}}
                <div class="logo">
                    <a href="#"><img src="/template/images/icons/image-logo-icon.png" alt="logo"></a>
                </div>
                <h1>create Account</h1>
                @include('admin.alert')
                <input type="text" placeholder="name" name="name" />
                <input type="text" placeholder="phone" name="phone" />
                <input type="text" placeholder="Email" name="email" />
                <input type="password" placeholder="password" name="password" />
                <button type="submit">register</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="/login/store" method="POST" class="signin-form">
                {{csrf_field()}}
                <div class="logo">
                    <a href="#"><img src="/template/images/icons/image-logo-icon.png" alt="logo"></a>
                </div>
                <h1>login</h1>
                @include('admin.alert')
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome back!</h1>
                    <p>Log in to continue shopping!</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello!</h1>
                    <p>Register an account and experience it now!</p>
                    <button class="ghost" id="signUp" >register</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Thank you for trusting Sportswear Shop! Hope you will have the best shopping experience <i class="fa fa-heart"></i>
        </p>
    </footer>
    <!-- partial -->
    <script src="/template/js/client.js"></script>
</body>
</html>
