
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    
    $("#excel_import_new_invention:file").change(function(e) {
        $("#thead_import_invention").text("");
        $("tbody").text("");
        $("#import_invention").remove();
        $("#thead_import_invention").append('<tr><th>Tên phát minh</th><th>Số bằng - ký hiệu</th><th>Ngày công bố</th><th>Ngày cấp</th><th>Chủ sở hữu chính</th><th>Tác giả</th><th>Lĩnh vực khoa học công nghệ</th><th>Loại phát minh sáng chế</th><th class="th_tuychon">tùy chọn</th></tr>');
        handleFile(e);
    });

    //nhan xoa 1 sinh vien o cot tuy chon
    $(document).on("click",".remove_record_excel",function(){
        $(this).parent().parent().remove();
    });

    //click them sinh vien vao he thong
    $(document).on("click","#import_invention",function(){
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

        ajax_add_excel_invention(items,0);
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
                        +'<td class="ten">'+ new_workbook[i] +'</td>'
                        +'<td class="sobang_kyhieu">'+ new_workbook[i+1] +'</td>'
                        +'<td class="ngay_cong_bo">'+ new_workbook[i+2] +'</td>'
                        +'<td class="ngay_cap">'+ new_workbook[i+3] +'</td>'
                        +'<td class="chu_so_huu_chinh">'+ new_workbook[i+4] +'</td>'
                        +'<td class="tac_gia">'+ new_workbook[i+5] +'</td>'
                        +'<td class="diem_noi_bat" style="display: none">'+ new_workbook[i+6] +'</td>'
                        +'<td class="mota_sangche_phatminh_giaiphap" style="display: none">'+ new_workbook[i+7] +'</td>'
                        +'<td class="noidung_cothe_chuyengiao" style="display: none">'+ new_workbook[i+8] +'</td>'
                        +'<td class="thitruong_ungdung" style="display: none">'+ new_workbook[i+9] +'</td>'
                        +'<td class="linh_vuc_khcn" >'+ new_workbook[i+10] +'</td>'
                        +'<td class="loai_phat_minh_sang_che" >'+ new_workbook[i+11] +'</td>'
                        +'<td style="text-align:center; cursor: pointer" class="status_new_record"><div class="remove_record_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
                        +'</tr>';
                    $("tbody").append(html);
                }
                /* DO SOMETHING WITH workbook HERE */
            };
            reader.readAsBinaryString(f);
        }
        $('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_invention" type="button">Lưu</button></div>');
    }

    function ajax_add_excel_invention(item, index) {
        if(index >= item.length){
            $('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' phát minh, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
        }

        var ten = item[index].children('.ten').text();
        var sobang_kyhieu = item[index].children('.sobang_kyhieu').text();
        var ngay_cong_bo = item[index].children('.ngay_cong_bo').text();
        var ngay_cap = item[index].children('.ngay_cap').text();
        var chu_so_huu_chinh = item[index].children('.chu_so_huu_chinh').text();
        var tac_gia = item[index].children('.tac_gia').text();
        var diem_noi_bat = item[index].children('.diem_noi_bat').text();
        var mota_sangche_phatminh_giaiphap = item[index].children('.mota_sangche_phatminh_giaiphap').text();
        var noidung_cothe_chuyengiao = item[index].children('.noidung_cothe_chuyengiao').text();
        var thitruong_ungdung = item[index].children('.thitruong_ungdung').text();
        var linh_vuc_khcn = item[index].children('.linh_vuc_khcn').text();   
        var loai_phat_minh_sang_che = item[index].children('.loai_phat_minh_sang_che').text();  
        var action = item[index].children('.status_new_record');
        $.ajax({
            url: '/quan-tri-vien/quan-ly-du-lieu/phat-minh/tao-moi/ajax',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: $("#excel_import_token").val(),
                ten: ten,
                sobang_kyhieu: sobang_kyhieu,
                ngay_cong_bo: ngay_cong_bo,
                ngay_cap: ngay_cap,
                chu_so_huu_chinh: chu_so_huu_chinh,
                tac_gia: tac_gia,
                diem_noi_bat: diem_noi_bat,
                mota_sangche_phatminh_giaiphap: mota_sangche_phatminh_giaiphap,
                noidung_cothe_chuyengiao: noidung_cothe_chuyengiao,
                thitruong_ungdung: thitruong_ungdung,
                linh_vuc_khcn: linh_vuc_khcn,
                loai_phat_minh_sang_che: loai_phat_minh_sang_che
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
                $("#processing").css("width",((index+1)*100/(item.length - 14))+"%");
                //item.length - 14 (thay 14 = số cột của database)
                return ajax_add_excel_invention(item,index+1);
            });
    }
});
