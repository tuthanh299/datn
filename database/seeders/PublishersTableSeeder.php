<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('publishers')->delete();
        
        DB::table('publishers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'NXB giáo dục Việt Nam',
                'description' => 'Nhà xuất bản Giáo dục Việt Nam, trực thuộc Bộ Giáo dục và Đào tạo, ra đời từ ngày 01 tháng 6 năm 1957. Là đơn vị xuất bản lớn nhất tại Việt Nam, nhà xuất bản này nổi tiếng với hàng nghìn đầu sách giáo dục được xuất bản hàng năm. Nhiệm vụ chính của Nhà xuất bản Giáo dục Việt Nam là tổ chức biên soạn, biên tập, in ấn và phát hành sách giáo khoa, cũng như các sản phẩm giáo dục hỗ trợ nghiên cứu và giảng dạy.',
                'photo_path' => '/storage/publisher/1/O67v1iHyhVry2L78K7QU.png',
                'photo_name' => 'nxbgd.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:44:22',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'NXB Trẻ',
                'description' => 'Nhà xuất bản Trẻ là đơn vị chuyên sản xuất sách và văn hóa phẩm đa dạng, phục vụ chủ yếu cho đối tượng trẻ, bao gồm thanh niên, thiếu nhi và tổ chức Đoàn các cấp trong thành phố. Nhà xuất bản không chỉ hướng tới bạn đọc nội địa mà còn mở rộng tầm ảnh hưởng quốc tế. Đội ngũ sáng tạo của Trẻ không ngừng nỗ lực để mang đến những tác phẩm văn hóa độc đáo, sáng tạo và giáo dục.',
                'photo_path' => '/storage/publisher/1/nnfPNvv6O4dPKsTlbw5a.jpg',
                'photo_name' => 'nxbtre.jpg',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:44:29',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'NXB Kim Đồng',
                'description' => 'Nhà xuất bản Kim Đồng là một địa chỉ uy tín dành cho tác giả trẻ gửi tác phẩm của mình. Nằm trong hệ thống Trung ương Đoàn TNCS Hồ Chí Minh, Kim Đồng chuyên sản xuất và phát hành sách dành cho thiếu nhi và bậc phụ huynh trên toàn quốc.',
                'photo_path' => '/storage/publisher/1/6tLvDygL17iXGy3n5H1f.png',
                'photo_name' => 'nxbkimdong.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:44:36',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'NXB Tổng hợp thành phố Hồ Chí Minh',
                'description' => 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh được thành lập từ năm 1977. Nơi này không chỉ là nơi hội tụ về tư tưởng, văn hóa, chính trị của Đảng bộ và nhân dân thành phố mà còn là nguồn cảm hứng sáng tạo cho hàng ngàn tựa sách đa dạng.',
                'photo_path' => '/storage/publisher/1/Rd1lVbtuSbbs56BNO4ON.png',
                'photo_name' => 'nxbthtphcm.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:44:45',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'NXB Hội Nhà văn',
                'description' => 'Nhà xuất bản Hội Nhà văn được thành lập năm 1957. Nhà xuất bản Hội Nhà văn là sự kế thừa và tiếp thu có hiệu quả của công tác xuất bản của Nhà xuất bản Văn nghệ. Sản phẩm chủ yếu của nhà xuất bản là xuất bản sách đa dạng các thể loại như: tiểu thuyết, văn học, truyện ngắn, nghiên cứu, thơ,… và báo chí.',
                'photo_path' => '/storage/publisher/1/swmALMbBFyNEK63yFg5g.png',
                'photo_name' => 'nxbhnv.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:44:52',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'NXB Nhã Nam',
                'description' => 'Nhã Nam, tên đầy đủ là Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam, gia nhập thị trường sách Việt Nam vào tháng 2 năm 2005 với tác phẩm "Balzac và cô bé thợ may Trung hoa" của Đới Tư Kiệt. 
Ngay từ cuốn sách đầu tiên, độc giả đã dành sự quan tâm và yêu mến cho một thương hiệu sách mới mẻ mang trong mình khát vọng góp phần tạo lập diện mạo mới cho xuất bản văn học tại Việt Nam.',
                'photo_path' => '/storage/publisher/1/WJu9T1wW63QLJQSTMJY9.jpg',
                'photo_name' => 'nxbnn.jpg',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 16:46:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'NXB giáo dục Việt Nam',
                'description' => 'Nhà xuất bản Giáo dục Việt Nam, trực thuộc Bộ Giáo dục và Đào tạo, ra đời từ ngày 01 tháng 6 năm 1957. Là đơn vị xuất bản lớn nhất tại Việt Nam, nhà xuất bản này nổi tiếng với hàng nghìn đầu sách giáo dục được xuất bản hàng năm. Nhiệm vụ chính của Nhà xuất bản Giáo dục Việt Nam là tổ chức biên soạn, biên tập, in ấn và phát hành sách giáo khoa, cũng như các sản phẩm giáo dục hỗ trợ nghiên cứu và giảng dạy.',
                'photo_path' => '/storage/publisher/1/O67v1iHyhVry2L78K7QU.png',
                'photo_name' => 'nxbgd.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:44:22',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'NXB Trẻ',
                'description' => 'Nhà xuất bản Trẻ là đơn vị chuyên sản xuất sách và văn hóa phẩm đa dạng, phục vụ chủ yếu cho đối tượng trẻ, bao gồm thanh niên, thiếu nhi và tổ chức Đoàn các cấp trong thành phố. Nhà xuất bản không chỉ hướng tới bạn đọc nội địa mà còn mở rộng tầm ảnh hưởng quốc tế. Đội ngũ sáng tạo của Trẻ không ngừng nỗ lực để mang đến những tác phẩm văn hóa độc đáo, sáng tạo và giáo dục.',
                'photo_path' => '/storage/publisher/1/nnfPNvv6O4dPKsTlbw5a.jpg',
                'photo_name' => 'nxbtre.jpg',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:44:29',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'NXB Tổng hợp thành phố Hồ Chí Minh',
                'description' => 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh được thành lập từ năm 1977. Nơi này không chỉ là nơi hội tụ về tư tưởng, văn hóa, chính trị của Đảng bộ và nhân dân thành phố mà còn là nguồn cảm hứng sáng tạo cho hàng ngàn tựa sách đa dạng.',
                'photo_path' => '/storage/publisher/1/Rd1lVbtuSbbs56BNO4ON.png',
                'photo_name' => 'nxbthtphcm.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:44:45',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'NXB Hội Nhà văn',
                'description' => 'Nhà xuất bản Hội Nhà văn được thành lập năm 1957. Nhà xuất bản Hội Nhà văn là sự kế thừa và tiếp thu có hiệu quả của công tác xuất bản của Nhà xuất bản Văn nghệ. Sản phẩm chủ yếu của nhà xuất bản là xuất bản sách đa dạng các thể loại như: tiểu thuyết, văn học, truyện ngắn, nghiên cứu, thơ,… và báo chí.',
                'photo_path' => '/storage/publisher/1/swmALMbBFyNEK63yFg5g.png',
                'photo_name' => 'nxbhnv.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:44:52',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'NXB Nhã Nam',
                'description' => 'Nhã Nam, tên đầy đủ là Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam, gia nhập thị trường sách Việt Nam vào tháng 2 năm 2005 với tác phẩm "Balzac và cô bé thợ may Trung hoa" của Đới Tư Kiệt. 
Ngay từ cuốn sách đầu tiên, độc giả đã dành sự quan tâm và yêu mến cho một thương hiệu sách mới mẻ mang trong mình khát vọng góp phần tạo lập diện mạo mới cho xuất bản văn học tại Việt Nam.',
                'photo_path' => '/storage/publisher/1/WJu9T1wW63QLJQSTMJY9.jpg',
                'photo_name' => 'nxbnn.jpg',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:46:05',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 39,
                'name' => 'NXB Kim Đồng',
                'description' => 'Nhà xuất bản Kim Đồng là một địa chỉ uy tín dành cho tác giả trẻ gửi tác phẩm của mình. Nằm trong hệ thống Trung ương Đoàn TNCS Hồ Chí Minh, Kim Đồng chuyên sản xuất và phát hành sách dành cho thiếu nhi và bậc phụ huynh trên toàn quốc.',
                'photo_path' => '/storage/publisher/1/6tLvDygL17iXGy3n5H1f.png',
                'photo_name' => 'nxbkimdong.png',
                'created_at' => NULL,
                'updated_at' => '2024-04-21 09:44:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}