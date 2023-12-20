<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rekapitulasi Keterlambatan</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>
{{-- <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#">Rekam Keterlambatan</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index')}}">Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Data Master
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('rombel.index') }}">Data Rombel</a></li>
                  <li><a class="dropdown-item" href="{{ route('rayon.index') }}">Data Rayon</a></li>
                  <li><a class="dropdown-item" href="{{ route('student.index') }}">Data Siswa</a></li>
                  <li><a class="dropdown-item" href="{{ route('user.index') }}">Data User</a></li>
                </ul>
              </li>
              <li>
                <a class="nav-link" href="">Data Keterlambatan</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="container">
        @yield('content')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/492d4b16b7.js" crossorigin="anonymous"></script>
</body> --}}
<body class="text-gray-800 font-inter">
  <!-- start: Sidebar -->
  <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
      <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
          <span class="text-lg font-bold text-white ml-3">Rekapitulasi Keterlambatan</span>
      </a>
      <ul class="mt-4">
          <li class="mb-1 group active">
              <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  <i class="ri-home-2-line mr-3 text-lg"></i>
                  <span class="text-sm">Dashboard</span>
              </a>
          </li>
          <li class="mb-1 group">
              <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                  <i class="ri-instance-line mr-3 text-lg"></i>
                  <span class="text-sm">Data Master</span>
                  <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
              </a>
              <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                  <li class="mb-4">
                      <a href="{{ route('rombel.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Rombel</a>
                  </li> 
                  <li class="mb-4">
                      <a href="{{ route('rayon.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Rayon</a>
                  </li> 
                  <li class="mb-4">
                      <a href="{{ route('student.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Siswa</a>
                  </li> 
                  <li class="mb-4">
                      <a href="{{ route('user.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data User</a>
                  </li> 
              </ul>
          </li>
          <li class="mb-1 group">
              <a href="{{ route('late.index')}}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  <i class="fa-regular fa-clock mr-3 text-lg"></i>
                  <span class="text-sm">Data Keterlambatan</span>
              </a>
          </li>
          <li class="mb-1 group">
              <a href="{{ route('logout') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  <i class="fa-solid fa-arrow-right-from-bracket mr-3 text-lg"></i>
                  <span class="text-sm">Logout</span>
              </a>
          </li>
      </ul>
  </div>
   <!-- end: Sidebar -->

  <!-- start: Main -->
  <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
      <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
          <button type="button" class="text-lg text-gray-600 sidebar-toggle">
              <i class="ri-menu-line"></i>
          </button>
          <ul class="flex items-center text-sm ml-4">
              <li class="mr-2">
                  <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
              </li>
          </ul>
          <ul class="ml-auto flex items-center">
              <li class="dropdown">
                  <button type="button" class="flex items-center">
                    <i class="fa-solid fa-user text-lg rounded block object-cover align-middle"></i>
                  </button>
              </li>
          </ul>
      </div>
      <div class="p-6">
      <div class="Content">
          @yield('content')
      </div>
      </div>
  </main>
  {{-- end: Main --}}
 

  <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://kit.fontawesome.com/492d4b16b7.js" crossorigin="anonymous"></script>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  @vite('resources/js/app.js')
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>