<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



@push('style')
	<style type="text/css">
		.my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
	</style>
@endpush

@if ($paginator->hasPages())
    <ul class="pager">
       
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif 