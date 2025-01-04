<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if($carts && count($carts->courses) > 0)
                    @foreach($carts->courses as $course)

                    <div class="bg-light mb-3 p-3 d-flex justify-content-between align-items-center">
                    <h6>{{$course->name}}

                     <small class="text-primary">({{$course->price()}})</small>

                    </h6>
                 
                    <a href="{{route('removeFromCart',$course)}}" class="btn btn-sm btn-danger">Remove</a>
                    </div>
                 
                    @endforeach

                    <div class="bg-light mb-3 p-3 d-flex justify-content-between align-items-center">
                    <h6>Total

                     <small class="text-primary">({{$carts->total()}})</small>

                    </h6>
                 
                    <a href="{{route('checkout')}}" class="btn btn-sm btn-success">Checkout</a>
                    </div>
                 
                @else
                  <div class="alert alert-info"> Your Cart Is Empty</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
