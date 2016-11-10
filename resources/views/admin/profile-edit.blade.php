<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Siam Knowledge | Admin</title>

    <link rel="stylesheet" href="/assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600&amp;subset=thai" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- Static -->
    <nav>
      <span class="nav-logo">
        <img src="/siam-knowledge-logo_dark.svg" class="logo" />
      </span>
      <span class="nav-text">
        <h2>I AM</h2>
        <h3>{{$data['admin']->name}}</h3>
        <h4>Admin <a href=""><span class="logout"><span class="ion-log-out"></span> Logout</span></a></h4>
      </span>
    </nav>
    <!-- end static -->

    <!-- start block -->

    <section class="block">
      <div class="tutorial">
        <h1 class="tutorial-header"><span class="tutorial-icon ion-person"></span> ข้อมูลผู้ใช้งาน</h1>
        <p class="tutorial-info">ค้นหาข้อมูลผู้ใช้งาน แก้ไขสถานะต่าง ๆ เพิ่มหรือลบผู้ใช้งาน</p>
      </div>
      <div class="window">
        <div class="profile-list course">
          <h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
          <form action="{{route('updateprofileadmin', ['id'=>$data['user']->id])}}" method='post' enctype="multipart/form-data">
          <br/><br/>
            <div class="profile-pic-wrapper">
              <div style="background-image: url('@if($data['user']->avatar!=NULL) {{Storage::url($data['user']->avatar)}}@else https://api.adorable.io/avatars/100/{{$data['user']->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;" class="profile-pic"></div>
                <input type="file" id="files" name='avatar' >
            </div>
            <br/><br/>

            <h2 class="large-topic">สถานะ</h2>
            <select  name='active' class="dropdown-outerspace">
              <option  disabled hidden>สถานะของผู้ใช้</option>
              <option value=1 @if($data['user']->active == true) selected @endif >ACITIVE</option>
              <option value=0 @if($data['user']->active == false) selected @endif >UNACITIVE</option>
            </select>
            <br/>
            @if($data['user']->status == 'Tutor')
            <h2 class="large-topic">แก้ไขระดับชั้น</h2>
            <select  name='tutorgrade' class="dropdown-outerspace">
              <option value="" disabled selected hidden>ระดับขั้นติวเตอร์</option>
              <option value='White' @if($data['user']->tutorgrade == 'White') selected @endif>ติวเตอร์ White</option>
              <option value='Silver' @if($data['user']->tutorgrade == 'Silver') selected @endif>ติวเตอร์ Silver</option>
              <option value='Gold' @if($data['user']->tutorgrade == 'Gold') selected @endif>ติวเตอร์ Gold</option>
            </select>
            <br/>
            @endif

            <h2 class="large-topic">ชื่อ - นามสกุล</h2>
            <input type="text" class="large-normal-input normal-input" name='name' value='{{$data['user']->name}}'>
            <h2 class="large-topic">ชื่อเล่น</h2>
            <input type="text" class="normal-input" name='calledname' value='{{$data['user']->calledname}}'>
            <h2 class="large-topic">อายุ</h2>
            <input type="number" class="number-spin-input" name='birthdate' value='{{$data['user']->birthdate}}'>
            @if($data['user']->status == 'Student')
            <h2 class="large-topic">โรงเรียน</h2>
            <input type="text" class="large-normal-input normal-input" name='school' value='{{$data['user']->school}}'>
            @endif
             @if($data['user']->status == 'University')
            <h2 class="large-topic">โรงเรียน</h2>
            <input type="text" class="large-normal-input normal-input" name='university' value='{{$data['user']->university}}'>
            @endif
            <h2 class="large-topic">E-mail</h2>
            <input type="text" class="normal-input" name='email' value='{{$data['user']->email}}'>
            <h2 class="large-topic">โทรศัพท์มือถือ</h2>
            <input type="text" class="normal-input" name='phone' value='{{$data['user']->phone}}'>
            {{ csrf_field() }}
            <button type='submit' name="บันทึก" class="save-edit-button">บันทึก</button>
            <a href="{{route('updateprofileadmindel', ['id'=>$data['user']->id])}}" name="ลบ" class="remove-user-button">ลบผู้ใช้งาน</a>
            </form>
        </div>
      </div>

    </section>

    <!-- end block -->



  </body>
</html>
