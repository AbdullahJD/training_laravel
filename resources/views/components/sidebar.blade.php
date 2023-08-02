<?php
$items = [
    [
        'menu_label' => 'dashboard',
    ],
    [
        'route' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'bi bi-house-fill',
        'active' => 'dashboard.dashboard',
    ],
    [
//        'type' => 'dropdown',
        'menu_title' => 'platforms',
        'menu_title_icon' => 'lni lni-world',
        'active' => 'dashboard.platform.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.platform.index',
                'label' => 'platforms',
                'active' => 'dashboard.platform.*',
            ],
            [
                'route' => 'dashboard.platform.create',
                'label' => 'create platform',
                'active' => 'dashboard.platform.create',
            ],
        ],
    ],
];

?>




<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/assets/images/main-logo.png') }}" style="width: 50px" class=""
                 alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text fw-bolder">B4P</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <ul class="metismenu" id="menu">
        @foreach ($items as $item)
            @if (isset($item['menu_label']))
                <li class="menu-label">{{ $item['menu_label'] }}</li>
            @elseif(isset($item['menu_title']))
                {{-- @can($item['permission_key_group']) --}}
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="{{ $item['menu_title_icon'] }}"></i>
                        </div>
                        <div class="menu-title">{{ $item['menu_title'] }}</div>
                    </a>
                    <ul>
                        @foreach ($item['menu_title_list'] as $list_item)
                            {{-- @can($list_item['permission_key']) --}}
                            <li class="ps-2">
                                <a href="{{ route($list_item['route']) }}" class="capitalize">
                                    <i
                                        class="{{ $list_item['icon'] ?? 'lni lni-chevron-right' }} {{ Route::is($item['active'] ? 'active' : '') }}"></i>
                                    {{-- {{ __('messages.' . $list_item['label']) }} --}}
                                    {{ $list_item['label'] }}
                                </a>
                            </li>
                            {{-- @endcan --}}
                        @endforeach
                    </ul>
                </li>
                {{-- @endcan --}}
            @else
                {{-- @can($item['permission_key']) --}}
                <li>
                    <a href="{{ route($item['route']) }}">
                        <div class="parent-icon"><i class="{{ $item['icon'] }}"></i>
                        </div>
                        <div class="menu-title">{{ $item['label'] }}</div>
                    </a>
                </li>
                {{-- @endcan --}}
            @endif
        @endforeach
        ​
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
