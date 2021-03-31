@extends('layouts.app')
@section('content')
 <div class="flex justify-center mt-5">
    <div class="w-8/12 bg-white p-6 rounded-lg mb-4">

        @auth
        <form action="{{ route('posts') }}" method="post">
            @csrf
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4"
            class="bg-gray-100 border-2 w-full rounded-lg
            @error('body')
                border-red-500
            @enderror"
            placeholder="Let's Post Something !"
            ></textarea>

            @error('body')
                {{ $message }}
            @enderror


            <button type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
        </form>
        @endauth

        @if ($posts->count())
            @foreach ($posts as $item)
                <x-post :item="$item" />
            @endforeach

            {{ $posts->links() }}
        @else
            <p>vous n'avez pas de publications n'hésitez pas en publier</p>
        @endif
    </div>
 </div>
@endsection
