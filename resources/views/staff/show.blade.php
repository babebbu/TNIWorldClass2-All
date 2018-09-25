<script >
function changetest (){
	var http ;
	if(window.XMLHttpRequest) 
	{
		http = new XMLHttpRequest();
	}
	else 
	{
		http = new ActiveXObject("Microsoft.XMLHTTP");
	}

}	

</script>


<table border = "1px" >
 	<tr>
 	<th> รหัสนักศึกษา</th>
 	<th> ชื่อ</th>
 	<th> นามสกุล </th>
 	<th> ชื่อเล่น</th>
 	<th> อีเมลล์</th>
 	<th> เบอร์โทรศัพท์</th>
 	<th> ไซต์เสื้อ</th>
 	<th> หน้าที่</th>
 	</tr>


@foreach($staff as $staffs)
	<tr>

		<th>{{ $staffs->student_id}} </th>
		<th>{{ $staffs->firstname}} </th>
		<th>{{ $staffs->lastname}} </th>
		<th>{{ $staffs->nickname}} </th>
		<th>{{ $staffs->email}}</th>
		<th>{{ $staffs->mobile}}</th>
		<th>{{ $staffs->shirt_size}}</th>
		<th>
			@foreach($staffjob as $staffjobs)
			 @foreach($departments as $department)
			<?php if($staffjobs->student_id == $staffs->student_id && $staffjobs->dept_id == $department->id)
			 echo $department->name ;
			 ?>
			@endforeach
		@endforeach
		</th>
		
	</tr>
@endforeach
</table>