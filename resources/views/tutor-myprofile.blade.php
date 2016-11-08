    @extends('tutor-master')

    @section('title', 'Tutor Profile')
    @section('content')
    <div class="content-area">
    <form action='' method='post'>
      <h1 class="heading">ข้อมูลของฉัน</h1><br>
      <h2 class="large-topic">ชื่อ - นามสกุล</h2>
      <input type="text" class="large-normal-input normal-input" name='name' value='{{$profile->name}}'>
      <h2 class="large-topic">ชื่อเล่น</h2>
      <input type="text" class="normal-input" name='calledname' value='{{$profile->calledname}}'>
      <h2 class="large-topic">อายุ</h2>
      <input type="number" class="number-spin-input" name='birthdate' value='{{$profile->birthdate}}'>
      <h2 class="large-topic">มหาวิทยาลัย</h2>
      <input type="text" class="large-normal-input normal-input" name='university' value='{{$profile->university}}'>
      <h1 class="sub-heading">ข้อมูลติดต่อ</h1><br>
      <h2 class="large-topic">E-mail</h2>
      <input type="text" class="normal-input" name='email' value='{{$profile->email}}'>
      <h2 class="large-topic">โทรศัพท์มือถือ</h2>
      <input type="text" class="normal-input" name='phone' value='{{$profile->phone}}'>
      <br/>      <br/>
      <input type="hidden" name="_method" value="PUT">
      {{ csrf_field() }}
   <button type='submit' class="button button-orange">บันทึกการแก้ไข</button>
   </form>
    </div>
    @endsection
