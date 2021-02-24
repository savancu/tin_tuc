<!-- slider -->
@section('css')
<style>
	
	.nivo-controlNav img{
		width: 80px;
		height: 80px;
	}

</style>
@endsection
<div id="slider-wrapper">
    <div id="slider" class="nivoSlider"> 
    	@php
    		$i = 1;
    	@endphp
    	@foreach($slide as $sl)
    		@if($i < count($slide))
    			<a href="#"><img src="upload/slide/{{ $sl->Hinh }}" alt="" rel="upload/slide/{{ $sl->Hinh }}" /></a>
    		@endif
	        @php
	        	$i++;
	        @endphp
        @endforeach
		
        <img style="width: 640px; height: 350px;" src="upload/slide/{{ $slide[count($slide) - 1]->Hinh }}" alt="" rel="upload/slide/{{ $slide[count($slide) - 1]->Hinh }}" /> 

    </div>
    <div class="clear"></div>
</div>
<!-- end slide -->