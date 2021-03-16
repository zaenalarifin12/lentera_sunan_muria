@extends('client.app')

@section('content')

      <div>
      
        <div class="w-10/12 mx-auto pt-2 ">
          
          <div class="w-full flex flex-wrap ">
  
            <div class="bg-yellow-500 rounded mr-3 my-2">
              <a href={{url("/")}} class="px-6 py-3 text-white text-lg font-medium">Home</a>
            </div>
            <div class="bg-blue-900 rounded mr-3 my-2">
              <span class="px-6 py-3 text-white text-lg font-medium">{{ $post->name }}</span>
            </div>
  
          </div>
  
        </div>
      
        <div class="w-full py-2">
            <img class="w-full" src="{{ asset("storage/$post->image") }}" />
        </div>

        <div class="w-10/12 mx-auto">
            <h1 class="text-blue-900 text-center text-xl font-extrabold">{{ $post->title }}</h1>
            
            <div class="my-4 flex justify-end">
                <div class="">
                  <p class="text-red-500 "> {{ $post->name }} &nbsp; </p>
                  <hr class="pb-0.5 bg-red-500" />
                </div>
                <p class="text-yellow-500"> {{ date('d F Y', strtotime($post->publish))  }} <p>
            </div>

            <p class="">
                <span class="font-bold">Lentera PMII : </span>
                <span>{!! $post->description !!}</span>
            </p>
        </div>

        <hr class="pb-0.5 my-8 mx-32 bg-gray-500" />

        <div>
          <div class="flex justify-center">
            <img class="rounded-full h-24 w-24 flex items-center justify-center" src="{{ asset("storage/$post->image_writer") }}" />
          </div>
          
          <p class="my-2 text-center">Penulis</p>
          <p class="my-1 text-center font-bold">{{ $post->name_writer }}</p>
        </div>

      </div>
  
  

@endsection