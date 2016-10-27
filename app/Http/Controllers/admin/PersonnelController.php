<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Personnel;
use App\Province;
use App\Department;
use App\Position;
use App\Amphur;
use App\District;
use App\Zipcode;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_list = Personnel::join('tb_positions','tb_personnels.position_id','=','tb_positions.pos_id')
                             ->select('tb_personnels.*','tb_positions.posName')
                             ->orderBy('firstName', 'asc')
                             ->get();
        $data['per_list'] = $per_list;

        return view('admin.contents.personnel',$data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $per_list = Personnel::select('id')->orderBy('id', 'DESC')->first();
        $data['per_list'] = $per_list;

        $province = Province::all();
        $data['province'] = $province;

        $amphur = Amphur::all();
        $data['amphur'] = $amphur;

        $district = District::all();
        $data['district'] = $district;

        $department = Department::all();
        $data['department'] = $department;

        $data['method'] = "post";
        $data['h3'] = 'เพิ่มข้อมูลพนักงาน';
        $data['url'] = url('personnel/AddPersonnel');
        return view('admin.form.personnel',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:150',
            'lastName' => 'required|unique:tb_personnels|max:150',
            'tel' => 'required|min:10|max:10',
            'email' => 'email|unique:tb_personnels',
            'position_id' => 'required',
            'salary' => 'required|min:4|max:7',
            'address' => 'required|max:255',
            'amphur_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
        ]);

        $obj = new Personnel();
        $obj->per_id = $request['per_id'];
        $obj->firstName = $request['firstName'];
        $obj->lastName = $request['lastName'];
        $obj->tel = $request['tel'];
        $obj->email = $request['email'];
        $obj->position_id = $request['position_id'];
        $obj->salary = $request['salary'];
        $obj->address = $request['address'];
        $obj->amphur_id = $request['amphur_id'];
        $obj->district_id = $request['district_id'];
        $obj->province_id = $request['province_id'];
        $obj->zipcode = $request['zipcode'];
        $obj->save();
        return redirect('/personnel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $per_list = Personnel::join('tb_province','tb_personnels.province_id','=','tb_province.province_id')
                             ->join('tb_amphur','tb_personnels.amphur_id','=','tb_amphur.amphur_id')
                             ->join('tb_district','tb_personnels.district_id','=','tb_district.district_id')
                             ->join('tb_positions','tb_personnels.position_id','=','tb_positions.pos_id')
                             ->join('tb_departments','tb_positions.depart_id','=','tb_departments.depart_id')
                             ->where('tb_personnels.id','=',$id)->first();
        $data['per_list'] = $per_list;

        $province = Province::all();
        $data['province'] = $province;

        $department = Department::all();
        $data['department'] = $department;

        $data['method'] = "put";
        $data['h3'] = 'แก้ไขข้อมูลพนักงาน';
        $data['url'] = url('personnel/edit/'.$id);
        return view('admin.form.personnel',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required|max:150',
            'lastName' => 'required|unique:tb_personnels|max:150',
            'tel' => 'required|min:10|max:10',
            'email' => 'email|unique:tb_personnels',
            'position_id' => 'required',
            'salary' => 'required|min:4|max:7',
            'address' => 'required|max:255',
            'amphur_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required'
        ]);
        
        $obj = Personnel::find($id);
        $obj->per_id = $request['per_id'];
        $obj->firstName = $request['firstName'];
        $obj->lastName = $request['lastName'];
        $obj->tel = $request['tel'];
        $obj->email = $request['email'];
        $obj->position_id = $request['position_id'];
        $obj->salary = $request['salary'];
        $obj->address = $request['address'];
        $obj->amphur_id = $request['amphur_id'];
        $obj->district_id = $request['district_id'];
        $obj->province_id = $request['province_id'];
        $obj->zipcode = $request['zipcode'];
        $obj->save();
        return redirect('/personnel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response;
     */

    public function destroy($id)
    {
        $obj = Personnel::find($id);
        $obj->delete();
    }

}
