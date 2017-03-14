<form method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" name="text_search">
<span class="sel"><select name="tim_theo" id="id_field" onchange=""  class="chosen-select"><option value="0" selected="selected">Tìm theo</option><option value="1" >Tên đề tài, đề án</option><option value="2" >CNĐT, Tác giả</option><option value="3" >Mã số, ký hiệu</option><option value="4" >Cơ quan chủ trì</option><option value="5" >Cơ quan tài trợ</option><option value="6" >Tóm tắt nội dung</option></select></span>

        <select name='linh_vuc_khcn' id="acatid" class="chosen-select" onchange="get_disnt('0')" >

            <option value="0">Lĩnh vực KH&amp;CN</option>

            

            <option value="1" >Khoa học tự nhiên</option>

            

            <option value="2" >Khoa học kỹ thuật và công nghệ</option>

            

            <option value="3" >Khoa học y, dược</option>

            

            <option value="4" >Khoa học nông nghiệp</option>

            

            <option value="5" >Khoa học xã hội</option>

            

            <option value="6" >Khoa học nhân văn</option>

            

        </select>

        <span id="disnt"></span>

        <select id="afieldid" class="chosen-select" name="tinh_thanh_pho">

            <option value="0">Tỉnh, thành phố</option>

            

            <option value="An Giang" >An Giang</option>

            

            <option value="Bà Rịa - Vũng Tàu" >Bà Rịa - Vũng Tàu</option>

            

            <option value="Bắc Giang" >Bắc Giang</option>

            

            <option value="Bắc Kạn" >Bắc Kạn</option>

            

            <option value="Bạc Liêu" >Bạc Liêu</option>

            

            <option value="Bắc Ninh" >Bắc Ninh</option>

            

            <option value="Bến Tre" >Bến Tre</option>

            

            <option value="Bình Dương" >Bình Dương</option>

            

            <option value="Bình Phước" >Bình Phước</option>

            

            <option value="Bình Thuận" >Bình Thuận</option>

            

            <option value="Bình Định" >Bình Định</option>

            

            <option value="Cà Mau" >Cà Mau</option>

            

            <option value="Cần Thơ" >Cần Thơ</option>

            

            <option value="Cao Bằng" >Cao Bằng</option>

            

            <option value="Cửu Long" >Cửu Long</option>

            

            <option value="Gia Lai" >Gia Lai</option>

            

            <option value="Hà Giang" >Hà Giang</option>

            

            <option value="Hà Nam" >Hà Nam</option>

            

            <option value="Hà Nội" >Hà Nội</option>

            

            <option value="Hà Tĩnh" >Hà Tĩnh</option>

            

            <option value="Hải Dương" >Hải Dương</option>

            

            <option value="Hải Phòng" >Hải Phòng</option>

            

            <option value="Hậu Giang" >Hậu Giang</option>

            

            <option value="Hòa Bình" >Hòa Bình</option>

            

            <option value="Hưng Yên" >Hưng Yên</option>

            

            <option value="Khánh Hòa" >Khánh Hòa</option>

            

            <option value="Kiên Giang" >Kiên Giang</option>

            

            <option value="Kon Tum" >Kon Tum</option>

            

            <option value="Lai Châu" >Lai Châu</option>

            

            <option value="Lâm Đồng" >Lâm Đồng</option>

            

            <option value="Lạng Sơn" >Lạng Sơn</option>

            

            <option value="Lào Cai" >Lào Cai</option>

            

            <option value="Long An" >Long An</option>

            

            <option value="Nam Định" >Nam Định</option>

            

            <option value="Nghệ An" >Nghệ An</option>

            

            <option value="Ninh Bình" >Ninh Bình</option>

            

            <option value="Ninh Thuận" >Ninh Thuận</option>

            

            <option value="Phú Thọ" >Phú Thọ</option>

            

            <option value="Phú Yên" >Phú Yên</option>

            

            <option value="Quảng Bình" >Quảng Bình</option>

            

            <option value="Quảng Nam" >Quảng Nam</option>

            

            <option value="Quảng Ngãi" >Quảng Ngãi</option>

            

            <option value="Quảng Ninh" >Quảng Ninh</option>

            

            <option value="Quảng Trị" >Quảng Trị</option>

            

            <option value="Sóc Trăng" >Sóc Trăng</option>

            

            <option value="Sơn La" >Sơn La</option>

            

            <option value="Tây Ninh" >Tây Ninh</option>

            

            <option value="Thái Bình" >Thái Bình</option>

            

            <option value="Thái Nguyên" >Thái Nguyên</option>

            

            <option value="Thanh Hóa" >Thanh Hóa</option>

            

            <option value="Thừa Thiên Huế" >Thừa Thiên Huế</option>

            

            <option value="Tiền Giang" >Tiền Giang</option>

            

            <option value="TP. HCM" >TP. HCM</option>

            

            <option value="TP. Nha trang" >TP. Nha trang</option>

            

            <option value="Trà Vinh" >Trà Vinh</option>

            

            <option value="Tuyên Quang" >Tuyên Quang</option>

            

            <option value="Vĩnh Long" >Vĩnh Long</option>

            

            <option value="Vĩnh Phúc" >Vĩnh Phúc</option>

            

            <option value="Yên Bái" >Yên Bái</option>

            

            <option value="Đà Nẵng" >Đà Nẵng</option>

            

            <option value="Đắk Lắc" >Đắk Lắc</option>

            

            <option value="Đắk Nông" >Đắk Nông</option>

            

            <option value="Điện Biên" >Điện Biên</option>

            

            <option value="Đồng Nai" >Đồng Nai</option>

            

            <option value="Đồng Tháp" >Đồng Tháp</option>

            

        </select>

        <select name="chuc_danh" id="id_type" onchange=""  class="chosen-select"><option value="" >Chức danh</option><option value="GS" >GS</option><option value="GS.TSKH" selected="selected">GS.TSKH</option><option value="GS.TS" >GS.TS</option><option value="PGS" >PGS</option><option value="PGS.TSKH" >PGS.TSKH</option><option value="PGS.TS" >PGS.TS</option><option value="TSKH" >TSKH</option><option value="TS" >TS</option><option value="NCS" >NCS</option><option value="Ths" >Ths</option><option value="CN" >CN</option><option value="KS" >KS</option></select>
         <button type="submit">Search</button>
      </form>

