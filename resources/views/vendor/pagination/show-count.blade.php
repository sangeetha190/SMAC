<li>
    <div class="showing-product-number text-right text-end">
        <span>{!! __('Showing') !!} {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} {!! __('of') !!} {{ $paginator->total() }} {!! __('results') !!}</span>
    </div>
</li>
