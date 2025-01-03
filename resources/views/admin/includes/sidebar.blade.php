		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<!-- Sidebar -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			
			<!--вставили из AdminLTE-3.1.0/index.html-->
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.main.index') }}" class="nav-link">
							<i class="nav-icon fas fa-home"></i>
							<i class="nav-icon "></i>
              <p>
                Главная
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<i class="nav-icon "></i>
              <p>
                Пользователи
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
							<i class="nav-icon far fa-clipboard"></i>
              <p>
                Посты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
							<i class="nav-icon fas fa-th-list"></i>
              <p>
                Категории
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
							<i class="nav-icon fas fa-tags"></i>
              <p>
                Тэги
              </p>
            </a>
          </li>
        </ul>

			</div>
			<!-- /.sidebar -->
		</aside>
