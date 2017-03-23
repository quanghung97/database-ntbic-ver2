/**
 * Created by Duong Td on 17/11/2016.
 */
//khoa tao moi chuyen gia
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
        $("#thead_import_record").append('<tr><th>Tên</th><th>Năm sinh</th><th>học vị</th><th>Chuyên ngành</th><th>Tỉnh thành</th><th class="th_tuychon">tùy chọn</th></tr>');
        handleFile(e);
    });

    //nhan xoa 1 chuyen gia o hang tuy chon
    $(document).on("click",".remove_record_excel",function(){
        $(this).parent().parent().remove();
    });

    //click them chuyen gia vao he thong
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
        var num_row = 11;
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

                for (var i = num_row +1; i < new_workbook.length; i += num_row) {
                    var html = '<tr>'
                        +'<td class="ho_va_ten">'+ new_workbook[i] +'</td>'
                        +'<td class="nam_sinh">'+ new_workbook[i+1] +'</td>'
                        +'<td class="hoc_vi">'+ new_workbook[i+2] +'</td>'
                        +'<td class="chuyen_nganh">'+ new_workbook[i+3] +'</td>'
                        +'<td class="tinh_thanh">'+ new_workbook[i+4] +'</td>'
                        +'<td class="co_quan" style="display: none">'+ new_workbook[i+5] +'</td>'
                        +'<td class="dia_chi_co_quan" style="display: none">'+ new_workbook[i+6] +'</td>'
                        +'<td class="huong_nghien_cuu" style="display: none">'+ new_workbook[i+7] +'</td>'
                        +'<td class="so_cong_trinh" style="display: none">'+ new_workbook[i+8] +'</td>'
                        +'<td class="ket_qua_nghien_cuu" style="display: none">'+new_workbook[i+9]+'</td>'
                        +'<td class="cong_trinh_nghien_cuu" style="display: none">'+ new_workbook[i+10]+'</td>'
                        +'<td style="text-align:center; cursor: pointer" class="status_new_record"><div class="remove_record_excel"><span class="text-danger semi-bold">xóa</span></div></td>'
                        +'</tr>';
                    $("tbody").append(html);
                }
                /* DO SOMETHING WITH workbook HERE */
            };
            reader.readAsBinaryString(f);
        }
        $('table').before('<div id="status_all" class="form-group"><button class="btn btn-success" id="import_record" type="button">Thêm chuyên gia vào hệ thống</button></div>');
    }

    function ajax_excel_record(item, index) {
        if(index >= item.length){
            $('#status_all').text('');
            $('#status_all').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><h4 class="semi-bold">Hoàn thành !</h4><p class="text-info semi-bold">Đã thêm thành công '
                + ($("tr").length - $(".errors").length - 1) +
                ' sinh viên, Có '+$(".errors").length+' lỗi !</p></div>');
            return;
        }

        var ho_va_ten = item[index].children('.ho_va_ten').text();
        var nam_sinh = item[index].children('.nam_sinh').text();
        var hoc_vi = item[index].children('.hoc_vi').text();
        var chuyen_nganh = item[index].children('.chuyen_nganh').text();
        var tinh_thanh = item[index].children('.tinh_thanh').text();
        var co_quan = item[index].children('.co_quan').text();
        var dia_chi_co_quan = item[index].children('.dia_chi_co_quan').text();
        var huong_nghien_cuu = item[index].children('.huong_nghien_cuu').text();
        var so_cong_trinh = item[index].children('.so_cong_trinh').text();
        var ket_qua_nghien_cuu=item[index].children('.ket_qua_nghien_cuu').text();
        var cong_trinh_nghien_cuu=item[index].children('.cong_trinh_nghien_cuu').text();
        var action = item[index].children('.status_new_record');
        $.ajax({
            url: '/quan-tri-vien/quan-ly-du-lieu/chuyen-gia/tao-moi/ajax',
            type: 'POST',
            dataType: 'JSON',
            data: {
                ho_va_ten: ho_va_ten,
                nam_sinh: nam_sinh,
                hoc_vi: hoc_vi,
                chuyen_nganh: chuyen_nganh,
                tinh_thanh: tinh_thanh,
                co_quan: co_quan,
                dia_chi_co_quan: dia_chi_co_quan,
                huong_nghien_cuu: huong_nghien_cuu,
                so_cong_trinh: so_cong_trinh,
                ket_qua_nghien_cuu: ket_qua_nghien_cuu,
                cong_trinh_nghien_cuu:cong_trinh_nghien_cuu,
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
