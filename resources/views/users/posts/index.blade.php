@extends('layouts.app')
@section('content')
 <div class="flex justify-center mt-5">
    <div class="w-8/12">
        <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedlikes->count()}} likes</p>
        </div>
        <div class="bg-white p-6 rounded-lg">
            @if ($posts->count())
                @foreach ($posts as $item)
                    <x-post :item="$item" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>{{ $user->name }} n'a encore publié</p>
            @endif
    </div>
</div>
 </div>
@endsection
