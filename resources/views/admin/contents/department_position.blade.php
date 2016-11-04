@extends('admin.layouts.master')
@section('title','แผนก/ตำแหน่ง')

@section('content')
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>รหัสแผนก</th>
            <th>ชื่อแผนก</th>
            <th style="width:15%; text-align: center;">ตำแหน่ง</th>
            <th style="width:15%; text-align: center;">แก้ไข</th>
            <th style="width:15%; text-align: center;">ลบ</th>
        </tr>
    </thead>
    <tbody>
    @foreach($department as $row)
    	<tr id="department{{ $row->id }}">
            <td>{{ $row->depart_id }}</td>
            <td>{{ $row->departName }}</td>
            <td align="center"><a class="btn btn-info" href="{{ url('personnel/'.$row->id) }}"><span class="glyphicon glyphicon-th-list"></span></a></td>
            <td align="center"><a class="btn btn-warning" href="{{ url('personnel/edit/'.$row->id) }}"><span class="glyphicon glyphicon-edit"></span> </a></td>
            <td align="center"><button type="submit" class="btn btn-danger" onclick="delete_row({{ $row->id }})" value="{{ csrf_token() }}" id="id_{{ $row->id }}"><span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection