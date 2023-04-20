<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div>
    <form method="POST" action="{{ route('insert', [Auth::user()->mobile_no]) }}" enctype="multipart/form-data">
            @csrf

            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            

            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$details->address}}" required autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="image" value="{{ __('Password') }}" />
                <x-input id="image" class="block mt-1 w-full" type="file" value="/storage/details/{{ $details->image }}" name="image" required autocomplete="image" />
                @if ("/storage/details/{{ $details->image }}")
                    <img src="/storage/details/{{ $details->image }}" height="150px" width="150px" style="border: 1px solid blue;">
                @else
                        <p>No image found</p>
                @endif
            </div>

          

         
       

            <div class="flex items-center justify-end mt-4">
               

                <x-button class="ml-4">
                    {{ __('update') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>