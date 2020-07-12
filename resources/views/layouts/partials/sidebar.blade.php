<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image text-center">
          <i class="fas fa-user-circle fa-2x" style="color: #d6d6d6"></i>
        </div>
        <div class="info">
          @if(null !== Auth::user())
            <a href="/home" class="d-block">{{ Auth::user()->name }}</a>
            <p class="text-white">Reputasi: {{ Auth::user()->reputasion_point }}</p>
          @else
            <a href="/home" class="d-block">Guest</a>
            <p class="text-white">Reputasi: -</p>
          @endif
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/pertanyaan" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Questions</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>