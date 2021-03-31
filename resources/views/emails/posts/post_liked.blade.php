@component('mail::message')
# Votre publication a été aimé

{{ $liker->name }} a aimé votr publication

@component('mail::button', ['url' => route('posts.show', $item)])
voir le post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
