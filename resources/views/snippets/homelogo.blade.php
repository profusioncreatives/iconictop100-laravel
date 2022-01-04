@foreach($pages->where('status', '=', 'ACTIVE')->where('category', '=', 'media') as $data)
<div id="media-sec" class="container-xl py-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="text-effect">
                <h2 class="h2 text-gold-gradient">{{ $data->title }}</h2>
                <span class="text-big">{{ $data->title }}</span>
            </div>
        </div>
        <div class="col-12 my-3">
            {!! $data->body !!}
        </div>
    </div>
</div>
@endforeach

@if($isbodyHide ?? false)
<script>
$(function() {
    $("#media-sec p").hide();
});
</script>
@endif
