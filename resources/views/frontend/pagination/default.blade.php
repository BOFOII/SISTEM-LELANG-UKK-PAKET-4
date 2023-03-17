@if ($paginator->hasPages())
    <section id="ecommerce-pagination">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
                        @if ($paginator->onFirstPage())
                            <li class="page-item prev-item disabled" aria-disabled="true">
                                <a class="page-link" href="#"></a>
                            </li>
                        @else
                            <li class="page-item prev-item">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"></a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true">
                                    <a class="page-link" href="#">{{ $element }}</a>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="page-item next-item">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"></a>
                            </li>
                        @else
                            <li class="page-item next-item disabled" aria-disabled="true">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"></a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endif