@extends('layouts.master')

@section('title')
About Iconic
@endsection

@section('content')
<section id="about" class="bg-surface-n1">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'our-sponsors')->first(), 'isbody' => true])
</section>
<section id="about" class="bg-surface-1">
    @include('snippets.hometext', ['item' => $details->where('slug', '=', 'why-sponsor-us')->first(), 'isbody' => true])
</section>
<section id="enroll" class="bg-gold-gradient">
    @include('snippets.enroll')
</section>
@endsection
