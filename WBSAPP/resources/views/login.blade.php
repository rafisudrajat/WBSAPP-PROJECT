@extends('Layouts.entrance')

@section('content')
    <div class="flex flex-col bg-white rounded-tr-3xl rounded-bl-3xl px-10 pt-6 pb-8 ring-4 ring-gray-900" style="width: 576px; flex-basis: 500px;">
        <h1 class="flex justify-center font-bold"> Welcome to WEBSAPP</h1>
        @if(Session::get('fail'))
            <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                {{Session::get('fail')}}
            </div>
        @endif
    
        @if(Session::get('success'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Registration success!</p>
                {{Session::get('success')}}
            </div>
        @endif
        
        <form action="{{route('login.submit')}}" method="POST">
            <!-- Email -->
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="text" placeholder="Username" value="{{old('email')}}">
                <span class="text-red-600 text-xs">@error('email') {{$message}} @enderror</span>
            </div>
            <!-- Password -->
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="Password">
                <span class="text-red-600 text-xs">@error('password') {{$message}} @enderror</span>
            </div>
            <!-- checkbox -->
            <div class="flex justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox">
                    <p>Remember me</p>
                </label>
                <a class="bg-gray-50" href="#">
                    Forgot Password?
                </a>
            </div>
            <!-- submit -->
            <div class="flex flex-col items-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-3xl max-w-but-s justify-self-center">
                    LOGIN
                </button>
                <p class="text-xs py-1">Don't have an account?</p>
                <p class="underline text-xs"> <a href="/register" class="font-bold">Create New </a> or Continue with Social Media</p>
            </div>
        </form>
    </div>
@endsection