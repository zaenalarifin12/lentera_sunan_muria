@extends('client.app')

@section('content')

    <div class="w-10/12 mx-auto pt-2 ">


        <div class="w-full flex flex-wrap ">

            <div class="bg-yellow-500 rounded mr-3 my-2">
                <a href={{ url('/') }} class="px-4 py-2 text-white text-sm">Home</a>
            </div>
            <div class="bg-blue-900 rounded mr-3 my-2">
                <span class="px-4 py-2 text-white text-sm">{{ $category->name }}</span>
            </div>

        </div>

        @foreach ($news as $item)
            <a href="{{ url("/posts/$item->uuid") }}">
                <div class="flex justify-between my-5 rounded p-2 bg-blue-200">
                    <div class="w-4/12">
                        <img class="rounded-md" src="{{ asset("storage/$item->image") }}" />
                    </div>

                    <div class="w-8/12 pl-1">
                        <p class="text-blue-900 text-base font-bold ">{{ $item->title }}</p>

                        <div class="flex justify-end">
                            <span class="text-sm text-yellow-700 font-bold">17 februari 2010</span>
                        </div>
                    </div>

                </div>
            </a>

        @endforeach


        {{ $news->links('vendor.pagination.simple-tailwind') }}
        <div class="my-8">
            {{-- <button class="px-5 py-1 font-bold text-gray-600 rounded-lg border-2 border-gray-600">Sebelumnya</button>
            <button class="px-5 py-1 font-bold text-gray-600 rounded-lg border-2 border-gray-600">Selanjutnya</button> --}}
        </div>


    </div>



@endsection
