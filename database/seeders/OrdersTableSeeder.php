<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        //DB::table('orders')->delete();

        DB::table('orders')->insert(array(
            0 =>
            array( //tháng 7 2 cái
                'id' => 1,
                'order_code' => 'UFE06P81LI5OTX2RNW4V',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-07-14 10:09:35',
                'updated_at' => '2024-07-14 10:09:35',
                'member_id' => 1,
            ),
            1 =>
            array(
                'id' => 2,
                'order_code' => 'QHG3PFAR7AFJW8DY8PLN',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-07-15 11:09:35',
                'updated_at' => '2024-07-15 11:09:35',
                'member_id' => 1,
            ),
            2 =>
            array(
                'id' => 3,
                'order_code' => 'VWJKJUHXV0MEKE7T266L',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-07-17 09:09:35',
                'updated_at' => '2024-07-17 09:09:35',
                'member_id' => 1,
            ),
            3 =>
            array(
                'id' => 4,
                'order_code' => '3KQXTHO9G5COHJFV1S8X',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-07-18 13:09:35',
                'updated_at' => '2024-07-18 13:09:35',
                'member_id' => 1,
            ),
            //end tháng 7
            //tháng 6
            4 =>
            array(
                'id' => 5,
                'order_code' => 'PRDEIPJI466BZ3P2I9ZI',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-06-18 17:09:35',
                'updated_at' => '2024-06-18 17:09:35',
                'member_id' => 1,
            ),
            //end tháng 6
            //tháng 5
            5 =>
            array(
                'id' => 6,
                'order_code' => 'RFKSPT9ILP920NY7MMFB',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-05-16 15:09:35',
                'updated_at' => '2024-05-16 15:09:35',
                'member_id' => 1,
            ),
            6 =>
            array(
                'id' => 7,
                'order_code' => 'MW5QOEPNWK0WBAQ09WXY',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-05-18 13:09:35',
                'updated_at' => '2024-05-18 13:09:35',
                'member_id' => 1,
            ),
            //end tháng 5
            //tháng 4
            7 =>
            array(
                'id' => 8,
                'order_code' => 'JDRDZONHF6E1E5WG8X1P',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-04-20 10:09:35',
                'updated_at' => '2024-04-20 10:09:35',
                'member_id' => 1,
            ),
            8 =>
            array(
                'id' => 9,
                'order_code' => 'GTUMS7FFGGQBQVL5XH0A',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-04-21 19:09:35',
                'updated_at' => '2024-04-21 19:09:35',
                'member_id' => 1,
            ),
            9 =>
            array(
                'id' => 10,
                'order_code' => 'KZ1E0P7O64MFEV7Z1G4Q',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-04-22 10:09:35',
                'updated_at' => '2024-04-22 10:09:35',
                'member_id' => 1,
            ),
            10 =>
            array(
                'id' => 11,
                'order_code' => '953O41CK1HM8WL4S65H2',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-04-23 08:09:35',
                'updated_at' => '2024-04-23 08:09:35',
                'member_id' => 1,
            ),
            //end tháng 4
            //tháng 3
            11 =>
            array(
                'id' => 12,
                'order_code' => 'GY16URWYMQP2JVHJ2PD5',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-03-20 00:09:35',
                'updated_at' => '2024-03-20 00:09:35',
                'member_id' => 1,
            ),
            12 =>
            array(
                'id' => 13,
                'order_code' => 'SMSF5NVPW3YZEIGTXZEU',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-03-20 00:09:35',
                'updated_at' => '2024-03-20 00:09:35',
                'member_id' => 1,
            ),
            //end tháng 3
            //tháng 2
            13 =>
            array(
                'id' => 14,
                'order_code' => 'QC3HF9OPCI5IHX8JKF1Z',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-02-20 10:09:35',
                'updated_at' => '2024-02-20 10:09:35',
                'member_id' => 1,
            ),
            14 =>
            array(
                'id' => 15,
                'order_code' => '5FU8AT9YT3D4CK2Y9J6Q',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-02-20 19:09:35',
                'updated_at' => '2024-02-20 19:09:35',
                'member_id' => 1,
            ),
            //end tháng 2
            //tháng 1
            15 =>
            array(
                'id' => 16,
                'order_code' => 'A4JC3YL4OW31KQ6YXYXH',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-01-20 16:09:35',
                'updated_at' => '2024-01-20 16:09:35',
                'member_id' => 1,
            ),
            16 =>
            array(
                'id' => 17,
                'order_code' => 'X2O2D4ZLQSHVF7UU32JH',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-01-20 20:09:35',
                'updated_at' => '2024-01-20 20:09:35',
                'member_id' => 1,
            ),
            //end tháng 1
            //tháng 12
            17 =>
            array( 
                'id' => 18,
                'order_code' => 'VCS2I0RLGGUMULTAFRIF',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-12-14 10:09:35',
                'updated_at' => '2023-12-14 10:09:35',
                'member_id' => 1,
            ),
            //end tháng 12
            //tháng 11
            18 =>
            array(
                'id' => 19,
                'order_code' => 'U5CQMEOIVJ0085W8V5AE',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-11-15 11:09:35',
                'updated_at' => '2023-11-15 11:09:35',
                'member_id' => 1,
            ),
            //end tháng 11
            //tháng 10
            19 =>
            array(
                'id' => 20,
                'order_code' => 'L31C24AOBFMN81YAE6KG',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-10-17 09:09:35',
                'updated_at' => '2023-10-17 09:09:35',
                'member_id' => 1,
            ),
            //end tháng 10
            //tháng 9
            20 =>
            array(
                'id' => 21,
                'order_code' => 'OOF2CYF8RDQEUEZOXCQP',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-09-18 13:09:35',
                'updated_at' => '2023-09-18 13:09:35',
                'member_id' => 1,
            ),
            //end tháng 9
            //tháng 8
            21 =>
            array(
                'id' => 22,
                'order_code' => '8WJS9A7MYFHRVO5UGVT8',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-08-18 17:09:35',
                'updated_at' => '2023-08-18 17:09:35',
                'member_id' => 1,
            ),
            22 =>
            array(
                'id' => 23,
                'order_code' => '7KTSZETWQB2807LJXELT',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-08-18 17:09:35',
                'updated_at' => '2023-08-18 17:09:35',
                'member_id' => 1,
            ),
            23 =>
            array(
                'id' => 24,
                'order_code' => 'FNJICNCMLU4P4CHIEQVN',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-08-18 17:09:35',
                'updated_at' => '2023-08-18 17:09:35',
                'member_id' => 1,
            ),
            //end tháng 8
            //tháng 7
            24 =>
            array(
                'id' => 25,
                'order_code' => 'D3IJFX9N4Z2WBHICK665',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-07-10 13:09:35',
                'updated_at' => '2023-07-10 13:09:35',
                'member_id' => 1,
            ),
            25 =>
            array(
                'id' => 26,
                'order_code' => '1OR6T643LRLZY5F8KKVS',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-07-12 17:09:35',
                'updated_at' => '2023-07-12 17:09:35',
                'member_id' => 1,
            ),
            26 =>
            array(
                'id' => 27,
                'order_code' => 'QT32YY8WTYUOOI21UXJB',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-07-16 18:09:35',
                'updated_at' => '2023-07-16 18:09:35',
                'member_id' => 1,
            ),
            27 =>
            array(
                'id' => 28,
                'order_code' => 'QUX11IU8EUXQFJ146AWE',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-07-20 09:09:35',
                'updated_at' => '2023-07-20 09:09:35',
                'member_id' => 1,
            ),
            //end tháng 7
            //tháng 6
            28 =>
            array(
                'id' => 29,
                'order_code' => 'KK6QD5CYVV755PIKQP52',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-06-18 13:09:35',
                'updated_at' => '2023-06-18 13:09:35',
                'member_id' => 1,
            ),
            //end tháng 6
            //tháng 5
            29 =>
            array(
                'id' => 30,
                'order_code' => 'SFFR2JI7BI7S7PTWOO6J',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-05-20 10:09:35',
                'updated_at' => '2023-05-20 10:09:35',
                'member_id' => 1,
            ),
            //end tháng 5
            //tháng 4
            30 =>
            array(
                'id' => 31,
                'order_code' => '73612SXJHFQP6V1VS86A',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-04-21 19:09:35',
                'updated_at' => '2023-04-21 19:09:35',
                'member_id' => 1,
            ),
            //end tháng 4
            //tháng 3
            31 =>
            array(
                'id' => 32,
                'order_code' => 'XAGAOY3MVL159MXQ22UE',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-03-22 10:09:35',
                'updated_at' => '2023-03-22 10:09:35',
                'member_id' => 1,
            ),
            //end tháng 3
            //tháng 2
            32 =>
            array(
                'id' => 33,
                'order_code' => 'WGHWY98Y3QPRS371T3EB',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-02-11 15:09:35',
                'updated_at' => '2023-02-11 15:09:35',
                'member_id' => 1,
            ),
            //end tháng 2
            //tháng 1
            33 =>
            array(
                'id' => 34,
                'order_code' => '1FGVD7YXVBZXODGA13N9',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2023-01-04 12:09:35',
                'updated_at' => '2023-01-04 12:09:35',
                'member_id' => 1,
            ),
            34 =>
            array(
                'id' => 35,
                'order_code' => 'E5V0JKBHDT6PVZ26R0FL',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-01-06 07:09:35',
                'updated_at' => '2024-01-06 07:09:35',
                'member_id' => 1,
            ),
            35 =>
            array(
                'id' => 36,
                'order_code' => 'MBSOLCOJDRKTYG096LXX',
                'fullname' => 'Hệ Thống Nhân Viên',
                'phone' => '0891234567',
                'address' => 'Tp. Hồ Chí Minh',
                'note' => NULL,
                'total_price' => 84000.0,
                'status' => 5,
                'created_at' => '2024-01-10 10:09:35',
                'updated_at' => '2024-01-10 10:09:35',
                'member_id' => 1,
            ),
            //end tháng 1
        ));
    }
}
