
{{-- Updated to reflect the new database structure: nested categories for pages --}}

<nav id="book-tree" class="book-tree mb-xl" aria-label="{{ trans('entities.category_navigation') }}">

    <h5>{{ trans('entities.category_navigation') }}</h5>

    <ul class="sidebar-page-list mt-xs menu entity-list">
        @if (userCan('view', $category))
            <li class="list-item-book book">
                @include('entities.list-item-basic', [
                    'entity' => $category,
                    'classes' => $current->matches($category) ? 'selected' : '',
                ])
            </li>
        @endif

        @foreach ($sidebarTree as $categoryChild)
            <li class="list-item-{{ $categoryChild->getType() }} {{ $categoryChild->getType() }} {{ $categoryChild->isA('page') && $categoryChild->draft ? 'draft' : '' }}">
                @include('entities.list-item-basic', [
                    'entity' => $categoryChild,
                    'classes' => $current->matches($categoryChild) ? 'selected' : '',
                ])

                @if ($categoryChild->children_count > 0)
                    <div class="entity-list-item no-hover">
                        <span role="presentation" class="icon text-category"></span>

                        <div class="content">
                            @include('categories.parts.child-menu', [
                                'category' => $categoryChild,
                                'current' => $current,
                                'isOpen' => $categoryChild->matchesOrContains($current),
                            ])
                        </div>
                    </div>
                @endif

            </li>
        @endforeach
    </ul>
</nav>
