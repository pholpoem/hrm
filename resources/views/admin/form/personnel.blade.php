@extends('admin.layouts.master')
@section('title',$h3)

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-7 col-sm-offset-2">
	@include('admin.includes.message-block')
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{$h3}} <span class="glyphicon glyphicon-user"></span></h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{$url}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	      			{!! method_field($method) !!}

	      			<div class="form-group">
						<label class="col-sm-3 control-label">แผนก</label>
						<div class="col-sm-6">
							<select class="form-control" id="department">
								<option value="">------ เลือกแผนก ------</option>
							@foreach($department as $row)
								<option value="{{ $row->depart_id }}" @if(isset($per_list)) @if($per_list->depart_id == $row->depart_id) selected="selected" @endif @endif>{{ $row->departName }}</option>
							@endforeach
							</select>
						</div>
					</div>

					<div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">ตำแหน่ง</label>
						<div class="col-sm-6">
							<select class="form-control" name="position_id" id="position">
								<option value="{{ $per_list->pos_id or '' }}">{{ $per_list->posName or '' }}</option>
							</select>
						</div>
					</div>
					@php
					
					if(!isset($per_list->id)){
						$personnel_id = date('Y').'10001';
					}else{
						$personnel_id = date('Y').(10001+$per_list->id);
					}

					@endphp

					<div class="form-group">
						<label class="col-sm-3 control-label">รหัสพนักงาน</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="per_id" name="per_id" placeholder="รหัสพนักงาน" value="{{ $per_list->per_id or $personnel_id }}">
						</div>
					</div>

					<div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">ชื่อ</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="firstName" placeholder="ชื่อ" value="{{ $per_list->firstName or '' }}">
						</div>
					</div>

					<div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">นามสกุล</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="lastName" placeholder="นามสกุล" value="{{ $per_list->lastName or '' }}">
						</div>
					</div>

					<div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">เบอร์โทร</label>
						<div class="col-sm-6">
							<input type="tel" class="form-control" name="tel" placeholder="เบอร์โทร" value="{{ $per_list->tel or '' }}">
						</div>
					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">อีเมล</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" placeholder="อีเมล" value="{{ $per_list->email or '' }}">
						</div>
					</div>

					<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">ที่อยู่</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="address" placeholder="ที่อยู่" rows="2">{{ $per_list->address or '' }}</textarea>
						</div>
					</div>

					<div class="form-group {{ $errors->has('province_id') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">จังหวัด</label>
						<div class="col-sm-6">
							<select name="province_id" class="form-control" id="province">
								<option value="">------ เลือกจังหวัด ------</option>
							@foreach($province as $row)
								<option value="{{ $row->province_id }}" @if(isset($per_list)) @if($per_list->province_id == $row->province_id) selected="selected" @endif @endif>{{ $row->province_name }}</option>
							@endforeach
							</select>
						</div>
					</div>

					<div class="form-group {{ $errors->has('amphur_id') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">อำเภอ / เขต</label>
						<div class="col-sm-6">
							<select name="amphur_id" class="form-control" id="amphur">
								<option value="{{ $per_list->amphur_id or '' }}">{{ $per_list->amphur_name or '' }}</option>
							</select>
						</div>
					</div>

					<div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">ตำบล / แขวง</label>
						<div class="col-sm-6">
							<select name="district_id" class="form-control" id="district">
								<option value="{{ $per_list->district_id or '' }}">{{ $per_list->district_name or '' }}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">รหัสไปรษณีย์</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" value="{{ $per_list->zipcode or ''}}">
						</div>
					</div>

					<hr/>

					<div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
						<label class="col-sm-3 control-label">เงินเดือน</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="salary" placeholder="เงินเดือน" value="{{ $per_list->salary or '' }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">รูปประจำตัว</label>
						<div class="col-sm-6">
							<input type="file" id="image_file" name="image_file">
							<p class="help-block">Select your image.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<button type="submit" class="btn btn-primary btn-lg btn-block">
								บันทึก  <span class="glyphicon glyphicon-save-file"></span>
							</button>
						</div>
						
					</div>

				</form>
			</div>
		</div><!--panel panel-default-->
		<div class="col-xs-4 col-sm-2">
			<a href="/personnel" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-chevron-left"></span>  กลับสู่รายการ
			</a>
		</div>
	</div>
</div><!--row-->

@endsection