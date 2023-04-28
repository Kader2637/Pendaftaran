@extends('layout')

@section('content')
    <main class="signup-form">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10">
                <div class="text-center">
                    <style>
                        /* Body */
                        body {
                            background-color: #F1F5F9;
                            font-family: 'Poppins', sans-serif;
                        }

                        /* Header */
                        header {
                            background-color: #1F2937;
                            color: #FFFFFF;
                            font-size: 24px;
                            font-weight: 600;
                            padding: 20px;
                        }

                        /* Form */
                        form {
                            background-color: #FFFFFF;
                            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                            border-radius: 10px;
                            padding: 30px;
                            max-width: 500px;
                            margin: 0 auto;
                        }

                        .invalid-feedback {
                            display: block;
                            margin-top: .25rem;
                            font-size: 80%;
                            color: #dc3545;
                        }

                        form label {
                            font-weight: 500;
                            color: #374151;
                        }

                        form input[type="text"],
                        form input[type="email"],
                        form input[type="password"],
                        form input[type="checkbox"] {
                            border: none;
                            border-radius: 5px;
                            padding: 10px;
                            margin-bottom: 20px;
                            width: 100%;
                        }

                        form input[type="text"]:focus,
                        form input[type="email"]:focus,
                        form input[type="password"]:focus {
                            outline: none;
                            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                        }

                        .flex {
                            display: flex;
                            flex-direction: row;
                            justify-content: center;
                            align-items: center;
                        }

                        button,
                        a.btn {
                            margin: 0 10px;
                        }


                        form input[type="checkbox"] {
                            margin-right: 10px;
                        }

                        .btn:hover {
                            background-color: #0062ff;
                        }

                        .btn {
                            background-color: #ff0c0c;
                            color: #fffcfc;
                            border: none;
                            border-radius: 3px;
                            padding: 15px 20px;
                            font-weight: 600;
                            margin-top: 20px;
                            margin-right: 10px;
                            transition: all 0.3s ease-in-out;
                        }

                        body {
                            background: linear-gradient(to right, #22b2b2, #A52A2A);
                            font-family: 'Segoe UI', sans-serif;
                        }

                        form button[type="submit"] {
                            background-color: #51e3de;
                            color: #000000;
                            border: none;
                            border-radius: 3px;
                            padding: 10px 20px;
                            font-weight: 600;
                            margin-top: 20px;
                            transition: all 0.3s ease-in-out;
                        }

                        form button[type="submit"]:hover {
                            background-color: #0062ff;
                        }
                    </style>
                    <h3 class="text-3xl font-bold mb-3">Register User</h3>
                </div>
                <form action="{{ route('postsignup') }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name <i
                                class="fa fa-user"></i></label>
                        <input type="text" placeholder="Enter your name" id="name" name="name" autofocus
                            class="form-input mt-1 block w-full border-gray-200 rounded-md py-2 px-3 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email_address" class="block text-gray-700 font-bold mb-2">Email <i
                                class="fa fa-envelope-o"></i></label>
                        <input type="email" placeholder="Enter your email" id="email_address" name="email" autofocus
                            class="form-input mt-1 block w-full border-gray-200 rounded-md py-2 px-3 @error('email') border-red-500 @enderror">
                        @error('email')
                            <script>
                                alert('Email telah digunakan !!!')
                            </script>

                            <script>
                                var alertList = document.querySelectorAll('.alert');
                                alertList.forEach(function(alert) {
                                    new bootstrap.Alert(alert)
                                })
                            </script>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jabatan">Jabatan:</label>
                        <select name="jabatan" id="jabatan-select" class="form-select" required>
                          <option value="" disabled selected>Pilih jabatan</option>
                          <option value="admin">Admin</option>
                          <option value="guru">Guru</option>
                          <option value="siswa">Siswa</option>
                        </select>
                      </div>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>

                    <br>

                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" required oninput="check(this)">
                    <span id="message"></span>

                    <script>
                    function check(input) {
                      if (input.value !== document.getElementById('password').value) {
                        input.setCustomValidity('Passwords tidak valid !');
                        document.getElementById('message').innerHTML = '';
                      } else {
                        input.setCustomValidity('');
                        document.getElementById('message').innerHTML = '';
                      }
                    }
                    </script>



                    {{-- <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox">
                        <span class="ml-2 text-gray-700 font-bold">Remember me</span>
                    </label>
                </div> --}}
                    <div class="flex justify-center">
                        <button type="submit"
                            class=" text-white rounded-full py-2  hover:bg-gray-900 focus:outline-none focus:shadow-outline mr-4">
                            <i class="fa fa-user-plus"></i>
                            Register
                        </button>

                    </div><br>
                    <p class="text-center mb-0">Sudah punya akun? <a href="{{ url('login') }}">Login</a></p>
                </form>

            </div>
        </div>
    </main>
@endsection
