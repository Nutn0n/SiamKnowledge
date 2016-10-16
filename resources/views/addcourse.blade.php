<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ติวเตอร์สอนพิเศษส่วนตัว ทั้งแบบเดี่ยว แบบกลุ่ม ครอบคลุมทุกวิชา ตั้งแต่ระดับอนุบาล ประถมศึกษา มัธยมศึกษา จนถึงมหาวิทยาลัย สอนพิเศษเตรียมสอบ เตรียมทหาร เข้ามหาวิทยาลัย O-NET GAT PAT SAT CU-TEP TU-GET IELTS"/>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta name="twitter:title" content="SIAM KNOWLEDGE"/>
  <meta name="twitter:image" content= "../assets/img/og.png" >

  <meta property="og:site_name" content="SIAM KNOWLEDGE" />
  <meta property="og:description" content="เรามีติวเตอร์ที่เป็นนักศึกษาอยู่หลายคณะ หลากหลายมหาวิทยาลัย ไม่ว่าจะเป็น แพทย์ศาสตร์ วิศวกรรมศาสตร์ วิทยาศาสตร์ ศิลปศาสตร์ ครอบคลุมหลายวิชา อีกทั้งยังมีเทคนิคในการสอนให้น้องๆเข้าใจได้ง่าย" />
  <meta property="og:title" content="SIAM KNOWLEDGE" />
  <meta property="og:image" content="../assets/img/og.png" />
  <meta property="article:author" content="https://www.facebook.com/SiamKnowledge"/>

  <link rel="icon" href="../assets/img/favi.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="../assets/img/favi.ico" type="image/x-icon"/>

  <title>Siam Knowledge</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600&amp;subset=thai" rel="stylesheet">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">



</head>

<body>
  <section class="ui-wrapper">
    <!-- Left Sidebar -->
    <div class="left-sidebar">
      <a href="#" class="close-button"></a>
      <div class="profile">
        <div class="profile-wrapper">
          <div class="profile-pic"></div>
          <div class="profile-name">
            <h1 id="name">John Appleseed</h1>
            <h2 id="type">Students</h2>
          </div>
        </div>
      </div>
      <div class="credits">
        <h1>1,200</h1>
        <h2>remain credits</h2>
      </div>

      <!-- Main Menu -->
      <ul class="menu">
        <li class="menu-button"><a href="#"><span class="menu-icon ion-person"></span>ข้อมูลของฉัน</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-ios-bookmarks"></span>กิจกรรมล่าสุด</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-ios-calendar"></span>คอร์สที่เลือกเรียน</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-card"></span>เครดิต</a></li>
      </ul>
      <a href="#" class="class-register"><span class="ion-plus"></span>จองคอร์สเรียนใหม่</a>
    </div>

    <!-- End of Left Sidebar, Start of Main Content -->

    <!-- Logo -->
    <img src="../assets/img/siam-knowledge-logo.svg" class="logo" />

    <!-- Content Area -->
    <form action='' method='post'>
    <div class="content-area">
      <h1 class="heading">จองเรียน</h1><br>
      <select name='topic' class="dropdown-orange">
        <option value="" disabled selected hidden>เลือกวิชา</option>
        <option>ภาษาอังกฤษ</option>
        <option>เลช</option>
        <option>ฟิสิกส์</option>
        <option>เคมี</option>
        <option>ชีวะ</option>
      </select>
      <h2 class="topic">หัวข้อที่ต้องการเรียน</h2>
      <input type="text" name='subject' class="normal-input">
      <ul class="select">
        <li class="selection">
          <input name='inter' value='yes-inter' type="radio" id="a-option" checked>
          <label for="a-option"><span class="ion-ios-world-outline"></span>อินเตอร์</label>
        </li>
        <li class="selection">
          <input name='inter' value='no-inter' type="radio" id="b-option">
          <label for="b-option"><span class="ion-ios-chatbubble-outline"></span>ธรรมดา</label>
        </li>
      </ul>
      <h2 class="topic">วัตถุประสงค์</h2>
      <textarea name='objective' class="text-input" placeholder="Placeholder Text"></textarea>
      <ul class="select">
        <li class="selection">
          <input name='group' value='individual' type="radio" id="a-option" checked="checked">
          <label for="a-option">แบบเดี่ยว</label>
        </li>
        <li class="selection">
          <input name='group' value='yes-group' type="radio" id="b-option">
          <label for="b-option">แบบกลุ่ม</label>
        </li>
      </ul>
      <h2 class="topic">เลือกวันที่</h2>
      <div id="datepicker"></div><br/>
      <h2 class="topic">เลือกเวลา</h2>
    <input name='time' type="time" class="normal-input">
    <input type="text" id='datepickervalue'  hidden name="date" value="hidden" />
      <h2 class="topic">จำนวนชั่วโมง</h2>
      <select name='length' class="dropdown-orange">
        <option value="" disabled selected hidden>เลือกชั่วโมง</option>
        <option value=2>2 ชั่วโมง</option>
        <option value=2.5>2 ชั่วโมง 30 นาที</option>
        <option value=3>3 ชั่วโมง</option>
        <option value=3.5>3 ชั่วโมง 30 นาที</option>
        <option value=4>4 ชั่วโมง</option>
        <option value=4.5>4 ชั่วโมง 30 นาที</option>
        <option value=5>5 ชั่วโมง</option>
      </select>
      <h2 class="topic">ใส่สถานที่</h2>
    <input type="text" name='place' class="normal-input">

      <br/>      <br/>      <br/>      <br/>
      {{ csrf_field() }}
      <button type='submit' class="button button-orange">เพิ่มคอร์ส</button>

    </div>
</form>

  </section>
  <script src="../assets/js/jquery-3.1.1.js" type="text/javascript"></script>
  <script src="../assets/js/jquery-ui.js"></script>
  <script src="../assets/js/script.js" type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
  })
$("#datepicker").datepicker({
  onSelect: function(dateText) {
    $("#datepickervalue").val(dateText);
  }
});
  </script>
</body>
</html>
