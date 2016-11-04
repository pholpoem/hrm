function delete_row(id){
  //alert(id);
  var _token = $('#id_'+id).val();
  var r = confirm("ต้องการลบรายการนี้?");
  if (r == true) {
    $.ajax({
      url: "personnel/"+id,
      type: "DELETE",
      data:{
        id: id,
        _token: _token
      },
      success: function(data){
        //alert("Delete Success!!");
        $("#per_list"+id).remove();
      }
    });
  } else {
      //txt = "You pressed Cancel!";
  }
}

$(document).ready(function(){

  $('#personnels-list').DataTable();

  $('#department').on('change',function(){
    var depart_id = $(this).val();
    //alert(depart_id);
      $.get('/get-position/' + depart_id, function(data, status){
          //$('#position').empty();
          $.each(data, function(index,positionObj){
            //console.log(data);
            $('#position').append('<option value="'+positionObj.pos_id+'">'+positionObj.posName+'</option>');
          })
      });
  });

  $('#province').on('change',function(){
    var province_id = $(this).val();
    
      $.get('/get-amphur/' + province_id, function(data, status){
          
          $('#amphur').empty();
          $('#amphur').append('<option value="">------ เลือกอำเภอ ------</option>');
          $.each(data, function(index,amphurObj){
            $('#amphur').append('<option value="'+amphurObj.amphur_id+'">'+amphurObj.amphur_name+'</option>');
          })
      });
  });

  $('#amphur').on('change',function(){
    var amphur_id = $(this).val();
    
      $.get('/get-district/' + amphur_id, function(data, status){
          $('#district').empty();
          $.each(data, function(index,districtObj){
            //console.log(data);
            $('#district').append('<option value="'+districtObj.district_id+'">'+districtObj.district_name+'</option>');
          })
      });
  });

  $('#amphur').on('change',function(){
    var amphur_id = $(this).val();
    
      $.get('/get-zipcode/' + amphur_id, function(data, status){
          $('#zipcode').attr("value",data.zipcode);
      });
  });

});