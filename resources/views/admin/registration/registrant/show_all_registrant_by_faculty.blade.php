@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
            <?php $i=0; ?>
            @foreach($registrants as $registrant)
                @if($i%4==0) <div class="row"> @endif
                <div class="col-sm-3">
                    <a class="block block-link-hover2" href="/admin/registrants/grade/faculty/{{ $registrant->id }}">
                        <div class="block-content block-content-full text-center bg-image" style="background-image: url('{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}');">
                            <div style="height: 260px"></div>
                        </div>
                        <div class="block-content block-content-full text-center">
                            <div class="font-w600 push-5" style="color: {{ ($registrant->lock_worldclass) ? 'green' : 'red' }}">{{ $registrant->firstname }} ({{ $registrant->nickname }})</div>
                            <div class="text-muted"><b>{{ $registrant->first }}</b><br><small>{{ $registrant->second }}, {{ $registrant->third }}</small></div>
                            <div class="text-muted"></div>
                        </div>
                    </a>
                </div>
                @if($i++%4==3) </div> @endif
            @endforeach
        </div>
    </div>
</div>

@endsection