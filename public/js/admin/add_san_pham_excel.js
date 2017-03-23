
//import file 
$("#excel_import_new_product:file").change(function(e) {

		$("#thead_import_product").text("");
		$("tbody").text("");		
		$("#import_product").remove();
		$("#thead_import_product").append('<tr><th>Tên sản phẩm</th><th>Lĩnh vực</th><th>Đặc điểm nổi bật</th><th>Mô tả chung</th><th>Khả năng ứng dụng</th><th class="tuy_chon">Tùy chọn</th></tr>');
		handleFile(e);
	});
//icon remove 
 $(document).on("click",".remove_record_excel",function(){
        $(this).parent().parent().remove();
    });
    
        //click them san pham vao he thong load %
    $(document).on("click","#import_product",function(){
        $('#status_all').text('');
        $('#status_all').append('<h4 class="semi-bold text-info">Đang thêm sản phẩm. Vui lòng không tắt trình duyệt !</h4><div class="progress progress-striped active "><div id="processing" data-percentage="0%" class="progress-bar progress-bar-danger"></div></div>');
        $("thead").children('tr').children('.tuy_chon').text('trạng thái');
        var items = new Array();
        $.each($("tbody").children('tr'), function(item,val) {
            items.push($(this));
            var action = $(this).children('.status_new_record');
            action.text('');
            action.append('<img src="/storage/app/public/icons/loading_small.gif">');
        });

        
    });
       
$(document).on("click","#import_product",function() {
	var items = new Array();
	$.each($("tbody").children('tr'), function(item,val) {
		items.push($(this));
	});

	ajax_add_excel_product(items,0);//them 1 san pham vao he thong
}); 

//ham xu ly chinh
    function handleFile(e) {
        var files = e.target.files;
        var i,f;
        var num_row = 6;
        for (i = 0, f = files[i]; i != files.length; ++i) {
            var reader = new FileReader();
            var name = f.name;
            reader.onload = function(e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {type: 'binary'});
                workbook = workbook.Sheets['Sheet1'];

                var rows = new Array();
                var new_workbook = new Array();
                $.each(workbook, function(index, val) {
                    new_workbook.push(val['v']);
                });

                for (var i = num_row + 1; i < new_workbook.length; i += num_row) {
                    var html = '<tr>'
                        +'<td class="ten_san_pham">'+ new_workbook[i] +'</td>'
                        +'<td class="linh_vuc">'+ new_workbook[i+1] +'</td>'
                        +'<td class="dac_diem_noi_bat">'+ new_workbook[i+2] +'</td>'
                        +'<td class="mo_ta_chung">'+ new_workbook[i+3] +'</td>'
                        +'<td class="quy_trinh_chuyen_giao" style="display: none">'+ new_workbook[i+4] +'</td>'
                        +'<td class="kha_nang_ung_dung">'+ new_workbook[i+5] +'</td>'
                        +'<td style="text-align:center; cursor: pointer" class="status_new_record"><div class="remove_record_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
                        +'</tr>';
                    $("tbody").append(html);
                }
                /* DO SOMETHING WITH workbook HERE */
            };
            reader.readAsBinaryString(f);
        }
        $('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_product" type="button">Thêm sản phẩm vào hệ thống</button></div>');
    }
    
    
    
    
//hien thong bao
function ajax_add_excel_product(item, index) {
	$number_success = 0;
	if(index >= item.length) {
         $('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' sản phẩm, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
	}
//chuyen qua sang Newcontroller
	var ten_san_pham = item[index].children(".ten_san_pham").text();
	var linh_vuc = item[index].children(".linh_vuc").text();
	var dac_diem_noi_bat = item[index].children(".dac_diem_noi_bat").text();
	var mo_ta_chung = item[index].children(".mo_ta_chung").text();
	var quy_trinh_chuyen_giao = item[index].children(".quy_trinh_chuyen_giao").text();
	var kha_nang_ung_dung = item[index].children(".kha_nang_ung_dung").text();
     var action = item[index].children('.status_new_record');
	$.ajax({
		url: '/quan-tri-vien/quan-ly-du-lieu/san-pham/tao-moi/ajax',
		type: 'POST',
		dataType: 'JSON',
		data: {
			_token: $("#excel_import_token").val(),
			ten_san_pham: ten_san_pham,
			linh_vuc: linh_vuc,
			dac_diem_noi_bat: dac_diem_noi_bat,
			mo_ta_chung: mo_ta_chung,
			quy_trinh_chuyen_giao: quy_trinh_chuyen_giao,
			kha_nang_ung_dung: kha_nang_ung_dung
		},
//		success: function(response) {
//			$('#status').append('<div id="alert-note" class="alert alert-success"><strong>Success!</strong></div>');
//		},
//		error: function() {
//			$('#status').append('<div id="alert-note" class="alert alert-danger"><strong>Error!</strong></div>');
//		}
	})
    //xu ly thong bao
                .done(function(response) {
                if(response['errors'] == ''){
                    action.text('');
                    action.append('<img width="30px" height="30px" src="/storage/app/public/icons/success.png"><span class="green-color">thành công</span>');
                }
                else {
                    action.text('');
                    var error0 = error1 = error2 = '';
                    if(response['errors'][0]){
                        error0 = response['errors'][0];
                    }
                    if(response['errors'][1]){
                        error1 = response['errors'][1];
                    }
                    if(response['errors'][2]){
                        error2 = response['errors'][2];
                    }
                    action.append('<div class="errors"><p class="text-danger semi-bold" style="text-align:left"><i class="fa fa-warning"></i> Lỗi</p><p class="text-danger" style="text-align:left">'+error0+'</p>'+
                        '<p class="text-danger" style="text-align:left">'+error1+'</p>'+
                        '<p class="text-danger" style="text-align:left">'+error2+'</p></div>');
                }
                console.log(response);
            })
    .fail(function() {
                action.text('');
                action.append('<div class="errors"><p class="text-danger semi-bold" style="text-align:left"><i class="fa fa-warning"></i> Lỗi chưa xác định !</p></div>');
            })
	.always(function() {
        $("#processing").css("width",((index+1)*100/(item.length - 6))+"%");
		return ajax_add_excel_product(item,index+1);
	});

}