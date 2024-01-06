
{{-- Updated to reflect the new database structure: nested categories for pages --}}

<nav class="breadcrumbs text-center" aria-label="{{ trans('common.breadcrumb') }}">

    <?php $breadcrumbCount = 0; ?>
  
    @if (count($crumbs) > 0 && ($crumbs[0] ?? null) instanceof \App\Entities\Models\Category)
  
      <a href="{{ url('/categories') }}" class="text-category icon-list-item outline-hover">
        <span>@icon('books')</span>  
        <span>{{ trans('entities.categories') }}</span>
      </a>
      <?php $breadcrumbCount++; ?>
  
    @endif
  
    @foreach($crumbs as $key => $crumb)
  
      @if($crumb instanceof \App\Entities\Models\Category || $crumb instanceof \App\Entities\Models\Page)
  
        @if($breadcrumbCount > 0)
          <div class="separator">@icon('chevron-right')</div>  
        @endif
  
        @include('entities.breadcrumb-listing', ['entity' => $crumb])
  
        <a href="{{ $crumb->getUrl() }}" class="icon-list-item outline-hover">
          <span>@icon($crumb->getType())</span>
          <span>{{ $crumb->name }}</span>
        </a>
  
        <?php $breadcrumbCount++; ?>
  
      @endif
  
    @endforeach
  
  </nav>