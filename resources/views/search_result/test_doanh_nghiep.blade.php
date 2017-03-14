<form method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" name="text_search">
<span class="sel"><select name="tim_theo" id="id_field" onchange=""  class="chosen-select"><option value="0" selected="selected">Tìm theo</option><option value="1" >Theo tên doanh nghiệp</option><option value="2" >Sản phẩm KH&CN</option><option value="3" >Công nghệ nổi bật</option><option value="4" >Hướng nghiên cứu</option></select></span>

        <select id="acatid" class="chosen-select" name="linh_vuc_khcn">

            <option value="0">Lĩnh vực KH&amp;CN</option>

            

            <option value="1" >Công nghệ thông tin và truyền thông</option>

            

            <option value="2" >Công nghệ sinh học</option>

            

            <option value="3" >Công nghệ vật liệu mới</option>

            

            <option value="4" selected="selected">Công nghệ chế tạo máy - tự động hóa</option>

            

            <option value="5" >Công nghệ môi trường</option>

            

            <option value="6" >Công nghệ năng lượng mới</option>

            

            <option value="7" >Công nghệ vũ trụ</option>

            

            <option value="8" >Công nghệ khác</option>

            

        </select>

        <select id="afieldid" onchange="get_disnt('0')" class="chosen-select" name="tinh_thanh_pho">

            <option value="0">Tỉnh, thành phố</option>

            

            <option value="22" >An Giang</option>

            

            <option value="7" >Bà Rịa - Vũng Tàu</option>

            

            <option value="8" >Bắc Giang</option>

            

            <option value="9" >Bắc Kạn</option>

            

            <option value="12" >Bạc Liêu</option>

            

            <option value="11" >Bắc Ninh</option>

            

            <option value="13" >Bến Tre</option>

            

            <option value="4" >Bình Dương</option>

            

            <option value="15" >Bình Phước</option>

            

            <option value="16" >Bình Thuận</option>

            

            <option value="14" >Bình Định</option>

            

            <option value="17" >Cà Mau</option>

            

            <option value="5" >Cần Thơ</option>

            

            <option value="18" >Cao Bằng</option>

            

            <option value="19" >Cửu Long</option>

            

            <option value="26" >Gia Lai</option>

            

            <option value="27" >Hà Giang</option>

            

            <option value="28" >Hà Nam</option>

            

            <option value="1" >Hà Nội</option>

            

            <option value="29" >Hà Tĩnh</option>

            

            <option value="30" >Hải Dương</option>

            

            <option value="6" >Hải Phòng</option>

            

            <option value="31" >Hậu Giang</option>

            

            <option value="32" >Hòa Bình</option>

            

            <option value="33" >Hưng Yên</option>

            

            <option value="783" >Khánh Hòa</option>

            

            <option value="35" >Kiên Giang</option>

            

            <option value="36" >Kon Tum</option>

            

            <option value="37" >Lai Châu</option>

            

            <option value="767" >Lâm Đồng</option>

            

            <option value="38" >Lạng Sơn</option>

            

            <option value="39" >Lào Cai</option>

            

            <option value="41" >Long An</option>

            

            <option value="42" >Nam Định</option>

            

            <option value="508" >Nghệ An</option>

            

            <option value="44" >Ninh Bình</option>

            

            <option value="45" >Ninh Thuận</option>

            

            <option value="46" >Phú Thọ</option>

            

            <option value="47" >Phú Yên</option>

            

            <option value="48" >Quảng Bình</option>

            

            <option value="49" >Quảng Nam</option>

            

            <option value="50" >Quảng Ngãi</option>

            

            <option value="51" >Quảng Ninh</option>

            

            <option value="53" >Quảng Trị</option>

            

            <option value="52" >Sóc Trăng</option>

            

            <option value="54" >Sơn La</option>

            

            <option value="55" >Tây Ninh</option>

            

            <option value="56" >Thái Bình</option>

            

            <option value="57" >Thái Nguyên</option>

            

            <option value="58" >Thanh Hóa</option>

            

            <option value="10" >Thừa Thiên Huế</option>

            

            <option value="59" >Tiền Giang</option>

            

            <option value="63" >TP. HCM</option>

            

            <option value="73" >TP. Nha trang</option>

            

            <option value="60" >Trà Vinh</option>

            

            <option value="61" >Tuyên Quang</option>

            

            <option value="62" >Vĩnh Long</option>

            

            <option value="63" >Vĩnh Phúc</option>

            

            <option value="64" >Yên Bái</option>

            

            <option value="3" >Đà Nẵng</option>

            

            <option value="20" >Đắk Lắc</option>

            

            <option value="21" >Đắk Nông</option>

            

            <option value="23" >Điện Biên</option>

            

            <option value="24" >Đồng Nai</option>

            

            <option value="25" >Đồng Tháp</option>

            

        </select>

        <span id="disnt"></span>


        <select name="xep_hang" id="id_tech_rate" onchange=""  class="chosen-select"><option value="" >Xếp hạng</option><option value="A" selected="selected">A</option><option value="B" >B</option><option value="C" >C</option></select>
      <button type="submit">Search</button>
      </form>

