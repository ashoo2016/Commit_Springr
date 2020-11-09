@extends('employee.layout')


@section('content')
<br><br><br>

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add New Employee</h2>
		</div>

		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('employee.index')}}">Back</a>
		</div>
	</div>
</div>

<form action="{{ route('employee.store')}}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-12">
			<div class="form-group">
				<strong>Email:</strong>
				<input type="email" name="employee_email" class="form-control @error('employee_email') is-invalid @enderror" name="employee_email" value="{{ old('employee_email') }}" placeholder="Enter Employee Email" required autocomplete="employee_email" autofocus>
				 @error('employee_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-12">
			<div class="form-group">
				<strong>Full Name</strong>
				<input type="text" name="employee_name" class="form-control @error('employee_name') is-invalid @enderror" value="{{ old('employee_name') }}" placeholder="Enter Employee Full Name" required autocomplete="employee_name" autofocus>
				 @error('employee_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Date of Joining</strong>
				<input type="date" name="date_of_joining" class="form-control @error('date_of_joining') is-invalid @enderror" name="date_of_joining" value="{{ old('date_of_joining') }}" required autocomplete="date_of_joining" autofocus>
				 @error('date_of_joining')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Date of Leaving</strong>
				<input type="date" name="date_of_leaving" class="form-control" placeholder="Date of Leaving">
			</div>
		</div>


		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Avatar:</strong>
				<input type="file" name="employee_avatar" class="form-control @error('email') is-invalid @enderror" name="employee_avatar" value="{{ old('employee_avatar') }}" required autocomplete="employee_avatar" autofocus>
				 @error('date_of_joining')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Is Working</strong>
				<input type="checkbox" name="is_working" value="1">
			</div>
		</div>


		<div class="col-xs-12 col-sm-12 col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		
	</div>
	
</form>




@endsection