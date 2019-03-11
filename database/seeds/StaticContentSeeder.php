<?php

use Illuminate\Database\Seeder;

use App\Department;
use App\Role;

class StaticContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deptArray = array(
            array(1, '1', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'ME', 'Mechanical Engineering', 'วิศวกรรมเครื่องกล', '2018-03-18 03:21:08'),
            array(2, '2', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'CVE', 'Civil Engineering', 'วิศวกรรมโยธา', '2018-03-18 03:21:08'),
            array(3, '3', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'TME', 'Tool and Material Engineering', 'วิศวกรรมเครื่องมือและวัสดุ', '2018-03-18 03:21:08'),
            array(4, '4', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'EE', 'Electrical Engineering', 'วิศวกรรมไฟฟ้า', '2018-03-18 03:21:08'),
            array(5, '5', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'CHE', 'Chemical Engineering', 'วิศวกรรมเคมี', '2018-03-18 03:21:08'),
            array(6, '6', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'PE', 'Production Engineering', 'วิศวกรรมอุตสาหการ', '2018-03-18 03:21:08'),
            array(7, '7', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'ENV', 'Environmental Engineering', 'วิศวกรรมสิ่งแวดล้อม', '2018-03-18 03:21:08'),
            array(8, '8', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'CPE', 'Computer Engineering', 'วิศวกรรมคอมพิวเตอร์', '2018-03-18 03:21:08'),
            array(9, '9', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'INC', 'Control System and Instrumentation Engineering', 'วิศวกรรมระบบควบคุมและเครื่องมือวัด', '2018-03-18 03:21:08'),
            array(10, '10', 'FOE', 'Faculty of Engineering', 'คณะวิศวกรรมศาสตร์', 'ENE', 'Electronic and Telecommunication Engineering', 'วิศวกรรมไฟฟ้าสื่อสารและอิเล็กทรอนิกส์', '2018-03-18 03:21:08'),
            array(11, '11', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'MTH', 'Mathematics', 'คณิตศาสตร์', '2019-02-06 09:44:35'),
            array(12, '12', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'ACS', 'Applied Computer Science', 'คณิตศาสตร์ array(คอมพิวเตอร์ประยุกต์)', '2019-02-06 09:44:35'),
            array(13, '13', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'PHY', 'Physic', 'ฟิสิกส์', '2019-02-06 09:44:31'),
            array(14, '14', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'CHM', 'Chemistry', 'เคมี', '2018-03-18 03:21:08'),
            array(15, '15', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'MIC', 'Microbiology', 'จุลชีววิทยา', '2018-03-18 03:21:08'),
            array(16, '16', 'FOS', 'Faculty of Science', 'คณะวิทยาศาสตร์', 'FSCI', 'Microbiologyarray(Food Science)', 'จุลชีววิทยา array(วิทยาศาสตร์และเทคโนโลยีการอาหาร)', '2018-03-18 03:21:08'),
            array(17, '17', 'FIET', 'Faculty of Industrial Education and Technology', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'MTE', 'Mechanical Engineering For FIET', 'ครุศาสตร์เครื่องกล', '2018-03-18 03:21:08'),
            array(18, '18', 'FIET', 'Faculty of Industrial Education and Technology', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'ETE', 'Electrical Engineering For FIET', 'ครุศาสตร์ไฟฟ้า', '2018-03-18 03:21:08'),
            array(19, '19', 'FIET', 'Faculty of Industrial Education and Technology', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'PPT', 'Printing and Package', 'เทคโนโลยีการพิมพ์และบรรจุภัณฑ์', '2018-03-18 03:21:08'),
            array(20, '20', 'FIET', 'Faculty of Industrial Education and Technology', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'CMM', 'Multimedia', 'ครุศาสตร์คอมพิวเตอร์และเทคโนโลยีสารสนเทศ', '2018-03-18 03:21:08'),
            array(21, '21', 'FIET', 'Faculty of Industrial Education and Technology', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'ECT', 'Educational Communications and Technology', 'ครุศาสตร์เทคโนโลยีและสื่อสารการศึกษา', '2018-03-18 03:21:08'),
            array(22, '22', 'SIT', 'School of Information Technology', 'คณะเทคโนโลยีสารสนเทศ', 'SIT', 'Information Technology', 'เทคโนโลยีสารสนเทศ', '2018-03-18 03:21:08'),
            array(23, '23', 'SoA+D', 'School of Architecture and Design', 'คณะสถาปัตยกรรมและการออกแบบ', 'SoA+D', 'School of Architecture and Design', 'สถาปัตยกรรมและการออกแบบ', '2018-03-18 03:21:08'),
            array(24, '24', 'FIBO', 'Institute of Field Robotics', 'สถาบันวิทยาการหุ่นยนต์ภาคสนาม', 'FIBO', 'Institute of Field Robotics', 'วิทยาการหุ่นยนต์ภาคสนาม', '2018-03-18 03:21:08'),
            array(25, '25', 'MEDIA', 'School of Architecture and Design', 'คณะสถาปัตยกรรมและการออกแบบ', 'MEDIA', 'Media and Technology', 'โครงการร่วมบริหารหลักสูตรมีเดียอาตส์และเทคโนโลยีมีเดีย', '2019-02-06 09:52:16'),
            array(26, '26', 'SoLA', 'School of Liberal Arts', 'คณะศิลปศาสตร์', 'SoLA', 'School of Liberal Arts', 'ศิลปศาสตร์', '2019-02-06 09:52:16'),
            array(27, '27', 'PDTI', 'Pilot Plant Development and Training Institute', 'สถาบันพัฒนาและฝึกอบรมโรงงานต้นแบบ', 'PDTI', 'Pilot Plant Development and Training Institute', 'สถาบันพัฒนาและฝึกอบรมโรงงานต้นแบบ', '2019-02-06 09:52:16'),
            array(28, '28', 'NSNT', 'Nanoscience and Nanotechnology', 'คณะวิทยาศาสตร์และคณะทรัพยากรชีวภาพและเทคโนโลยี', 'NSNT', 'Nanoscience and Nanotechnology', 'หลักสูตรวิทยาศาสตร์นาโนและเทคโนโลยีนาโน', '2019-02-06 09:52:16'),
            array(29, '29', 'SBT', 'School of Bioresources and Technology', 'คณะทรัพยากรณ์ชีวภาพและเทคโนโลยี ', 'SBT', 'School of Bioresources and Technology', 'คณะทรัพยากรชีวภาพและเทคโนโลยี', '2019-02-06 09:52:16'),
            array(30, '30', 'SEEM', 'School of Energy Environment and Materials', 'คณะพลังงงานสิ่งแวดล้อมและวัสดุ ', 'SEEM', 'School of Energy Environment and Materials', 'พลังงานสิ่งแวดล้อมและวัสดุ', '2019-02-06 09:52:16')
        );

        foreach($deptArray as $dept){
            Department::firstOrCreate([
                'camp_dept_id'         => $dept[0],
                'faculty_abbr'      => $dept[1],
                'faculty_full_en'      => $dept[2],
                'faculty_full_th'      => $dept[3],
                'department_abbr'      => $dept[4],
                'department_full_en'      => $dept[5],
                'department_full_th'      => $dept[6],
            ]);
        }

        Role::firstOrCreate([
            'name'         => 'admin',
            'display_name' => 'Administrator'
        ]);

        Role::firstOrCreate([
            'name'         => 'senior',
            'display_name' => 'Senior Staff'
        ]);

        Role::firstOrCreate([
            'name'         => 'junior',
            'display_name' => 'Junior Staff'
        ]);

        Role::firstOrCreate([
            'name'         => 'user',
            'display_name' => 'User'
        ]);

    }
}


