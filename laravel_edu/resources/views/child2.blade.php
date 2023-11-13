{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')


@section('main')


@for($i = 2; $i < 9; $i++)
		<p>{{$i}}단<p>
	@for($s = 1; $s <= 9; $s++)
		{{-- <span>{{$i}} x {{$s}} = {{$i*$s}}</span> --}}
		<span>{{$i. ' x ' .$s. ' = ' .($i*$s)}}</span>                                  
		<br>
	@endfor

@endfor

<hr>
<h3>foreach문</h3>
@foreach($data as $key => $val)
{{-- 배열의 데이터 숫자 >> 현재 아이템의 인덱스 --}}
<p>{{$loop->count.'  >>  '.$loop->iteration}}</p>
	<span>{{$key. ' : '.$val}}</span>
@endforeach

<hr>

<h3>forelse</h3>
@forelse($data2 as $key => $val)
	<span>{{$key. ' : '.$val}}</span>
	<br>
@empty
	<span>빈배열입니다</span>
@endforelse
@endsection