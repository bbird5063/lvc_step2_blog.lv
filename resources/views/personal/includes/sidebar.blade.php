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
						<a href="{{ route('personal.liked.index') }}" class="nav-link">
							<i class="nav-icon far fa-heart"></i>
							<i class="nav-icon "></i>
							<p>
								Понравившиеся посты
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('personal.comment.index') }}" class="nav-link">
							<i class="nav-icon far fa-comment"></i>
							<p>
								Комментарии
							</p>
						</a>
					</li>
				</ul>

			</div>
			<!-- /.sidebar -->
		</aside>