
{{-- Updated to reflect the new database structure: nested categories for pages --}}

<?php $type = $entity->getType(); ?>
<a href="{{ $entity->getUrl() }}" class="{{$type}} {{$type === 'page' && $entity->draft ? 'draft' : ''}} {{$classes ?? ''}} entity-list-item" data-entity-type="{{$type}}" data-entity-id="{{$entity->id}}">

  <span class="icon">
    @if($entity->isA('category'))
      @icon('folder')
    @elseif($entity->isA('page'))  
      @icon('page')
    @endif
  </span>

  <span>{{ $entity->name }}</span>

  <div class="content">
      <h4 class="entity-list-item-name break-text">{{ $entity->preview_name ?? $entity->name }}</h4>
      {{ $slot ?? '' }}
  </div>

</a>