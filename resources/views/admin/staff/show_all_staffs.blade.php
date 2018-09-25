@extends('admin/layouts/template')

@section('title', 'Dashboard')
@section('content')
    
          <section class="tables-data">
            <div class="page-header">
              <h1>      <i class="md md-list"></i>      Staffs    </h1>
            </div>
            <div class="card">
              <div>
                <div class="datatables">
                  <table id="" class="table table-full table-full-small table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>FirstName</th>
                        <th>Lastname</th>
                        <th>Nickname</th>
                        <th>Phone</th>
                        <th>E-Mail</th>
                        <th>Shirt</th>
                        <th>Departments</th>
                      </tr>
                    </thead>
                    <tbody>
	                  @foreach($staffs as $staff)
                      <tr>
                        <td>{{ $staff['student_id'] }}</td>
                        <td>{{ $staff['firstname'] }}</td>
                        <td>{{ $staff['lastname'] }}</td>
                        <td><b>{{ $staff['nickname'] }}</b></td>
                        <td>{{ $staff['mobile'] }}</td>
                        <td>{{ $staff['email'] }}</td>
                        <td>{{ $staff['shirt_size'] }}</td>
                        <td>
	                        <ul style="padding-left: 15px; margin-bottom: 0;">
	                        @foreach($jobs as $job)
								@foreach($departments as $department)
									@if($job->student_id == $staff->student_id && $job->dept_id == $department->id) 
										<li>{{ $department->name }}</li>
									@endif
								@endforeach 
							@endforeach
	                        </ul>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>

@endsection