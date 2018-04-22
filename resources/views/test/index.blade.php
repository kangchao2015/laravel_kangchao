@extends('layouts.app')



@section("sidebar")

    @if($test == 'kangchao1')
        adfadsfadf
    @else
        ppppppppp
    @endif

@stop


@section("title")
    {{$tes1t or "asdf"}}
@stop

@include("vue_test")



<hr>

<!-- adsfaf -->
@unless($test =! "kangchao")
lllll
@endunless



@for($i = 0; $i <10; $i++)
	<p>{{$i}}</p>
@endfor

@foreach($lives as $l)

	{{$l['subject']}}

@endforeach



@forelse($lives as $l)

{{$l['subject']}}

@empty

	《撒旦发射点发射点发撒地方》
	
@endforelse