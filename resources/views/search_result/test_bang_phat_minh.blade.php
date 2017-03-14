<form method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" name="text_search">
        <span class="sel"><select name="tim_theo" id="id_field" onchange=""  class="chosen-select"><option value="0" selected="selected">Tìm theo</option><option value="1" >Tên phát minh, sáng chế, giải pháp</option><option value="2" >Điểm nổi bật</option><option value="3" >Tác giả</option></select></span>

        <select id="acatid" class="chosen-select" name="linh_vuc_khcn">

            <option value="0" selected="selected">Lĩnh vực KH&amp;CN</option>

            

            <option value="1" >Công nghệ thông tin và truyền thông</option>

            

            <option value="2" >Công nghệ sinh học</option>

            

            <option value="3" >Công nghệ vật liệu mới</option>

            

            <option value="4" >Công nghệ chế tạo máy - tự động hóa</option>

            

            <option value="5" >Công nghệ môi trường</option>

            

            <option value="6" >Công nghệ năng lượng mới</option>

            

            <option value="7" >Công nghệ vũ trụ</option>

            

            <option value="8" >Công nghệ khác</option>

            

        </select>

        <select name="loai" id="id_type" onchange=""  class="chosen-select"><option value="0" selected="selected">Loại</option><option value="1" >Sáng chế</option><option value="2" >Phát minh</option><option value="3" >Giải pháp hữu ích</option></select>
        <button type="submit">Search</button>
</form>

