@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif


{{-- 
<style>
    .pagination{
  padding: 30px 0;
}

.pagination ul{
  margin: 0;
  padding: 0;
  list-style-type: none;
}

a{
    color: #222;
}

.pagination li{
  display: inline-block;
  padding: 10px 18px;
  color: #222;
}
.p1 li{
  width: 35px;
  height: 35px;
  line-height: 35px;
  padding: 0;
  text-align: center;
}

.p1 li.is-active{
  background-color: #306fab;
  border-radius: 100%;
  color: #fff;
}
</style>

@if ($paginator->hasPages())

<div class="pagination p1">
    <ul>
        @if ($paginator->onFirstPage())
            <li class="page-list disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-menu" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-list">
                <a class="page-menu" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="page-list disabled" aria-disabled="true"><span class="page">{{ $element }}</span></li>
            @endif
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-list is-active" aria-current="page"><span class="page">{{ $page }}</span></li>
                    @else
                        <li class="page-list"><a class="page-menu" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-list">
                <a class="page-menu" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-list disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
</div>
@endif --}}