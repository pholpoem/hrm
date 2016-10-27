<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Province;
use App\Department;
use App\Position;
use App\Amphur;
use App\District;
use App\Zipcode;

class AjaxController extends Controller
{
    public function get_position($depart_id)
    {   
        $position = Position::join('tb_departments','tb_positions.depart_id','=','tb_departments.depart_id')
                            ->orderBy('posName', 'asc')
                            ->where('tb_departments.depart_id','=',$depart_id)->get();

        return response()->json($position);
    }

    public function get_amphur($province_id)
    {   
        $amphur = Amphur::join('tb_province','tb_amphur.province_id','=','tb_province.province_id')
                        ->orderBy('amphur_name', 'asc')
                        ->where('tb_amphur.province_id','=',$province_id)->get();

        return response()->json($amphur);
    }

    public function get_district($amphur_id)
    {   
        $district = District::join('tb_amphur','tb_district.amphur_id','=','tb_amphur.amphur_id')
                            ->orderBy('district_name', 'asc')
                            ->where('tb_district.amphur_id','=',$amphur_id)->get();

        return response()->json($district);
    }

    public function get_zipcode($amphur_id)
    {   
        $zipcode = Zipcode::join('tb_amphur','tb_zipcode.amphur_id','=','tb_amphur.amphur_id')                       				->where('tb_zipcode.amphur_id','=',$amphur_id)->first();

        return response()->json($zipcode);
    }
}
