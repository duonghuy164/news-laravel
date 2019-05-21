<?php

use Illuminate\Database\Seeder;

class tintucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $NoiDung = "
    	</h3>BAI Tap Lon laravel</h3>
    	<p>
    	<b>Duong Manh Huy <b>
    	<br>
    	<b>LPHP1808E<b>	
    	</p>
    	";
    	 DB::table('tintuc')->insert([
    	 	['idLoaiTin'=>'1','TieuDe' => 'Lần đầu ĐH FPT cấp học bổng tiến sĩ ','TieuDeKhongDau' => 'Lan-Dau-Dh-Fpt-Cap-Hoc-Bong-Tien-Si','TomTat' => 'Bên cạnh 400 suất học bổng Nguyễn Văn Đạo, ĐH FPT lần đầu tiên chọn ra 30 học sinh xuất sắc nhất để cấp học bổng toàn phần đào tạo từ cử nhân lên thẳng tiến sĩ, với tổng giá trị quỹ lên tới 5 triệu USD.','NoiDung' => $NoiDung,'Hinh' => 'FPT-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => '300 tỷ đồng phát triển giáo dục mầm non ','TieuDeKhongDau' => '300-Ty-Dong-Phat-Trien-Giao-Duc-Mam-Non','TomTat' => 'Bộ Giáo dục và Đào tạo đang xây dựng chương trình, mục tiêu quốc gia về giáo dục giai đoạn 2011-2015, trong đó dự kiến chi 300 tỷ đồng để phát triển giáo dục mầm non năm 2011. ','NoiDung' => $NoiDung,'Hinh' => 'tre_em_set_sub.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'1','TieuDe' => 'Nợ giáo viên tiền tỷ chi phí phổ cập giáo dục ','TieuDeKhongDau' => 'No-Giao-Vien-Tien-Ty-Chi-Phi-Pho-Cap-Giao-Duc','TomTat' => 'Ba năm qua, nhiều giáo viên ở Khánh Hòa bỏ công sức, kể cả tiền bạc để thực hiện phổ cập giáo dục cho học sinh trên địa bàn tỉnh, song đến nay vẫn chưa nhận được tiền chính quyền chi trả. ','NoiDung' => $NoiDung,'Hinh' => 'pho-cap-giao-duc-nho-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'2','TieuDe' => 'Mong ước đầu năm của giới trẻ ','TieuDeKhongDau' => 'Mong-Uoc-Dau-Nam-Cua-Gioi-Tre','TomTat' => 'Trong năm mới, chàng thủ khoa ĐH Ngoại thương Tăng Văn Bình quyết tâm trau dồi ngoại ngữ để thực hiện ước mơ du học, còn Miss Teen Diễm Trang sẽ dành nhiều thời gian hơn cho hoạt động xã hội, giao lưu quốc tế. ','NoiDung' => $NoiDung,'Hinh' => 'diem-trang-2.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'3','TieuDe' => 'Trai Hà thành trổ tài vật cầu đầu xuân','TieuDeKhongDau' => 'Trai-Ha-Thanh-Tro-Tai-Vat-Cau-Dau-Xuan','TomTat' => 'Những pha tranh cướp quyết liệt cùng những tiếng cười vui là hình ảnh về lễ hội vật cầu đầu xuân của các thanh niên làng Thúy Lĩnh, quận Hoàng Mai (Hà Nội), diễn ra chiều 8/2 (6 Tết). ','NoiDung' => $NoiDung,'Hinh' => '130.jpg','NoiBat' => 1],
            ['idLoaiTin'=>'3','TieuDe' => 'Phố phường Hà Nội rực rỡ trước đại lễ','TieuDeKhongDau' => 'Pho-Phuong-Ha-Noi-Ruc-Ro-Truoc-Dai-Le','TomTat' => '20 ngày trước đại lễ nghìn năm, đường phố Hà Nội rực rỡ ánh đèn cùng những hình tượng hoa văn màu sắc. Hồ Gươm như lung linh hơn.','NoiDung' => $NoiDung,'Hinh' => 'dienbienphu.jpg','NoiBat' => 1],
        	
    	]);
    	
    	
    }
}
