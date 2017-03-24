$(document).ready(function() {
	$("#excel_import_new_company:file").change(function(e) {

			$("#thead_import_company").text("");
			$("tbody").text("");		
			$("#import_company").remove();
			$("#thead_import_company").append('<tr><th>Tên doanh nghiệp</th><th>Trụ sở</th><th>Email</th><th>Người đại diện</th><th>Email người đại diện</th><th>Địa chỉ người đại diện</th><th>Lĩnh vực</><th>Tỉnh thành</th><th class="tuy_chon">Tùy chọn</th></tr>');
			handleFile(e);
		});

	$(document).on("click",".remove_company_excel",function() {
        $(this).parent().parent().remove();
    });

	function handleFile(e) {
			var files = e.target.files;
			var i,f;
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

					for (var i = 9; i < new_workbook.length; i += 8) {
						var html = '<tr>'
							+'<td class="name">'+ new_workbook[i] +'</td>'
							+'<td class="dia_chi">'+ new_workbook[i+1] +'</td>'
							+'<td class="email">'+ new_workbook[i+2] +'</td>'
							+'<td class="ten_dai_dien">'+ new_workbook[i+3] +'</td>'
							+'<td class="email_dai_dien">'+ new_workbook[i+4] +'</td>'
							+'<td class="dia_chi_dai_dien">'+ new_workbook[i+5] +'</td>'
							+'<td class="linh_vuc_khcn">' + new_workbook[i+6] + '</td>'
							+'<td class="tinh_thanh_pho">' + new_workbook[i+7] + '</td>'
							+'<td style="text-align:center; cursor: pointer" class="status_new_company"><div class="remove_company_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
							+'</tr>';
						$("tbody").append(html);
					}
				};
				reader.readAsBinaryString(f);
			}
			$('table').before('<div class="form-group" id="status_all"></div>');
			$('table').after('<div class="form-group pull-right"><button class="btn btn-success" id="import_company" type="button">Lưu</button></div>');
		}

	$(document).on("click","#import_company",function() {
		$('#status_all').text('');
        $('#status_all').append('<h4 class="semi-bold text-info">Đang thêm doanh nghiệp. Vui lòng không tắt trình duyệt !</h4><div class="progress progress-striped active "><div id="processing" data-percentage="0%" class="progress-bar progress-bar-danger"></div></div>');
        $("thead").children('tr').children('.tuy_chon').text('trạng thái');
		var items = new Array();
		$.each($("tbody").children('tr'), function(item,val) {
			items.push($(this));
			var action = $(this).children('.status_new_company');
            action.text('');
            action.append('<img src="/storage/app/public/icons/loading_small.gif">');
		});

		ajax_add_excel_company(items,0);
	});

	function ajax_add_excel_company(item, index) {
		$number_success = 0;
		if(index >= item.length) {
			$('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' doanh nghiệp, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
		}

		var ten_doanh_nghiep = item[index].children(".name").text();
		var dia_chi = item[index].children(".dia_chi").text();
		var email = item[index].children(".email").text();
		var ten_dai_dien = item[index].children(".ten_dai_dien").text();
		var email_dai_dien = item[index].children(".email_dai_dien").text();
		var dia_chi_dai_dien = item[index].children(".dia_chi_dai_dien").text();
		var linh_vuc = item[index].children(".linh_vuc_khcn").text();
		var tinh_thanh_pho = item[index].children(".tinh_thanh_pho").text();
		var action = item[index].children('.status_new_company');
		$.ajax({
			url: 'ajax/them-doanh-nghiep',
			type: 'POST',
			dataType: 'JSON',
			data: {
				_token: $("#excel_import_token").val(),
				name: ten_doanh_nghiep,
				dia_chi: dia_chi,
				email: email,
				ten_dai_dien: ten_dai_dien,
				email_dai_dien: email_dai_dien,
				dia_chi_dai_dien: dia_chi_dai_dien,
				linh_vuc: linh_vuc,
				tinh_thanh_pho: tinh_thanh_pho
			}
		})
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
			$("#processing").css("width",((index+1)*100/(item.length - 11))+"%");
			return ajax_add_excel_company(item,index+1);
		});
	}
});