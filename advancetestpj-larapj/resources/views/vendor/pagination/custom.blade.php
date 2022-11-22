@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
  <!-- <div class="flex justify-between flex-1 sm:hidden">
    @if ($paginator->onFirstPage())
    <span
      class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
      class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
      {!! __('pagination.previous') !!}
    </a>
    @endif

    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
      class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
      {!! __('pagination.next') !!}
    </a>
    @else
    <span
      class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
      {!! __('pagination.next') !!}
    </span>
    @endif
  </div> -->

  <div class="pagenav_wrap hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div class="pagenav_text">
      <p class="text-sm text-gray-700 leading-5">
        {!! __('全') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('件中') !!}
        @if ($paginator->firstItem())
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        {!! __('〜') !!}
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        {!! __('件') !!}
        @else
        {{ $paginator->count() }}
        @endif
      </p>
    </div>

    <div class="pagenav_no">
      <nav>
        <ul class="pagination">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
          <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">＜</span>
          </li>
          @else
          <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
              aria-label="@lang('pagination.previous')">＜</a>
          </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
          <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
          @endif

          {{-- Array Of Links --}}
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

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
          <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
              aria-label="@lang('pagination.next')">＞</a>
          </li>
          @else
          <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">＞</span>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</nav>
@endif