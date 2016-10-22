<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ติวเตอร์สอนพิเศษส่วนตัว ทั้งแบบเดี่ยว แบบกลุ่ม ครอบคลุมทุกวิชา ตั้งแต่ระดับอนุบาล ประถมศึกษา มัธยมศึกษา จนถึงมหาวิทยาลัย สอนพิเศษเตรียมสอบ เตรียมทหาร เข้ามหาวิทยาลัย O-NET GAT PAT SAT CU-TEP TU-GET IELTS"/>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta name="twitter:title" content="SIAM KNOWLEDGE"/>
  <meta name="twitter:image" content= "/assets/img/og.png" >

  <meta property="og:site_name" content="SIAM KNOWLEDGE" />
  <meta property="og:description" content="เรามีติวเตอร์ที่เป็นนักศึกษาอยู่หลายคณะ หลากหลายมหาวิทยาลัย ไม่ว่าจะเป็น แพทย์ศาสตร์ วิศวกรรมศาสตร์ วิทยาศาสตร์ ศิลปศาสตร์ ครอบคลุมหลายวิชา อีกทั้งยังมีเทคนิคในการสอนให้น้องๆเข้าใจได้ง่าย" />
  <meta property="og:title" content="SIAM KNOWLEDGE" />
  <meta property="og:image" content="/assets/img/og.png" />
  <meta property="article:author" content="https://www.facebook.com/SiamKnowledge"/>

  <link rel="icon" href="/assets/img/favi.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="/assets/img/favi.ico" type="image/x-icon"/>

  <title>@yield('title')</title>
  <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/sweetalert.css">
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
            <h1 id="name">{{$User->profile->name}}</h1>
            <h2 id="type">{{$User->profile->status}}</h2>
          </div>
        </div>
      </div>
      <div class="credits">
        <h1>{{$User->credit->credit}}</h1>
        <h2>earning credits</h2>
      </div>

      <!-- Main Menu -->
      <ul class="menu">
        <li class="menu-button"><a href="#"><span class="menu-icon ion-person"></span>ข้อมูลของฉัน</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-ios-bookmarks"></span>กิจกรรม</a></li>
        <li class="menu-button"><a href="{{route('course')}}"><span class="menu-icon ion-ios-calendar"></span>คอร์สที่จะสอน</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-checkmark-circled"></span>ได้รับการตอบรับแล้ว</a></li>
        <li class="menu-button"><a href="#"><span class="menu-icon ion-card"></span>เครดิต</a></li>
      </ul>

    </div>

    <!-- End of Left Sidebar, Start of Main Content -->

    <!-- Logo -->
    <img src="/assets/img/siam-knowledge-logo.svg" class="logo" />

    <!-- Content Area -->
    @yield('content')
  </section>
  <script src="/assets/js/jquery-3.1.1.js" type="text/javascript"></script>
  <script src="/assets/js/jquery-ui.js"></script>
  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="/assets/js/sweetalert.js" type="text/javascript"></script>
    @yield('postscript');
</body>
</html>
