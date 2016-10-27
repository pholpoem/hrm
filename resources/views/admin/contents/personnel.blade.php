@extends('admin.layouts.master')
@section('title','การจัดการพนักงาน')

@section('content')
<div class="row">
	<div class="col-xs-10 col-sm-12">
		<div class="table-responsive">

	        <table class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>รหัสพนักงาน</th>
	                    <th>ชื่อ - นามสกุล</th>
	                    <th>ตำแหน่ง</th>
	                    <th>เบอร์โทร</th>
	                    <th>ข้อมูล</th>
	                    <th>แก้ไข</th>
	                    <th>ลบ</th>
	                </tr>
	            </thead>
	            <tbody>
	            @foreach($per_list as $row)
	            	<tr id="per_list{{ $row->id }}">
	                    <td>{{ $row->per_id }}</td>
	                    <td>{{ $row->firstName }} {{ $row->lastName }}</td>
	                    <td>{{ $row->posName }}</td>
	                    <td>{{ $row->tel }}</td>
	                    <td><a class="btn btn-info" href="{{ url('personnel/'.$row->id) }}">ข้อมูล</a></td>
	                    <td><a class="btn btn-warning" href="{{ url('personnel/edit/'.$row->id) }}">แก้ไข</a></td>
	                    <td><button type="submit" class="btn btn-danger" onclick="delete_row({{ $row->id }})" value="{{ csrf_token() }}" id="id_{{ $row->id }}">ลบ</button></td>
	                </tr>
	            @endforeach
	            </tbody>
	        </table>

	    </div><!--table-responsive-->
	</div><!--col-xs-10 col-sm-12-->

</div><!--row-->

<div class="row">
	<div class="col-xs-6 col-sm-2">
		<a class="btn btn-success" href="{{ url('personnel/AddPersonnel') }}" role="button">
			<span class="glyphicon glyphicon-plus"></span>เพิ่มรายชื่อ
		</a>
	</div>
	</div>
</div>

@endsection