<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.varieties.index' ? 'active' : '' }}"
                href="{{ route('admin.varieties.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Varieties</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}"
                href="{{ route('admin.attributes.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Attributes</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributevalues.index' ? 'active' : '' }}"
                href="{{ route('admin.attributevalues.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Attributes Values</span>
            </a>
        </li>
    </ul>
</aside>