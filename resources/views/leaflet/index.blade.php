@extends('layouts.app')
@section('title', 'Leaflet V2')
@section('content')
@include('components.title', [
"title" => "Permission for Absent",
"desc" => "Leaflet V2"
])
<style type="text/css">
#title{
font-size: 20px;
font-family: cloud;
background-color: #c58ec3;
color: #fff;
}
#header{
font-size: 17px;
font-family: cloud;
background-color: #f5d9f5;
}
.btn-pink{
background-color: #c58ec3;
color: #fff;
font-size: 18px;
font-family: cloud;
transition: 0.2s;
}
.btn-pink:hover{
background-color: #f48fb1;
color: #f5f5f5;
font-size: 18px;
font-family: cloud;
}
.form-control{
  font-family: cloud;
}
label{
  font-family: cloud;
  font-size: 16px;
}
</style>
<div class="row">
<div class="row">
  <div class="col-sm-4">
    <form action="" method="post">
    <div class="panel panel-default">
      <div class="panel-heading" id="title">
          <i class="fa fa-fw fa-list-alt"></i>&nbsp;ประเภทการลา
      </div>
      <div class="panel-body">
        <select class="form-control" name="selectType">
          <?php
            if(isset($_POST['selectType'])){
              if($_POST['selectType'] == 0){
                $type = "ลากิจ / ลาป่วย";
              }else if($_POST['selectType'] == 1){
                $type = "ลาออกนอกสถานที่";
              }else{
                $type = "ลาทำแลปนอกเวลา";
              }
              ?>
              <option>{{ $type }}</option>
              <?php
            }
          ?>
          <option value="0">ลากิจ / ลาป่วย</option>
          <option value="1">ลาออกนอกสถานที่</option>
          <option value="2">ลาทำแลปนอกเวลา</option>
        </select>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-footer">
        <input class="btn btn-block btn-pink" value="ยืนยัน" type="submit" name="submitType">
      </div>
    </div>
    </form>
  </div>
  <div class="col-sm-8">

    <?php
    if(isset($_POST['submitType'])){

      if($_POST['selectType'] == 0){
        ?>
          <div class="panel panel-default">
            <div class="panel-heading" id="title">
                <i class="fa fa-fw fa-pencil"></i>&nbsp;รายละเอียดการลากิจ / ลาป่วย
            </div>
            <div class="panel-body">
                <div class="form-group">
                  <label for="fullname">ชื่อ-นามสกุล :</label>
                  <input class="form-control" name="fullname" placeholder="กรุณากรอกชื่อ-นามสกุล" type="text">
                </div>
                <div class="form-group">
                  <label for="campid">รหัสประจำตัว :</label>
                  <input class="form-control" name="campid" placeholder="กรุณากรอกรหัสประจำตัว หรือ Camp ID" type="text">
                </div>
                <div class="form-group">
                  <label for="phoneNum">หมายเลขโทรศัพท์ :</label>
                  <input class="form-control" name="phoneNum" placeholder="กรุณากรอกหมายเลขโทรศัพท์" type="text">
                </div>
                <div class="form-group">
                  <label for="labName">แลปวิจัย :</label>
                  <input class="form-control" name="labName" placeholder="กรุณากรอกแลปวิจัย" type="text">
                </div>
                <div class="form-group">
                  <label for="proName">อาจารย์ที่ปรึกษา :</label>
                  <input class="form-control" name="proName" placeholder="กรุณากรอกชื่ออาจารย์ที่ปรึกษา" type="text">
                </div>
                <div class="form-group">
                  <label for="leftDate">วันที่ลา :</label>
                  <input class="form-control" name="leftDate" placeholder="กรุณาเลือกวันที่ต้องการลา" type="date">            
                </div>
                <div class="form-group">
                  <label for="cause">สาเหตุที่ลา :</label>
                  <textarea rows="4" class="form-control" name="cause" placeholder="กรุณากรอกสาเหตุของการทำแลปนอกเวลา" type="text"></textarea>   
                </div>
            </div>
            <div class="panel-footer">
              <input class="btn btn-block btn-pink" value="ยืนยัน" type="submit">
            </div> 
          </div>
        <?php
      }else if($_POST['selectType'] == 1){
        ?>
          <div class="panel panel-default">
            <div class="panel-heading" id="title">
                <i class="fa fa-fw fa-pencil"></i>&nbsp;รายละเอียดการลาออกนอกสถานที่
            </div>
            <div class="panel-body">
                <div class="form-group">
                  <label for="forwhat">ประเภทที่ลา :</label>
                  <select class="form-control" name="forwhat">
                    <option value="0">ลาเพื่องานวิจัย</option>
                    <option value="1">ลาเพื่อกิจธุระ</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="fullname">ชื่อ-นามสกุล :</label>
                  <input class="form-control" name="fullname" placeholder="กรุณากรอกชื่อ-นามสกุล" type="text">
                </div>
                <div class="form-group">
                  <label for="campid">รหัสประจำตัว :</label>
                  <input class="form-control" name="campid" placeholder="กรุณากรอกรหัสประจำตัว หรือ Camp ID" type="text">
                </div>
                <div class="form-group">
                  <label for="phoneNum">หมายเลขโทรศัพท์ :</label>
                  <input class="form-control" name="phoneNum" placeholder="กรุณากรอกหมายเลขโทรศัพท์" type="text">
                </div>
                <div class="form-group">
                  <label for="labName">แลปวิจัย :</label>
                  <input class="form-control" name="labName" placeholder="กรุณากรอกแลปวิจัย" type="text">
                </div>
                <div class="form-group">
                  <label for="proName">อาจารย์ที่ปรึกษา :</label>
                  <input class="form-control" name="proName" placeholder="กรุณากรอกชื่ออาจารย์ที่ปรึกษา" type="text">
                </div>
                <div class="form-group">
                  <label for="leftDate">วันที่ลา :</label>
                  <input class="form-control" name="leftDate" placeholder="กรุณาเลือกวันที่ต้องการลา" type="date">            
                </div>
                <div class="form-group">
                  <label for="startTime">เวลาที่เริ่ม :</label>
                  <input class="form-control" name="startTime" placeholder="กรุณากรอกเวลาที่เริ่มออกนอกสถานที่" type="text">            
                </div>
                <div class="form-group">
                  <label for="finishTime">เวลาที่เสร็จสิ้น :</label>
                  <input class="form-control" name="finishTime" placeholder="กรุณากรอกเวลาที่กลับมา" type="text">            
                </div>
                <div class="form-group">
                  <label for="cause">สาเหตุที่ลา :</label>
                  <textarea rows="4" class="form-control" name="cause" placeholder="กรุณากรอกสาเหตุที่ลาออกไปนอกสถานที่" type="text"></textarea>          
                </div>
                <div class="form-group">
                  <label for="place">สถานที่ :</label>
                  <input class="form-control" name="place" placeholder="กรุณากรอกสถานที่ที่จะไป" type="text">            
                </div>
                <div class="form-group">
                  <label for="PName">ผู้ควบคุมดูแล :</label>
                  <input class="form-control" name="PName" placeholder="กรุณากรอกชื่อผู้ควบคุมดูแล" type="text">            
                </div>
                <div class="form-group">
                  <label for="PNum">หมายเลขโทรศัพท์ผู้ควบคุม :</label>
                  <input class="form-control" name="PNum" placeholder="กรุณากรอกหมายเลขโทรศัพท์ผู้ควบคุมดูแล" type="text">            
                </div>
                <div class="form-group">
                  <label for="PNum">ผู้ดูแลเป็น :</label>
                  <select class="form-control" name="permission">
                    <option value="J">Junior Staff</option>
                    <option value="S">Senior Staff</option>
                    <option value="T">อาจารย์</option>
                    <option value="P">พี่เลี้ยงประจำแลปวิจัย</option>
                  </select>
                </div>
            </div>
            <div class="panel-footer">
              <input class="btn btn-block btn-pink" value="ยืนยัน" type="submit">
            </div> 
          </div>
        <?php
      }else{
        ?>
          <div class="panel panel-default">
            <div class="panel-heading" id="title">
                <i class="fa fa-fw fa-pencil"></i>&nbsp;รายละเอียดการลาทำแลปนอกเวลา
            </div>
            <div class="panel-body">
                <div class="form-group">
                  <label for="fullname">ชื่อ-นามสกุล :</label>
                  <input class="form-control" name="fullname" placeholder="กรุณากรอกชื่อ-นามสกุล" type="text">
                </div>
                <div class="form-group">
                  <label for="campid">รหัสประจำตัว :</label>
                  <input class="form-control" name="campid" placeholder="กรุณากรอกรหัสประจำตัว หรือ Camp ID" type="text">
                </div>
                <div class="form-group">
                  <label for="phoneNum">หมายเลขโทรศัพท์ :</label>
                  <input class="form-control" name="phoneNum" placeholder="กรุณากรอกหมายเลขโทรศัพท์" type="text">
                </div>
                <div class="form-group">
                  <label for="labName">แลปวิจัย :</label>
                  <input class="form-control" name="labName" placeholder="กรุณากรอกแลปวิจัย" type="text">
                </div>
                <div class="form-group">
                  <label for="proName">อาจารย์ที่ปรึกษา :</label>
                  <input class="form-control" name="proName" placeholder="กรุณากรอกชื่ออาจารย์ที่ปรึกษา" type="text">
                </div>
                <div class="form-group">
                  <label for="permission">อนุญาตให้พี่เลี้ยงดูแล :</label>
                  <select class="form-control" name="permission">
                    <option value="0">ไม่อนุญาต</option>
                    <option value="1">อนุญาต</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="leftDate">วันที่ลา :</label>
                  <input class="form-control" name="leftDate" placeholder="กรุณาเลือกวันที่ต้องการลา" type="date">            
                </div>
                <div class="form-group">
                  <label for="startTime">เวลาที่เริ่ม :</label>
                  <input class="form-control" name="startTime" placeholder="กรุณากรอกเวลาที่เริ่มทำแลปนอกเวลา เช่น 17.00" type="text">            
                </div>
                <div class="form-group">
                  <label for="finishTime">เวลาที่เสร็จสิ้น :</label>
                  <input class="form-control" name="finishTime" placeholder="กรุณากรอกเวลาที่เสร็จสิ้นการทำแลปนอกเวลา เช่น 19.00" type="text">            
                </div>
                <div class="form-group">
                  <label for="cause">สาเหตุที่ลา :</label>
                  <textarea rows="4" class="form-control" name="cause" placeholder="กรุณากรอกสาเหตุของการทำแลปนอกเวลา" type="text"></textarea>          
                </div>
                <div class="form-group">
                  <label for="place">สถานที่ :</label>
                  <input class="form-control" name="place" placeholder="กรุณากรอกสถานที่ที่ทำแลปนนอกเวลา" type="text">            
                </div>
                <div class="form-group">
                  <label for="PName">ผู้ควบคุมดูแล :</label>
                  <input class="form-control" name="PName" placeholder="กรุณากรอกชื่อผู้ควบคุมดูแล" type="text">            
                </div>
                <div class="form-group">
                  <label for="PNum">หมายเลขโทรศัพท์ผู้ควบคุม :</label>
                  <input class="form-control" name="PNum" placeholder="กรุณากรอกหมายเลขโทรศัพท์ผู้ควบคุมดูแล" type="text">            
                </div>
                <div class="form-group">
                  <label for="PNum">ผู้ดูแลเป็น :</label>
                  <select class="form-control" name="permission">
                    <option value="J">Junior Staff</option>
                    <option value="S">Senior Staff</option>
                    <option value="T">อาจารย์</option>
                    <option value="P">พี่เลี้ยงประจำแลปวิจัย</option>
                  </select>
                </div>
            </div>
            <div class="panel-footer">
              <input class="btn btn-block btn-pink" value="ยืนยัน" type="submit">
            </div> 
          </div>
        <?php
      }
    }else{
      ?>
        <div class="panel panel-default">
          <div class="panel-heading" id="title">
              <i class="fa fa-fw fa-pencil"></i>&nbsp;รายละเอียดการลา
          </div>
          <div class="panel-body">

          </div>
        </div>
      <?php
    }
    ?>
  </div>
</div>
</div>

@endsection
