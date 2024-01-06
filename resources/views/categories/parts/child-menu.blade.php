
{{-- Updated to reflect the new database structure: nested categories for pages --}}

<div component="category-contents" class="category-child-menu">
    <button type="button" refs="category-contents@toggle" aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
        class="text-muted category-contents-toggle @if ($isOpen) open @endif">

        @icon('caret-right') @icon('folder')

        <span>{{ trans_choice('entities.x_categories', $category->children_count) }}</span>
    </button>

    <ul refs="category-contents@list"
        class="category-contents-list sub-menu inset-list @if ($isOpen) open @endif"
        @if ($isOpen) style="display: block;" @endif role="menu">

        @foreach ($category->children as $child)
            <li>
                @include('entities.list-item-basic', [
                    'entity' => $child,
                ])
            </li>

            @if ($child->isA('category') && $child->pages->count())
                <ul class="category-pages-list">

                    @foreach ($child->pages as $page)
                        <li>

                            @include('entities.list-item-basic', [
                                'entity' => $page,
                            ])

                        </li>
                    @endforeach

                </ul>
            @endif
        @endforeach

    </ul>

</div>

