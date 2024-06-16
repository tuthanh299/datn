<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publishers')->insert([
            ['name' => 'NXB giáo dục Việt Nam', 'description' => 'Nhà xuất bản Giáo dục Việt Nam, trực thuộc Bộ Giáo dục và Đào tạo, ra đời từ ngày 01 tháng 6 năm 1957. Là đơn vị xuất bản lớn nhất tại Việt Nam, nhà xuất bản này nổi tiếng với hàng nghìn đầu sách giáo dục được xuất bản hàng năm. Nhiệm vụ chính của Nhà xuất bản Giáo dục Việt Nam là tổ chức biên soạn, biên tập, in ấn và phát hành sách giáo khoa, cũng như các sản phẩm giáo dục hỗ trợ nghiên cứu và giảng dạy. ','photo_path'=>'','photo_name'=>''],
            ['name' => 'NXB Trẻ', 'description' => 'Nhà xuất bản Trẻ là đơn vị chuyên sản xuất sách và văn hóa phẩm đa dạng, phục vụ chủ yếu cho đối tượng trẻ, bao gồm thanh niên, thiếu nhi và tổ chức Đoàn các cấp trong thành phố. Nhà xuất bản không chỉ hướng tới bạn đọc nội địa mà còn mở rộng tầm ảnh hưởng quốc tế. Đội ngũ sáng tạo của Trẻ không ngừng nỗ lực để mang đến những tác phẩm văn hóa độc đáo, sáng tạo và giáo dục.','photo_path'=>'','photo_name'=>''],
            ['name' => 'NXB Kim Đồng', 'description' => 'Nhà xuất bản Kim Đồng là một địa chỉ uy tín dành cho tác giả trẻ gửi tác phẩm của mình. Nằm trong hệ thống Trung ương Đoàn TNCS Hồ Chí Minh, Kim Đồng chuyên sản xuất và phát hành sách dành cho thiếu nhi và bậc phụ huynh trên toàn quốc.','photo_path'=>'','photo_name'=>''],
            ['name' => 'NXB Tổng hợp thành phố Hồ Chí Minh', 'description' => 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh được thành lập từ năm 1977. Nơi này không chỉ là nơi hội tụ về tư tưởng, văn hóa, chính trị của Đảng bộ và nhân dân thành phố mà còn là nguồn cảm hứng sáng tạo cho hàng ngàn tựa sách đa dạng.','photo_path'=>'','photo_name'=>''],
            ['name' => 'NXB Hội Nhà văn', 'description' => 'Nhà xuất bản Hội Nhà văn được thành lập năm 1957. Nhà xuất bản Hội Nhà văn là sự kế thừa và tiếp thu có hiệu quả của công tác xuất bản của Nhà xuất bản Văn nghệ. Sản phẩm chủ yếu của nhà xuất bản là xuất bản sách đa dạng các thể loại như: tiểu thuyết, văn học, truyện ngắn, nghiên cứu, thơ,… và báo chí.','photo_path'=>'','photo_name'=>''],
            ['name' => 'NXB Nhã Nam', 'description' => 'Nhã Nam, tên đầy đủ là Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam, gia nhập thị trường sách Việt Nam vào tháng 2 năm 2005 với tác phẩm "Balzac và cô bé thợ may Trung hoa" của Đới Tư Kiệt. 
            Ngay từ cuốn sách đầu tiên, độc giả đã dành sự quan tâm và yêu mến cho một thương hiệu sách mới mẻ mang trong mình khát vọng góp phần tạo lập diện mạo mới cho xuất bản văn học tại Việt Nam.','photo_path'=>'','photo_name'=>''],
             
        ]);
    }
}
