@extends('layout.home')

@section('title',$title)

@section('content')
	


		
       
		@foreach($lunres as $k=>$v)
       	<div  style="background:url({{$v->lunaddr}}) center top repeat-y;">
        	<div  style="height:407px;">	
                
		    </div>
        </div>
      	@endforeach
	
@endsection