<html>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('icon/toko.pngi') }}">
    </html>
            @extends('layout')
                @section('content')
    <title>Login</title>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="bg-light rounded p-4">
                        <h3 class="text-center mb-4 3d-effect">Login</h3>
                        <style>
                            .3d-effect {
                                transform: perspective(1000px) rotateX(30deg);
                            }
                            h3 {
                                font-size: 3em;
                                text-align: center;
                                transform: perspective(1000px) rotateY(20deg);
                                transition: transform 0.5s ease;
                            }
                            h3:hover {
                                transform: perspective(1000px) rotateY(-20deg);
                            }
                        </style>
                        @if (\Session::has('message'))
                            <script>
                                alert('email atau password yang anda masukkan salah');
                            </script>
                        @endif
                        <form method="POST" action="{{ route('postlogin') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">Email tidak boleh kosong </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">Password tidak boleh kosong</span>
                                @endif
                                @if (session('error'))
                                    <span class="text-danger">{{ session('error') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i>
                                        Login</button>
                                </div>
                            </div>
                        </form>
                        <p class="text-center mb-0">Belum punya akun? <a href="{{ url('signup') }}">Daftar sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        body {
            background: linear-gradient(to right, #22b2b2, #A52A2A);
            font-family: 'Segoe UI', sans-serif;
        }
        .login-form {
            margin-top: 80px;
        }
        .form-group label {
            font-weight: bold;
            color: #707070;
        }
        .form-control {
            border: none;
            background-color: #F5F5F5;
            border-radius: 0;
            border-bottom: 2px solid #B22222;
            box-shadow: none;
            font-size: 18px;
            color: #B22222;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-bottom: 2px solid #B22222;
        }
        {{--  .btn-primary {
            transform: translateY(-2px);
            background-color: #B22222;
            border-color: #B22222;
            font-weight: bold;
            transition: all .2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            font-size: 20px;
            color: #FFF;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:hover {
            animation: pulse 1s infinite;
            background-color: #A52A2A;
            border-color: #A52A2A;
        }
        .btn-link {
            color: #B22222;
        }  --}}
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-box h3 {
            margin: 0 0 20px;
            font-weight: bold;
            font-size: 36px;
            color: #000000;
            text-transform: uppercase;
            text-shadow: 2px 2px 0px rgba(255, 255, 255, 0.5),
                3px 3px 0px rgba(0, 0, 0, 0.2),
                8px 8px 10px rgba(0, 0, 0, 0.3);
        }
        .login-box form {
            width: 100%;
        }
        .login-box .form-group {
            margin-bottom: 30px;
            width: 100%;
        }
    </style>
