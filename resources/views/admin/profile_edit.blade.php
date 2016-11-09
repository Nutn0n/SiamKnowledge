<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Siam Knowledge | Admin</title>

    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600&amp;subset=thai" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- Static -->
    <nav>
      <span class="nav-logo">
        <img src="siam-knowledge-logo_dark.svg" class="logo" />
      </span>
      <span class="nav-text">
        <h2>I AM</h2>
        <h3>Nattanon Dungsunenarn</h3>
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
          <br/><br/>
            <div class="profile-pic-wrapper">
              <div class="profile-pic"></div>
                <input type="file" id="files" name='avatar' >
            </div>
            <br/><br/>

            <h2 class="large-topic">สถานะ</h2>
            <select  class="dropdown-outerspace">
              <option value="" disabled selected hidden>สถานะของผู้ใช้</option>
              <option value=''>ACITIVE</option>
              <option value=''>UNACITIVE</option>
            </select>
            <br/>

            <h2 class="large-topic">แก้ไขระดับชั้น</h2>
            <select  class="dropdown-outerspace">
              <option value="" disabled selected hidden>ระดับขั้นติวเตอร์</option>
              <option value=''>ติวเตอร์ White</option>
              <option value=''>ติวเตอร์ Silver</option>
              <option value=''>ติวเตอร์ Gold</option>
            </select>
            <br/>

            <h2 class="large-topic">ชื่อ - นามสกุล</h2>
            <input type="text" class="large-normal-input normal-input">
            <h2 class="large-topic">ชื่อเล่น</h2>
            <input type="text" class="normal-input">
            <h2 class="large-topic">อายุ</h2>
            <input type="number" class="number-spin-input">
            <h2 class="large-topic">โรงเรียน</h2>
            <input type="text" class="large-normal-input normal-input">
            <h2 class="large-topic">E-mail</h2>
            <input type="text" class="normal-input">
            <h2 class="large-topic">โทรศัพท์มือถือ</h2>
            <input type="text" class="normal-input">

            <button name="บันทึก" class="save-edit-button">บันทึก</button>
            <button name="ลบ" class="remove-user-button">ลบผู้ใช้งาน</button>

        </div>
      </div>

    </section>

    <!-- end block -->



  </body>
</html>
