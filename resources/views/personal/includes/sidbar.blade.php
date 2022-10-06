<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item">
                    <a href="{{ route('personal.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-mountain-city"></i>
                        <p>Main</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('personal.liked.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-heart"></i>
                        <p>Liked posts</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('personal.comment.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-solid fa-comment"></i>
                        <p>Comments</p>
                    </a>
                </li>


            </ul>
        </nav>

    </div>
</aside>
