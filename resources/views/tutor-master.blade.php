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
                <div style="background-image: url('@if($User->profile->avatar!=NULL) {{Storage::url($User->profile->avatar)}}@else https://api.adorable.io/avatars/100/{{$User->profile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;" class="profile-pic"></div>
          <div class="profile-name">
            <h1 id="name">{{$User->profile->name}}</h1>
            <h2 id="type">{{$User->profile->tutorgrade}} Tutor</h2>
          </div>
        </div>
      </div><!--
      <div class="progress-pie-chart" data-percent="@if($User->profile->teachhours <= 5)
      20
      @elseif(5<$User->profile->teachhours && $User->profile->teachhours <= 10)
      75
      @elseif(10<$User->profile->teachhours && $User->profile->teachhours <= 20)
      10
      @elseif(20<$User->profile->teachhours && $User->profile->teachhours <= 30)
      20
      @elseif(30<$User->profile->teachhours && $User->profile->teachhours <= 40)
      75
      @elseif(40<$User->profile->teachhours && $User->profile->teachhours <= 50)
      10
      @elseif(50<$User->profile->teachhours && $User->profile->teachhours <= 60)
      50
      @elseif(60<$User->profile->teachhours && $User->profile->teachhours <= 100)
      100
      @elseif($User->profile->teachhours >100)
      100
      @endif">
      
      <div class="ppc-progress">
        <div class="ppc-progress-fill"></div>
      </div>
      <div class="ppc-percents">
        <div class="pcc-percents-wrapper">
          <span class="pecentage-info">%</span>
          <div class="next-level">ระดับต่อไป<br/>
            <strong>@if($User->profile->tutorgrade == 'White') Bronze @elseif($User->profile->tutorgrade == 'Bronze') Silver @elseif($User->profile->tutorgrade == 'Silver') Gold @else เวลตันแล้วจ้าาา @endif</strong>
          </div>
        </div>
      </div>
    </div>
    -->

      <div class="credits" style="margin-top:-40px!important;">
        <h1>{{$User->credit->credit}}</h1>
        <h2>เครดิตที่ได้รับ</h2>
      </div>
      <!-- Main Menu -->
      <ul class="menu">
        <li class="menu-button"><a href="/myprofile"><span class="menu-icon ion-person"></span>ข้อมูลของฉัน</a></li>
        <!--<li class="menu-button"><a href="#"><span class="menu-icon ion-ios-bookmarks"></span>กิจกรรม</a></li>-->
        <li class="menu-button"><a href="{{route('course')}}"><span class="menu-icon ion-ios-calendar"></span>คอร์สที่จะสอน</a></li>
        <li class="menu-button"><a href="{{route('tutoranswered')}}"><span class="menu-icon ion-checkmark-circled"></span>ได้รับการตอบรับแล้ว</a></li>
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
    @yield('postscript')

    <script>

      // JavaScript function that tranform percent into displayable variable.

      $(function(){
      var $ppc = $('.progress-pie-chart'),
        percent = parseInt($ppc.data('percent')),
        deg = 360*percent/100;
      if (percent > 50) {
        $ppc.addClass('gt-50');
      }
      $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
      $('.ppc-percents span').html(percent+'%');
    });

    </script>


</body>
</html>
