
{{-- Updated to reflect the new database structure: nested categories for pages --}}

@extends('layouts.tri')

@section('container-attrs')
    component="entity-search"
    option:entity-search:entity-id="{{ $chapter->id }}"
    option:entity-search:entity-type="chapter"
@stop

@push('social-meta')
    <meta property="og:description" content="{{ Str::limit($category->description, 100, '...') }}">
@endpush

@include('entities.body-tag-classes', ['entity' => $category])

@section('body')

    <div class="mb-m print-hidden">
        @include('entities.breadcrumbs', [
            'crumbs' => [$category->parent ?? null, $category],
        ])
    </div>

    <main class="content-wrap card">
        <h1 class="break-text">{{ $category->name }}</h1>
        <div refs="entity-search@contentView" class="chapter-content">
            <div class="text-muted break-text">{!! $category->descriptionHtml() !!}</div>
            @if (count($pages) > 0)
                <div class="entity-list book-contents">
                    @foreach ($pages as $page)
                        @include('pages.parts.list-item', ['page' => $page])
                    @endforeach
                </div>
            @else
                <div class="mt-xl">
                    <hr>
                    <p class="text-muted italic mb-m mt-xl">{{ trans('entities.chapters_empty') }}</p>

                    <div class="icon-list block inline">
                        @if (userCan('page-create', $category))
                            <a href="{{ $category->getUrl('/create-page') }}" class="icon-list-item text-page">
                                <span class="icon">@icon('page')</span>
                                <span>{{ trans('entities.books_empty_create_page') }}</span>
                            </a>
                        @endif
                        {{--                         @if (userCan('book-update', $book))
                            <a href="{{ $book->getUrl('/sort') }}" class="icon-list-item text-book">
                                <span class="icon">@icon('book')</span>
                                <span>{{ trans('entities.books_empty_sort_current_book') }}</span>
                            </a>
                        @endif --}}
                        @if (userCan('category-update', $category))
                            <a href="{{ $category->getUrl('/edit') }}" data-shortcut="edit" class="icon-list-item">
                                <span>@icon('edit')</span>
                                <span>{{ trans('common.edit') }}</span>
                            </a>
                        @endif
                    </div>

                </div>
            @endif
        </div>

        @include('entities.search-results')
    </main>

    @include('entities.sibling-navigation', ['next' => $next, 'previous' => $previous])

@stop

@section('right')

    <div class="mb-xl">
        <h5>{{ trans('common.details') }}</h5>
        <div class="blended-links">
            @include('entities.meta', ['entity' => $category, 'watchOptions' => $watchOptions])

            @if ($category->hasPermissions())
                <div class="active-restriction">
                    @if (userCan('restrictions-manage', $category))
                        <a href="{{ $category->getUrl('/permissions') }}" class="entity-meta-item">
                            @icon('lock')
                            <div>{{ trans('entities.chapters_permissions_active') }}</div>
                        </a>
                    @else
                        <div class="entity-meta-item">
                            @icon('lock')
                            <div>{{ trans('entities.chapters_permissions_active') }}</div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div class="actions mb-xl">
        <h5>{{ trans('common.actions') }}</h5>
        <div class="icon-list text-link">

            @if (userCan('page-create', $category))
                <a href="{{ $category->getUrl('/create-page') }}" data-shortcut="new" class="icon-list-item">
                    <span>@icon('add')</span>
                    <span>{{ trans('entities.pages_new') }}</span>
                </a>
            @endif

            <hr class="primary-background" />

            @if (userCan('category-update', $category))
                <a href="{{ $category->getUrl('/edit') }}" data-shortcut="edit" class="icon-list-item">
                    <span>@icon('edit')</span>
                    <span>{{ trans('common.edit') }}</span>
                </a>
            @endif
            @if (userCan('category-update', $category) && userCan('category-delete', $category))
                <a href="{{ $category->getUrl('/move') }}" data-shortcut="move" class="icon-list-item">
                    <span>@icon('folder')</span>
                    <span>{{ trans('common.move') }}</span>
                </a>
            @endif
            @if (userCan('restrictions-manage', $category))
                <a href="{{ $category->getUrl('/permissions') }}" data-shortcut="permissions" class="icon-list-item">
                    <span>@icon('lock')</span>
                    <span>{{ trans('entities.permissions') }}</span>
                </a>
            @endif
            @if (userCan('category-delete', $category))
                <a href="{{ $category->getUrl('/delete') }}" data-shortcut="delete" class="icon-list-item">
                    <span>@icon('delete')</span>
                    <span>{{ trans('common.delete') }}</span>
                </a>
            @endif


            <hr class="primary-background" />

            @if ($watchOptions->canWatch() && !$watchOptions->isWatching())
                @include('entities.watch-action', ['entity' => $category])
            @endif
            @if (!user()->isGuest())
                @include('entities.favourite-action', ['entity' => $category])
            @endif
            @if (userCan('content-export'))
                @include('entities.export-menu', ['entity' => $category])
            @endif
        </div>
    </div>
@stop

@section('left')

    @include('entities.search-form', ['label' => trans('entities.chapters_search_this')])

    @if ($category->tags->count() > 0)
        <div class="mb-xl">
            @include('entities.tag-list', ['entity' => $category])
        </div>
    @endif

    @include('entities.category-tree', ['category' => $category, 'sidebarTree' => $sidebarTree])
@stop
