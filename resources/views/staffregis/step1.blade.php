@extends('layouts.app')
@section('title', 'Staff Registration')

@section('content')
    @include('components.title', [
        "title" => "Staff Registration",
        "desc" => "ลงทะเบียน Staff"
    ])

    <?php
        $generateFields = array(
            [
                "name" => "gender",
                "display" => "เพศ",
                "html" => '
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="form_gender" value="M"  > ชาย / Male
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="form_gender" value="F"  > หญิง / Female
                    </label>
                ',
                "required" => true
            ],
            [
                "name" => "sec",
                "display" => "Section",
                "html" => '
                    <select class="form-control" name="sec">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                ',
                "required" => true
            ],
            [
                "name" => "dept_id",
                "display" => "ประจำแลป",
                "html" => '
                    <select class="form-control" name="dept_id">
                      
                      <option value="01">01 : เทคโนโลยีสารสนเทศ</option>
                      <option value="02">02 : สถาปัตยกรรมและการออกแบบ</option>
                      <option value="03">03 : คณิตศาสตร์</option>
                      <option value="04">04 : ฟิสิกส์</option>
                      <option value="05">05 : เคมี</option>
                      <option value="06">06 : จุลชีววิทยา</option>
                      <option value="07">07 : ครุศาสตร์โยธา</option>
                      <option value="08">08 : ครุศาสตร์ไฟฟ้า</option>
                      <option value="09">09 : ครุศาสตร์เทคโนโลยีการพิมพ์และบรรจุภัณฑ์</option>
                      <option value="10">10 : วิศวกรรมคอมพิวเตอร์</option>
                      <option value="11">11 : วิศวกรรมเคมี</option>
                      <option value="12">12 : วิศวกรรมเครื่องกล</option>
                      <option value="13">13 : วิศวกรรมเครื่องมือและวัสตุ</option>
                      <option value="14">14 : วิศวกรรมไฟฟ้า</option>
                      <option value="15">15 : วิศวกรรมโยธา</option>
                      <option value="16">16 : วิศวกรรมระบบควบคุมและเครื่องมือวัด</option>
                      <option value="17">17 : วิศวกรรมสิ่งแวดล้อม</option>
                      <option value="18">18 : วิศวกรรมอิเล็กทรอนิคส์และโทรคมนาคม</option>
                      <option value="19">19 : วิศวกรรมอุตสาหการ</option>
                      <option value="20">20 : วิทยาการหุ่นยนต์ภาคสนาม</option>
                      <option value="21">21 : ครุศาสตร์คอมพิวเตอร์และเทคโนโลยีสารสนเทศ</option>
                      <option value="22">22 : เทคโนโลยีมีเดีย</option>
                      <option value="23">23 : มีเดียทางการแพทย์และวิทยาศาสตร์</option>
                      <option value="24">24 : มีเดียอาตส์</option>
                    

                    </select>
                ',
                "required" => true
            ],
            [
                "name" => "title",
                "display" => "คำนำหน้าชื่อ",
                "required" => true
            ],
            [
                "name" => "first_name_th",
                "display" => "ชื่อจริง",
                "required" => true
            ],
            [
                "name" => "last_name_th",
                "display" => "นามสกุล",
                "required" => true
            ],
            [
                "name" => "nickname_th",
                "display" => "ชื่อเล่น",
                "required" => true
            ],
            [
                "name" => "first_name_en",
                "display" => "First Name",
                "required" => true
            ],
            [
                "name" => "last_name_en",
                "display" => "Last Name",
                "required" => true
            ],
            [
                "name" => "nickname_en",
                "display" => "Nickname",
                "required" => true
            ],
            [
                "name" => "telephone_no",
                "display" => "เบอร์โทรศัพท์",
                "required" => true,
                "help" => "ใส่เฉพาะตัวเลข ห้ามใส่ขีดคั่น"
            ],
            [
                "name" => "birth_date",
                "display" => "วันเกิด",
		"html" => '
		<div class="input-group date">
  			<input type="text" class="form-control" name="birth_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		</div>',
                "required" => true
            ],
            [
                "name" => "disease",
                "display" => "โรคประจำตัว",
                "placeholder" => "-"
            ],
            [
                "name" => "allergic",
                "display" => "อาหารที่แพ้",
                "placeholder" => "-"
            ],
            [
                "name" => "email",
                "display" => "อีเมล",
                "help" => "อีเมลที่ใช้ติดต่อได้ในปัจจุบัน",
                "required" => true
            ],
            [
                "name" => "facebook",
                "display" => "Facebook",
                "required" => true,
                "help" => "ใส่เป็นชื่อเฟซบุ๊ค เช่น John Doe"
            ]
        );
    ?>


    <h5>กรุณากรอกข้อมูลให้ครบถ้วน</h5>
    <form action="{{ url('/magic/staff-registration/photo') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
        @foreach( $generateFields as $field )
            <div class="form-group">
                <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['display'] }} {{ (isset($field['required'])? " *": "") }}</label>
                <div class="col-sm-8">
                    <?php
                        if(isset($field['html'])){
                            echo $field['html'];
                        }else{
                            echo '<input
                                    type="text"
                                    class="form-control"
                                    '.( (isset($field['required']))? ' required ':'' ).'
                                    name="'.$field['name'].'"
                                    id="form_'.$field['name'].'"
                                    placeholder="'.( (isset($field['placeholder']) )? $field['placeholder']: str_replace("*", "", $field['display']) ) .'"
                                    >';
                        }
                        if( isset($field['help']) ) echo '<p class="help-block">'.$field['help'].'</p>';
                    ?>
                </div>
            </div>
        @endforeach
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
            </div>
        </div>
    </form>
<script type='text/javascript' src="/js/jquery-3.3.1.js"></script>
<script type='text/javascript' src="/js/jquery-ui.js"></script>
<script type='text/javascript' src="/js/bootstrap-datepicker.js"></script>
<script type='text/javascript'>
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true,
    dateFormat: 'yy-mm-dd'
});  

</script>

@endsection

