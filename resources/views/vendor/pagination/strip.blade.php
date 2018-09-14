@if ($paginator->hasPages())
    <ul class="pagination flex-wrap flex-sm-nowrap" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.first')</span>
            </li>
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ route('strip', [
                    'series' => $first->issue->volume->series->route,
                    'volume' => $first->issue->volume->number,
                    'issue' => $first->issue->number,
                    'strip' => $first->number,
                ]) }}" rel="first">@lang('pagination.first')</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('strip', [
                    'series' => $previous->issue->volume->series->route,
                    'volume' => $previous->issue->volume->number,
                    'issue' => $previous->issue->number,
                    'strip' => $previous->number,
                ]) }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif

        <li class="page-item">
            <a class="page-link" href="{{ route('strip', [
                'series' => $random->issue->volume->series->route,
                'volume' => $random->issue->volume->number,
                'issue' => $random->issue->number,
                'strip' => $random->number,
            ]) }}" rel="random">@lang('pagination.random')</a>
        </li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ route('strip', [
                    'series' => $next->issue->volume->series->route,
                    'volume' => $next->issue->volume->number,
                    'issue' => $next->issue->number,
                    'strip' => $next->number,
                ]) }}" rel="next">@lang('pagination.next')</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('strip', [
                    'series' => $last->issue->volume->series->route,
                    'volume' => $last->issue->volume->number,
                    'issue' => $last->issue->number,
                    'strip' => $last->number,
                ]) }}" rel="last">@lang('pagination.last')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.last')</span>
            </li>
        @endif
    </ul>
@endif
