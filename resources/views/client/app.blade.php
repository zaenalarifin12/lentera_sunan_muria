<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lentera PMII UMK</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/font.css") }}">
    <link rel="icon" href="{{ asset("tailwind/assets/logo.png") }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @yield('style')
</head>
<body>
    <div>
        {{-- header --}}
        
        <header class="border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">
  
          <!-- Logo text or image -->
          <div class="flex items-center justify-between mb-4 md:mb-0">
            <a class="text-black hover:text-orange md:hidden navigation" href="#">
              <i class="fa fa-2x fa-bars"></i>
            </a>

            <p class="font-bold text-blue-900">Lentera PMII UMK</p>

            <h1 class="leading-none text-2xl text-grey-darkest">
              <a class="no-underline text-grey-darkest hover:text-black" href="#">
                <img class="h-8" src="{{ asset("tailwind/assets/logo.png")}}"  />
              </a>
            </h1>
        
            
          </div>
          <!-- END Logo text or image -->
          
          

          <!-- Global navigation -->
          <nav class="hidden nav">
            <ul class="list-reset md:flex md:items-center">
              <li class="md:ml-4">
                <a
                class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
                  Profile
                </a>
              </li>
              <li class="md:ml-4">
                <a
                href="{{ url("/Rilis") }}"
                class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
                  Rilis
                </a>
              </li>
              <li class="md:ml-4">
                <a
                href="{{ url("/Rayon") }}"
                class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
                  Rayon
                </a>
              </li>
              <li class="md:ml-4">
                <a
                href="{{ url("/Kabar Kampus") }}"
                class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="#">
                  Kabar Kampus
                </a>
              </li>
            </ul>
          </nav>
          <!-- END Global navigation -->
        
        </header>

        {{-- <div class="w-10/12 mx-auto pt-2 flex ">
  
          <div class="flex-auto ">
            <button class="hamburger" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
  
          <div >
            <p >Lentera PMII</p>
          </div>
  
          <div class="flex-auto flex justify-end">
            <img class="h-16" src="{{ asset("tailwind/assets/logo.png")}}"  />
          </div>
  
        </div> --}}
      
        @yield('content')
      
        <div class="w-12/12 pt-2 pb-4 bg-gray-800">

            <div class="w-10/12 mx-auto">
                <div>
                    <p class="text-gray-50 my-2">                      
                      Lentera PMII UMK adalah media resmi yang dikelola oleh Pengurus Komisariat Pergerakan Mahasiswa Islam Indonesia Sunan Muria, Universitas Muria Kudus. Merangkum berbagai opini mahasiswa dan umum, serta menyajikan bahasan isu terbaru seputar pergerakan. 
                    </p>
                    
                    <p class="text-gray-50 my-4">
                      Kantor: <br> jl. gondangmanis rt. 3 rw. 11 kec.  bae kab. kudus
                    </p>
                    <div>
                      <i class="fas fa-envelope text-blue-500"></i> <a class="text-yellow-300" href="mailto:pmiisunanmuriakudus@gmail.com">pmiisunanmuriakudus@gmail.com</a>
                    </div>
                </div>
        
            <div>
                <div class="flex justify-end">
        
                    <div class="flex flex-col">
                        <div>
                            <img class="h-8 mx-auto" src="{{ asset("tailwind/assets/logo.png") }}"  />
                        </div>
                            
                        <p class="my-1 text-xs text-white">Lentera PMII</p>
                    </div>
                    
                </div>
                    
                    <p class="text-center text-white mt-8">© Lentera Media 2020 - {{ date('Y') }}</p>
        
                </div>
            </div>
        </div>

      </div>
      
      @yield('script')

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function(){
          $( ".navigation" ).click(function() {
            $( "nav" ).toggleClass("hidden");
          });
        })
      </script>
</body>
</html>

