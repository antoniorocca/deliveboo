@component('mail::message')
# Introduction

<h2>Ciao {{$name}}</h2>
<h2>Ciao {{$surname}}</h2>
<h2>Ciao {{$address}}</h2>
<h2>Ciao {{$email}}</h2>
<h2>Ciao {{$amount}}</h2>


@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Vai al sito
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
