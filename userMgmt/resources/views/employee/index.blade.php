@extends('employee.layout')



@section('content')


<br><br>

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Laravel Employee List</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{route('create.employee')}}" data-toggle="modal" data-target="#exampleModal" >Create Employee</a>
			
		</div>
		
	</div>
</div>
		 @if($message = Session::get('success'))
	    <div class="alert alert-success">
	    	<p>{{ $message }}</p>
	    	
	    </div>
	    @endif
	<table class="table table-bordered">
		<tr>
			<th>Avatar</th>
			<th>Name</th>
			<th>Email</th>
			<th>Experience</th>
			<th>Action</th>
		</tr>

        @foreach($employee as $emp)
		<tr>
				<td><img src="{{URL::to($emp->employee_avatar)}}" style="height:70px; width:80px;"></td>
				<td>{{ $emp->employee_name }}</td>
				<td>{{ $emp->employee_email }}</td>
				<td>

					@php

					    $date = Carbon::parse($emp->date_of_leaving);
					    $now = Carbon::parse($emp->date_of_joining);
					    $diff = $now->diff($date);
					    $diffByType = [
					    "years" => $diff->format("%y"),
					    "months" => $diff->format("%m"),
					    "days" => $diff->format("%d"),
                        ];

						$output = [];
						foreach ($diffByType as $type => $diff) {
						    if ($diff != 0) {
						        $output[] = $diff." ".$type;
						    }
						}
						echo implode(", ", $output);

                    @endphp

				</td>
				<!-- https://stackoverflow.com/questions/48768647/laravel-carbon-diff-not-show-0-years -->
				<td>
					<a class="btn btn-danger" href="{{URL::to('delete/employee/'.$emp->id)}}" onclick="return confirm('Are You Sure ?')">Delete</a>
				</td>
			
		</tr>
		@endforeach
		
	</table>


	{!! $employee->links() !!}	
</div>






@endsection