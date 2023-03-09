<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img src="{{ asset('img/logo.jpg') }}" alt="Malaika Festival" class="sidebar-logo">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/pages') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Pages</span>
                </a>
            </li>

            <li class="nav-item nav-category">Event Categories</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/event/category/add') }}" class="nav-link">
                    <i class="link-icon" data-feather="plus"></i>
                    <span class="link-title">Add Category</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/event/categories') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">All Categories</span>
                </a>
            </li>

            <li class="nav-item nav-category">Events</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/event/create') }}" class="nav-link">
                    <i class="link-icon" data-feather="plus"></i>
                    <span class="link-title">Add Event</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/events') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">All Events</span>
                </a>
            </li>

            <li class="nav-item nav-category">Blogs</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/blog/create') }}" class="nav-link">
                    <i class="link-icon" data-feather="plus"></i>
                    <span class="link-title">Add Blog Post</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/blogs') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">All Blogs</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/blog/category/add') }}" class="nav-link">
                    <i class="link-icon" data-feather="plus"></i>
                    <span class="link-title">Add Blog Category</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin/blog/categories') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Blog Categories</span>
                </a>
            </li>



            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item {{ active_class(['email/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}"
                    aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['email/*']) }}" id="email">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}">Read</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}">Compose</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['apps/chat']) }}">
                <a href="{{ url('/apps/chat') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/apps/calendar') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>

            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['error/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#error" role="button"
                    aria-expanded="{{ is_active_route(['error/*']) }}" aria-controls="error">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['error/*']) }}" id="error">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/error/404') }}" class="nav-link {{ active_class(['error/404']) }}">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/error/500') }}" class="nav-link {{ active_class(['error/500']) }}">500</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light"
                        checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Version:</h6>
            <a class="theme-item active" href="https://www.nobleui.com/laravel/template/light/">
                <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
            </a>
            <h6 class="text-muted mb-2">Dark Version:</h6>
            <a class="theme-item" href="https://www.nobleui.com/laravel/template/dark">
                <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
            </a>
        </div>
    </div>
</nav>
