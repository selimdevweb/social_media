@extends('layouts.app')
@section('content')
 <div class="flex justify-center mt-5">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <x-post :item="$item" />
    </div>
 </div>
@endsection
