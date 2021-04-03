@extends('client.app')

@section('style')
  <link rel="stylesheet" href="{{ asset("tailwind/owl.carousel.min.css")}}">
  <link rel="stylesheet" href="{{ asset("tailwind/owl.theme.default.min.css")}}">
@endsection

@section('content')
    {{-- body --}}
    <div class="w-10/12 mx-auto pt-2 ">
          
      {{-- tag --}}
        <div class="w-full flex flex-wrap ">

          <a href="{{ url("/") }}" class="bg-yellow-500 rounded mr-3 my-2">
            <span class="px-4 py-2 text-white text-sm">Home</span>
          </a>

          @foreach ($categories as $item)
            <a href="{{ url("/posts/categories/$item->uuid") }}" class="bg-blue-900 rounded mr-3 my-2">
              <span class="px-4 py-2 text-white text-sm">{{ $item->name }}</span>
            </a>
          @endforeach

        </div>

        {{-- {/* berita terbaru */} --}}
        <div class="owl-carousel">
          @foreach ($newest as $item)
          <div>
            <img class="w-full rounded-md " src="{{ asset("storage/$item->image")}}" />
            <a href="#" class="mt-2 text-blue-900 text-xl font-black">{{ $item->title }}</a>
            
            <div class="flex justify-end">
              <span class="text-sm text-yellow-700 font-bold">{{ date('d F Y', strtotime($item->publish))  }}</span>
            </div>
          </div>
          @endforeach
        </div>

          <div class="flex justify-start">
            <p class="text-blue-900 font-bold">Berita Terbaru</p>
          </div>

          <hr class="pb-0.5 bg-blue-900" />

          @foreach ($newest as $item)
            <a href="{{ url("/posts/$item->uuid") }}" class="flex justify-between my-2">
              <div class="w-4/12">
                  <img class="rounded-md" src="{{ asset("storage/$item->image")}}" />
              </div>
              
              <div class="w-8/12 pl-1">
                <p class="text-blue-900 text-base font-bold ">{{ $item->title }}</p>
                
                <div class="flex justify-end">
                  <span class="text-sm text-yellow-700 font-bold"> {{ date('d F Y', strtotime($item->publish))  }}</span>
                </div>
              </div>
            </a>         
          @endforeach
     
          {{-- <div class="my-2 flex justify-end">
            <button class="px-5 py-1 font-bold text-blue-600 text-xs rounded-full border-2 border-blue-600 
            
            hover:bg-blue-600 hover:text-white">Berita Lainnya</button>
          </div> --}}
          <br>
          {{ $newest->links('vendor.pagination.simple-tailwind') }}
          <br>



        </div>
        
      </div>
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="{{ asset("tailwind/owl.carousel.min.js")}}"></script>
  <script>
    $(document).ready(function(){
      var owl = $('.owl-carousel');
      owl.owlCarousel({
          items:1,
          loop:true,
          margin:10,
          autoplay:true,
          autoplayTimeout:5000,
          autoplayHoverPause:true
      });
      $('.play').on('click',function(){
          owl.trigger('play.owl.autoplay',[5000])
      })
      $('.stop').on('click',function(){
          owl.trigger('stop.owl.autoplay')
      })
    });
  </script>
@endsection