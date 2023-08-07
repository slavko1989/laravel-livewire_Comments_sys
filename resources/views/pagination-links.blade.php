<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
     
    </head>
    <body>



@if($paginator->hasPages())

<ul class="pagination">
  @if($paginator->onFirstPage())
  <li class="page-item"><a class="page-link" href="#" style="background-color: brown;">Prev</a></li>
  @else
    <li class="page-item"><a class="page-link" href="#" wire:click="previousPage">Prev</a></li>
  @endif


@foreach($elements as $element)
	
	
	@foreach($element as $page=>$url)
	@if($page==$paginator->currentPage())
  <li class="page-item"><a class="page-link" href="#"   wire:click="gotoPage({{ $page }})" 
  	style="background-color: blue;">{{ $page }}</a></li>
  @else
<li class="page-item"><a class="page-link" href="#" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
  @endif
  @endforeach


  @endforeach

  @if($paginator->hasMorePages())
 	 <li class="page-item"><a class="page-link" href="#" wire:click="nextPage">Next</a></li>
  @else
 	 <li class="page-item"><a class="page-link" href="#" style="background-color: brown;">Next</a></li>
  @endif
</ul>
	

@endif

</body>
</html>