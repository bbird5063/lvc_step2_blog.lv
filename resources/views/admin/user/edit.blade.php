@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Редактирование пользователя {{ $user->name }}</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
						<li class="breadcrumb-item active">{{$user->name}}</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-12">

					<form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-25">
						@csrf
						@method('PATCH') {{-- НЕ ЗАБЫВАТЬ ПРИ Route::patch! --}}

						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $user->name }}">
							@error('name')
							<div class="text-danger">
								Это поле необходимо заполнить
								{{--
								или {{ $message }}
								Можно использовать $message(будет 'The name field is required', это можно перенастроить на русский), но это тема др.урока
								--}}
							</div>
							@enderror
						</div>

						<div class="form-group"> <!--ВСТАВИЛИ-->
							<input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
							@error('email')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Выберите роль</label>
							<select class="form-control" name="role">

								@foreach($roles as $id => $role)
								<option
									{{ $id == $user->role ? ' selected' : '' }} value="{{ $id }}">
									{{ $role }}
								</option>
								@endforeach
							</select>
							@error('role')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="form-group">
							<input type="hidden" name="user_id" value="{{ $user->id }}">
						</div>
						
						<input type="submit" class="btn btn-primary mt-3" value="Обновить">
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection