@extends('student-master')
@section('content')
    <div class="content-area">
      <h1 class="heading mycourse">คอร์สของฉัน</h1><br/><br/>
      <h2 class="large-topic noanswer">คอร์สที่ยังไม่ได้ตอบรับ</h2>
      <h2 class="large-topic happening">คอร์สที่จะเกิดขึ้น</h2>
      <h2 class="large-topic passed">คอร์สที่ผ่านไปแล้ว</h2>

@endsection
@section('postscript')
  <script type="text/javascript">
    var noanswer = 0;
    var happening  = 0;
    var passed = 0;
  </script>
  @foreach($data['courses'] as $Course)
    <script type="text/javascript">

    var long = '@if($Course->default == true)<button class="dup">ทำซ้ำ</h1></button>@endif<a href="{{route('viewmycoursepage', ['id'=>$Course->id])}}"><div class="card-small-wrapper"><div class="card-small"> <div class="date"><h1>{{$Course->date}}<br><span>{{$Course->month}}</span></h1></div><div class="card-detail"><div class="card-name"><h1>{{$Course->topic}}<br><span>{{$Course->subject}}</span></h1></div><div class="card-description"><h2 class="card-time">{{$Course->timestring}}</h2><br class="card-breaker"><h2 class="card-location">{{$Course->place}}</h2></div></div></div></a>';
    </script>
    @if($Course->available == true)
    <script type="text/javascript">
        var noanswer = 1;
        $( ".noanswer" ).append(long);
    </script>
    @endif
    @if($Course->available == false and $Course->verified == false)
      <script type="text/javascript">
        var happening = 1;
        $(".happening").append(long);
      </script>
    @endif
    @if($Course->available == false and $Course->verified == true)
      <script type="text/javascript">
        var passed = 1;
        $(".passed").append(long);
      </script>
    @endif
  @endforeach
  <script type="text/javascript">
    if(noanswer == 0){
      $(".noanswer").append('<div  class="null-card"><h1> <span class="ion-ios-albums-outline"></span> ไม่มีข้อมูลให้แสดง</h1></div>');
    }
    if (happening ==0){
      $(".happening").append(' <div  class="null-card"><h1> <span class="ion-ios-albums-outline"></span> ไม่มีข้อมูลให้แสดง</h1></div>  ');
    }
    if (passed ==0){
      $(".passed").append('<div  class="null-card"><h1> <span class="ion-ios-albums-outline"></span> ไม่มีข้อมูลให้แสดง</h1></div>');
    }
  </script>
  @if(session('status'))
      <script type="text/javascript">swal('เรียบร้อย', '{{session('status')}}', 'success');</script>
  @endif
  <script type="text/javascript">
  function isNumeric(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }

    $(".dup").click(function(){
      swal({
        title: "ทำซ้ำ",
        text: "ต้องการเรียนคอร์สนี้อีก:",
        type: "input",   showCancelButton: true,
        closeOnConfirm: false,   animation: "slide-from-top",
        inputPlaceholder: "5" },
        function(inputValue){
          if (inputValue === false) return false;
          if (inputValue === "") {swal.showInputError("You need to write something!");
          return false   }
          if(isNumeric(inputValue) === false){swal.showInputError("กรุณากรอกจำนวนครั้งที่ถูกต้อง");
          return false ;  }
          var first = inputValue;
        swal({
        title: "ต้องการเรียนทุกกี่วัน",
        text: "ใส่จำนวนวัน",
        type: "input",   showCancelButton: true,
        closeOnConfirm: false,   animation: "slide-from-top",
        inputPlaceholder: "7" },
        function(inputValue){
          if (inputValue === false) return false;
          if (inputValue === "") {swal.showInputError("You need to write something!");
          return false   }
          if(isNumeric(inputValue) === false){swal.showInputError("กรุณากรอกจำนวนวันที่ถูกต้อง");
          return false ;  }
          window.location = "{{route('welcome')}}/"+"dup/{{$Course->id}}/" + first +"/" + inputValue;
          });
    });
    });

  </script>
@endsection