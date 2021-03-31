@props(['item'=>$item])

<div class="mb-4">
    <a href="{{ route('users.posts', $item->user) }}" class="font-bold">{{ $item->user->name }}</a> <span class="text-gray-600 text-sm">{{ $item->created_at->diffForhumans() }}</span>

<p class="mb-2">{{ $item->body }}</p>

{{--  @auth
    @if ($item ->ownedBy(auth()->user()))
    <div>
        <form action="{{ route('posts.destroy', $item) }}" method="post"  class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class=" text-blue-500">Delete</button>
        </form>
    </div>
@endif
@endauth --}}
@can('delete', $item)
<form action="{{ route('posts.destroy', $item) }}" method="post"  class="mr-1">
    @csrf
    @method('DELETE')
    <button type="submit" class=" text-blue-500">Delete</button>
</form>
@endcan




<div class="flex items-center">
        @auth
            @if (!$item->likedBy(auth()->user()))
                <form action="{{ route('likes', $item->id) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class=" text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('unlike', $item) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth

    <span>{{ $item->likes->count() }} {{ Str::plural('like', $item->likes->count()) }}</span>
</div>
</div>
