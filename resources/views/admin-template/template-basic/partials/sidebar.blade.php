@php
    $active ?? 'dashboard';
    $user = auth()->guard('customer')->user();
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img
                src="{{ asset('vendor/fog-admin/assets/images/logo.png') }}"
                alt="logo" style="width: auto"></a>
        <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
                src="{{ asset('vendor/fog-admin/assets/images/logo.png') }}"
                alt="logo" style="width: auto"/></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset('vendor/fog-admin/assets/images/default-avatar.png')}}"
                             alt="face15">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ $user->name }}</h5>
                        <span>Hi, {{ $user->name }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                     aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Main menu</span>
        </li>
        <li class="nav-item menu-items nav-dashboard mb-2" data-bs-toggle="dashboard">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items nav-customers mb-2" data-bs-toggle="customers">
            <a class="nav-link" href="{{ route('admin.customers.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-account-group"></i>
                </span>
                <span class="menu-title">Customers</span>
            </a>
        </li>
        <li class="nav-item menu-items nav-settings mb-2" data-bs-toggle="settings">
            <a class="nav-link" href="{{ route('admin.settings.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        <li class="nav-item menu-items nav-api mb-2" data-bs-toggle="api">
            <a class="nav-link" href="{{ route('admin.api.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-vector-line"></i>
                </span>
                <span class="menu-title">API </span>
            </a>
        </li>
        <li class="nav-item menu-items mb-2">
            <a class="nav-link" href="{{ route('admin.auth.logout') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-logout"></i>
                </span>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
