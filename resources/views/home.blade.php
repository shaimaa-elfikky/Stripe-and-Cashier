<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>


    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row">

        @if(request('message'))
         <div class="alert alert-{{request('message') === 'Payment successful!' ? 'success' : 'danger'}}">{{request('message') }}</div>
        @endif

    @if(count($courses) > 0)
        @foreach($courses as $course)

            <div class="card col-4">
                <div class="p-6 text-gray-900">

                    <a href="{{route('courses.show',$course)}}">

                    <h5>  {{$course ->name}} </h4>

                    </a>

                    <p> {{$course ->description}} </p>

                    <p> {{$course -> price() }} </p>

                     @if($carts && $carts->courses->contains($course))

                     <a class="btn btn-sm btn-danger" href="{{route('removeFromCart',$course)}}"> Remove From Cart</a>
                     @else
                    <a class="btn btn-sm btn-primary" href="{{route('addToCart',$course)}}"> Add To Cart</a>
                    @endif
                </div>

            </div>


        @endforeach

    @endif

    </div>
    </div>


</x-app-layout>
