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
    <div class="lg:w-72 w-full h-screen bg-grey-light px-8 flex flex-col justify-between fixed z-20" id="myNav">
        <div class="flex items-center w-full h-24 gap-6 lg:justify-center">
            <button class="border border-pink p-2 lg:hidden">
                <i class="h-8 w-8" data-feather="x" onclick="closeNav()"></i>
            </button>
            <div class="flex items-center text-4xl">
                <span class="font-bold">gwdan</span><span class="font-extrabold text-pink">GG</span>
            </div>
        </div>
        <div class="flex flex-col flex-grow gap-5 mt-8">
            <a href="/"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'dashboard' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="grid"></i>
                <span>Dashboard</span>
            </a>
            <a href="/product"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'product' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="shopping-bag"></i>
                <span>Product</span>
            </a>
            {{-- <a href="/product-item"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'product-item' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="tag"></i>
                <span>Product Item</span>
            </a> --}}
            <a href="/transaction"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'transaction' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="clipboard"></i>
                <span>Transactions</span>
            </a>
            {{-- <a href="/report"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'report' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="bar-chart-2"></i>
                <span>Report</span>
            </a>
            <a href="/order"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'order' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="shopping-cart"></i>
                <span>Order</span>
            </a> --}}
            @if(auth()->user()->role === 'super admin')
            <a href="/user"
                class="flex items-center gap-4 hover:text-pink cursor-pointer {{$page === 'user' ? 'text-pink' : ''}}">
                <i class="h-5 w-5" data-feather="users"></i>
                <span>Admin</span>
            </a>
            @endif
        </div>
        <div class="py-8 flex flex-col gap-5 mt-8">
            <div class="flex items-center gap-4 text-black hover:text-pink cursor-pointer">
                <i class="h-5 w-5" data-feather="info"></i>
                <span>Help and Information</span>
            </div>
            @auth
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="flex items-center gap-4 text-red hover:text-red cursor-pointer">
                    <i class="h-5 w-5" data-feather="minus-circle"></i>
                    <span>Logout</span>
                </button>
            </form>
            @endauth

        </div>
    </div>
    <div class="lg:ml-72 px-8 pb-8" id="content">
        <div class="flex items-center w-full h-24 gap-6 lg:hidden border-b border-grey sticky top-0 bg-white z-10">
            <button class="border border-pink p-2">
                <i class="h-8 w-8" data-feather="menu" onclick="openNav()"></i>
            </button>
            <div class="flex items-center text-4xl">
                <span class="font-bold">gwdan</span><span class="font-extrabold text-pink">GG</span>
            </div>
        </div>
        <div
            class="h-24 flex items-center w-full justify-end border-b border-grey sticky top-24 lg:top-0 bg-white z-10">
            <div class="flex items-center gap-2">
                <div class="p-2 border">
                    <i class="h-5 w-5" data-feather="user"></i>
                </div>
                <div>
                    <span>{{auth()->user()->name}} </span>
                    <span class="block text-xs text-grey italic">{{auth()->user()->role}}</span>
                </div>
            </div>
        </div>
        <div class="text-sm">
            @yield('app')
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const COLORS = ['#FFBF00', '#C92C6D', '#2274A5', '#32936F',"#eac435", ];
</script>
<script>
    function getMonthName(monthNumber) {
        const date = new Date();
        date.setMonth(monthNumber - 1);

        return date.toLocaleString("en-US", { month: "long" });
    }

    const rupiahFormat = (_number) => {
        let number = 0;

        if (typeof _number === 'number') {
            number = _number;
        } else if (typeof _number === 'string') {
            const parsedNum = parseFloat(_number);
            if (!isNaN(parsedNum)) {
            number = parsedNum;
            }
        } else {
            return '-';
        }

        const formattedNum = new Intl.NumberFormat('id-ID', { maximumFractionDigits: 2 }).format(number);

        return `Rp${formattedNum}`;
    };

    feather.replace();
    
    function openNav() {
        document.getElementById("myNav").style.left = "0px";
    }

    function closeNav() {
        document.getElementById("myNav").style.left = "-100%";
    }

    const mql = window.matchMedia("(min-width: 1024px)");

    mql.onchange = (e) => {
        if (e.matches) {
            openNav();
        } else {
            closeNav();
        }
    };

</script>
@yield('script')

</html>