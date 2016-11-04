@extends('admin.layouts.master')
@section('title','การจัดการพนักงาน')

@section('content')
<table class="table table-striped table-bordered table-hover" id="personnels-list">
    <thead>
        <tr>
            <th style="width:15%">รหัสพนักงาน</th>
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
            <td>{{ $row->prefix }} {{ $row->firstName }} {{ $row->lastName }}</td>
            <td>{{ $row->posName }}</td>
            <td>{{ $row->tel }}</td>
            <td align="center"><a class="btn btn-info" href="{{ url('personnel/'.$row->id) }}"><span class="glyphicon glyphicon-th-list"></span></a></td>
            <td align="center"><a class="btn btn-warning" href="{{ url('personnel/edit/'.$row->id) }}"><span class="glyphicon glyphicon-edit"></span> </a></td>
            <td align="center"><button type="submit" class="btn btn-danger" onclick="delete_row({{ $row->id }})" value="{{ csrf_token() }}" id="id_{{ $row->id }}"><span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
	        
<div class="row">
	<div class="col-xs-6 col-sm-2">
		<a class="btn btn-success" href="{{ url('personnel/AddPersonnel') }}" role="button">
			<span class="glyphicon glyphicon-plus"></span>เพิ่มรายชื่อ
		</a>
	</div>
</div>

@endsection