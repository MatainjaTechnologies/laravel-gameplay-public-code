@if ($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}" class="btn btn-outline-primary " >Load More</a>
@endif