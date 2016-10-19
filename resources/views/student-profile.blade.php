    @extends('student-master')

    @section('title', 'Student Profile')
    @section('content')
    <div class="content-area">
      <h1 class="heading">ข้อมูลของฉัน</h1><br>
      <h2 class="large-topic">ชื่อ - นามสกุล</h2>
      <input type="text" class="large-normal-input normal-input">
      <h2 class="large-topic">ชื่อเล่น</h2>
      <input type="text" class="normal-input">
      <h2 class="large-topic">อายุ</h2>
      <input type="number" class="number-spin-input">
      <h2 class="large-topic">โรงเรียน</h2>
      <input type="text" class="large-normal-input normal-input">
      <h1 class="sub-heading">ข้อมูลติดต่อ</h1><br>
      <h2 class="large-topic">E-mail</h2>
      <input type="text" class="normal-input">
      <h2 class="large-topic">โทรศัพท์มือถือ</h2>
      <input type="text" class="normal-input">
      <br/>      <br/>
   <a href="#" class="button button-orange">บันทึกการแก้ไข</a>
    </div>
    @endsection
