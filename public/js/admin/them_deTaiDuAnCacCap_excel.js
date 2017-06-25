$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    
    $("#excel_import_new_record:file").change(function(e) {
        $("#thead_import_record").text("");
        $("tbody").text("");
        $("#import_record").remove();
        $("#thead_import_record").append('<tr><th>Tên đề tài</th><th>Mã số - Ký hiệu</th><th>Lĩnh vực</th><th>Chuyên ngành</th><th>Cơ quan</th><th class="th_tuychon">tùy chọn</th></tr>');
        handleFile(e);
    });

    //nhan xoa 1 sinh vien o cot tuy chon
    $(document).on("click",".remove_record_excel",function(){
        $(this).parent().parent().remove();
    });

    //click them sinh vien vao he thong
    $(document).on("click","#import_record",function(){
        $('#status_all').text('');
        $('#status_all').append('<h4 class="semi-bold text-info">Đang thêm chuyên gia. Vui lòng không tắt trình duyệt !</h4><div class="progress progress-striped active "><div id="processing" data-percentage="0%" class="progress-bar progress-bar-danger"></div></div>');
        $("thead").children('tr').children('.th_tuychon').text('trạng thái');
        var items = new Array();
        $.each($("tbody").children('tr'), function(item,val) {
            items.push($(this));
            var action = $(this).children('.status_new_record');
            action.text('');
            action.append('<img src="/storage/app/public/icons/loading_small.gif">');
        });

        ajax_excel_record(items,0);
    });

    function handleFile(e) {
        var files = e.target.files;
        var i,f;
        var num_row = 12;
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
                        +'<td class="ten_de_tai">'+ new_workbook[i] +'</td>'
                        +'<td class="maso_kyhieu">'+ new_workbook[i+1] +'</td>'
                        +'<td class="linh_vuc">'+ new_workbook[i+2] +'</td>'
                        +'<td class="chuyen_nganh_khcn">'+ new_workbook[i+3] +'</td>'
                        +'<td class="nam_bat_dau" style="display: none">'+ new_workbook[i+4] +'</td>'
                        +'<td class="nam_ket_thuc" style="display: none">'+ new_workbook[i+5] +'</td>'
                        +'<td class="co_quan">'+ new_workbook[i+6] +'</td>'
                        +'<td class="chu_nhiem_detai" style="display: none">'+ new_workbook[i+7] +'</td>'
                        +'<td class="diem_noi_bat" style="display: none">'+ new_workbook[i+8] +'</td>'
                        +'<td class="mota_chung" style="display: none">'+ new_workbook[i+9] +'</td>'
                        +'<td class="mota_quytrinh_chuyengiao" style="display: none">'+ new_workbook[i+10] +'</td>'
                        +'<td class="ket_qua_thuc_hien_ung_dung" style="display: none">'+ new_workbook[i+11] +'</td>'
                        +'<td style="text-align:center; cursor: pointer" class="status_new_record"><div class="remove_record_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
                        +'</tr>';
                    $("tbody").append(html);
                }
                /* DO SOMETHING WITH workbook HERE */
            };
            reader.readAsBinaryString(f);
        }
        $('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_record" type="button">Thêm sinh viên vào hệ thống</button></div>');
    }

    function ajax_excel_record(item, index) {
        if(index >= item.length){
            $('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' sinh viên, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
        }

        var ten_de_tai = item[index].children('.ten_de_tai').text();
        var maso_kyhieu = item[index].children('.maso_kyhieu').text();
        var linh_vuc = item[index].children('.linh_vuc').text();
        var chuyen_nganh_khcn = item[index].children('.chuyen_nganh_khcn').text();
        var nam_bat_dau = item[index].children('.nam_bat_dau').text();
        var nam_ket_thuc = item[index].children('.nam_ket_thuc').text();
        var co_quan = item[index].children('.co_quan').text();
        var chu_nhiem_detai = item[index].children('.chu_nhiem_detai').text();
        var diem_noi_bat = item[index].children('.diem_noi_bat').text();
        var mota_chung = item[index].children('.mota_chung').text();
        var mota_quytrinh_chuyengiao = item[index].children('.mota_quytrinh_chuyengiao').text();
        var ket_qua_thuc_hien_ung_dung = item[index].children('.ket_qua_thuc_hien_ung_dung').text();
        var action = item[index].children('.status_new_record');
        $.ajax({
            url: '/quan-tri-vien/quan-ly-du-lieu/de-tai-du-an-cac-cap/tao-moi/ajax',
            type: 'POST',
            dataType: 'JSON',
            data: {
                ten_de_tai: ten_de_tai,
                maso_kyhieu: maso_kyhieu,
                linh_vuc: linh_vuc,
                chuyen_nganh_khcn: chuyen_nganh_khcn,
                nam_bat_dau: nam_bat_dau,
                nam_ket_thuc: nam_ket_thuc,
                co_quan: co_quan,
                chu_nhiem_detai: chu_nhiem_detai,
                diem_noi_bat: diem_noi_bat,
                mota_chung: mota_chung,
                mota_quytrinh_chuyengiao: mota_quytrinh_chuyengiao,
                ket_qua_thuc_hien_ung_dung: ket_qua_thuc_hien_ung_dung,
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
                //item.length - 11 (thay 11 = số cột của database)
                return ajax_excel_record(item,index+1);
            });
    }
});
