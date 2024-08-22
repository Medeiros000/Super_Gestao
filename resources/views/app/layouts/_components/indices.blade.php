<div style="margin: 1rem">
    @php
        $cp = $collection->currentPage();
        $lp = $collection->lastPage();
    @endphp
    @if ($cp > 1)
        <a style="margin: 0.5rem; text-decoration:none;"
            href="{{ $collection->appends($request)->previousPageUrl() ?? '' }}">« Anterior</a>
    @else
        <span style="margin: 0.5rem; text-decoration:none;">« Anterior</span>
    @endif
    @php
        $pages = [1];

        for ($numero = 10; $numero <= $lp; $numero += 10) {
            array_push($pages, $numero);
        }
        $l = $cp;
        for ($n = $l - 4; $n < $l + 5; $n += 1) {
            if ($n > 0 && $n <= $lp) {
                array_push($pages, $n);
            }
        }
        $pages = array_unique($pages);
        sort($pages);
    @endphp

    @php
        $lastPage = null;
    @endphp

    @foreach ($pages as $page)
        @if ($lastPage !== null && $page > $lastPage + 1)
            <span>...</span>
        @endif

        @if ($page == $cp)
            <span style="margin: 0.5rem; text-decoration:none; color: red; font-size: 1.2rem;">{{ $page }}</span>
        @else
            <a href="{{ $collection->appends($request)->url($page) }}"
                style="margin: 0.5rem; text-decoration:none; font-size: 1rem;">{{ $page }}</a>
        @endif

        @php
            $lastPage = $page;
        @endphp
    @endforeach
    @if ($cp == $lp || $lp == 1)
        {{-- <span style="margin: 0.5rem; text-decoration:none;">Última</span> --}}
    @else
        <a href="{{ $collection->appends($request)->url($lp) }}"
            style="margin: 0.5rem; text-decoration:none; font-size: 1rem;">Última</a>
    @endif

    {{--  --}}
    @if ($cp == $lp)
        <span style="margin: 0.5rem; text-decoration:none;">Próxima »</span>
    @else
        <a style="margin: 0.5rem; text-decoration:none;"
            href="{{ $collection->appends($request)->nextPageUrl() ?? '' }}">Próxima »</a>
    @endif
</div>
