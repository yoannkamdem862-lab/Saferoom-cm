@extends('layouts.app')

@section('content')

<div class="container">

<h2>💬 Discussion concernant :</h2>

<h3>{{ $listing->title }}</h3>

<hr>

@foreach($messages as $message)

<div style="background:#f8f9fa;padding:15px;border-radius:10px;margin-bottom:15px;">

<strong>

{{ $message->sender->name }}

</strong>

<br><br>

{{ $message->message }}

<br><br>

<small>

{{ $message->created_at }}

</small>

</div>

@endforeach

<hr>

<form method="POST">

@csrf

<textarea
name="message"
rows="4"
style="width:100%;"
placeholder="Écrire un message..."
required></textarea>

<br><br>

<button class="btn btn-primary">

Envoyer

</button>

</form>

</div>

@endsection