<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex h-screen">
        <div style="background: url({{asset('./img/main.jpg')}});background-position:center;background-size:cover;"
            class="min-w-2/5 h-full hidden lg:block">
        </div>
        <div class="flex items-center justify-center w-full">
            <div class="max-w-xs w-full text-center">
                <div class="flex items-center text-5xl justify-center mb-4">
                    <span class="font-bold">gwdan</span><span class="font-extrabold text-pink">GG</span>
                </div>

                <h1 class="text-2xl font-semibold">Login</h1>
                <p class="text-grey-dark mt-4 mb-6">Selamat datang di gudanGG</p>
                <p id="errorMessage" class="text-xs text-red mb-6">{{session('errorMessage')}}</p>

                @if(session()->has('successMessage'))
                <p id="successMessage" class="text-xs text-green mb-6">{{session('successMessage')}}</p>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="form-container text-left">
                        <label @error('username') class="label-error" @enderror for="username">Username</label>
                        <input @error('username') class="input-error" @enderror type="text" id="username"
                            name="username" placeholder="Masukkan Username" value={{old('username')}}>
                        @error('username')
                        <span class="text-xs text-red mt-1">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-container text-left">
                        <label @error('password') class="label-error" @enderror for="password">Password</label>
                        <input @error('password') class="input-error" @enderror type="password" id="password"
                            name="password" placeholder="Masukkan Password" value={{old('password')}}>
                        @error('password')
                        <span class="text-xs text-red mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <button id="login" class="button button-full w-full mt-4">
                        <span>Login</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    let counter = {{ Session::get('count') }};
    let message = "{{ Session::get('errorMessage') }}";
    console.log({counter, message})

    const btnLogin = document.getElementById("login");
    const errorMessage = document.getElementById("errorMessage");

    if (counter > 0) {
        const interval = setInterval(function() {
          counter = counter - 1;
          if (counter > 0) {
            btnLogin.disabled = true
            errorMessage.innerHTML = `${message} Coba lagi dalam ${counter} detik.`
          } else {
            clearInterval(interval);
            errorMessage.innerHTML = ""
            btnLogin.disabled = false
          }
        }, 1000);
    }


  const successMessage = document.getElementById("successMessage");
  setTimeout(() => {
    successMessage.innerHTML = ""
  }, 3000);

</script>

</html>