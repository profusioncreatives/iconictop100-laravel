@extends('layouts.master')

@section('title')
About Iconic
@endsection

@section('content')
<div id="mua" class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">ICONIC MUAs</h2>
                <span class="text-big">ICONIC MUAs</span>
            </div>
        </div>
        @foreach($groups as $group)
        <div class="col-12 mb-5">
            @if($group->show_title)
            <div class="text-subheading text-white my-3" style="opacity: 0.4;">{{ $group->name }}</div>
            @endif
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center g-4">
                @foreach($elements->where('group', '=', $group->slug) as $item)
                <div class="col">
                    <div class="card bg-surface-1">
                        <img src="{{ Voyager::image( $item->image ) }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body text-white">
                            <div class="h5">{{ $item->title }}</div>
                            <div class="body-caption">{!! $item->body !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('customcss')
<style>
    #mua img {
        width: 100%;
    height: 450px;
        object-fit: cover;
    }
</style>
@endsection