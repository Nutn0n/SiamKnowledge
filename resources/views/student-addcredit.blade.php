@extends('student-master')
@section('content')
    <div class="content-area">
    <form action='' method="post">
      <h1 class="heading">เครดิต</h1><br>
      <h1 class="sub-heading"><span class="ion-card"></span> แจ้งโอนผ่านธนาคาร</h1><br><br>
      <h2 class="large-topic">จำนวนเครดิตที่ต้องการเติม</h2>
      <input name='amount' type="number" placeholder="จำนวนเงินบาท" class="number-spin-input">
      <h2 class="large-topic">เวลาและวันที่ที่โอนเงิน</h2>
      <input name='time' type="text" placeholder="รายละเอียดคร่าว ๆ" class="normal-input"><br/>
      {{ csrf_field() }}
      <select name='bank' class="dropdown-outerspace">
        <option value="" disabled selected hidden>เลือกธาคาร</option>
        <option value='bangkok bank'>กรุงเทพ - 123456</option>
        <option value='scb'>ไทยพานิชย์ - 123456</option>
        <option value='ktc'>กรุงไทย - 123456</option>
      </select>
      <h3 class="description">เลือกบัญชีธนาคารที่ได้โอนเงิน</h3>

      <br/><br/>
      <button type='submit' class="button button-orange">แจ้งโอนเงิน</button>
    </form>
    </div>
@endsection
@section('postscript')
  @if(session('status'))
    <script type="text/javascript">swal("แจ้งโอนเงินสำเร็จ", "กรุณารอเจ้าหน้าตรวจสอบเพื่อเพิ่มเครดิต", "success");</script>
  @endif
@endsection