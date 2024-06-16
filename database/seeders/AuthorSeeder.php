<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Nguyễn Nhật Ánh', 'description' => 'Nguyễn Nhật Ánh là một nam nhà văn người Việt Nam. Được xem là một trong những nhà văn hiện đại xuất sắc nhất Việt Nam hiện nay, ông được biết đến qua nhiều tác phẩm văn học về đề tài tuổi trẻ. Nhiều tác phẩm của ông được độc giả và giới chuyên môn đánh giá cao, đa số đều đã được chuyển thể thành phim.','photo_path'=>'','photo_name'=>''],
            ['name' => 'Vũ Trọng Phụng', 'description' => 'Được xem là cây viết khôi hài nổi bật của dòng văn học trào phúng nổi tiếng ở Việt Nam thời bấy giờ, Vũ Trọng Phụng là một trong các nhà văn nổi tiếng Việt Nam sử dụng văn học hiện thực phê phán để kể chuyện cười cho thiên hạ, qua đó vạch trần xã hội thối nát và mang lại những tiếng cười sâu cay cho độc giả đại chúng.','photo_path'=>'','photo_name'=>''],
            ['name' => 'Thạch Lam', 'description' => 'Đầu thế kỷ XX, các nhà văn nổi tiếng Việt Nam thường đi theo hai dòng văn học chuyên biệt: văn học lãng mạn và văn học hiện thực. Và Thạch Lam chính là một cái tên nổi bật cho trào lưu văn học lãng mạn ở Việt Nam. Như xu hướng chung của văn học lãng mạn, các tác giả nổi tiếng Việt Nam sẽ đi sâu vào nội tâm của con người, khai thác khát vọng sống cùng những phức cảm tâm lý của nhân vật. Với Thạch Lam, đề tài cũng tương tự như thế.','photo_path'=>'','photo_name'=>''],
            ['name' => 'Nam Cao', 'description' => 'Với đặc trưng là văn học hiện thực, Nam Cao là một trong các nhà văn nổi tiếng Việt Nam khắc họa hiện thực xã hội xảy ra ở các làng quê, nơi nông dân nghèo chịu áp bức từ địa chủ. Khác với Vũ Trọng Phụng với lối văn chương hiện thực thuật lại một xã hội đang chuyển biến, Nam Cao dùng hiện thực tàn nhẫn để đánh thức tính thiện trong mỗi con người. Các nhân vật của ông, dù bị chèn ép áp bức, họ vẫn khao khát được sống lương thiện, được làm một người đàng hoàng tử tế.','photo_path'=>'','photo_name'=>''],
             
        ]);
    }
}
