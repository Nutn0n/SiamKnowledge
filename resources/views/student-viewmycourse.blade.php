@extends('student-master')
@section('content')
    <div class="content-area">
      <h1 class="heading mycourse">คอร์สของฉัน</h1><br/><br/>
      <h2 class="large-topic noanswer">คอร์สที่ยังไม่ได้ตอบรับ</h2>
      <h2 class="large-topic happening">คอร์สที่จะเกิดขึ้น</h2>
      <h2 class="large-topic passed">คอร์สที่ผ่านไปแล้ว</h2>
<style>
.tap{
  margin-top:15px;
}
.sweet-alert .save-edit-button,#kd,#kd2 {
   display: initial;
   width: auto;
   height: auto;
   margin: auto;
}
.sweet-alert .save-edit-button{
   cursor: pointer; 
   -webkit-touch-callout: none; /* iOS Safari */
   -webkit-user-select: none; /* Chrome/Safari/Opera */
   -khtml-user-select: none; /* Konqueror */
   -moz-user-select: none; /* Firefox */
   -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none; /* Non-prefixed version, currently
                                  not supported by any browser */
  }
  </style>
@endsection
@section('postscript')
  <script type="text/javascript">
    var noanswer = 0;
    var happening  = 0;
    var passed = 0;
  </script>
  @foreach($data['courses'] as $Course)
    <script type="text/javascript">
    var long = '@if($Course->default == true && $Course->available == false)<button value="{{$Course->id}}"class="dup button button-orange">ทำซ้ำ</h1></button>@endif<a class="button button-grey" href="{{route('edit', ['id'=>$Course->id])}}">แก้ไข</a><a href="{{route('viewmycoursepage', ['id'=>$Course->id])}}"><div class="card-small-wrapper"><div class="card-small"> <div class="date"><h1>{{$Course->date}}<br><span>{{$Course->month}}</span></h1></div><div class="card-detail"><div class="card-name"><h1>{{$Course->topic}}<br><span>{{$Course->subject}}</span></h1></div><div class="card-description"><h2 class="card-time">{{$Course->timestring}}</h2><br class="card-breaker"><h2 class="card-location">{{$Course->place}}</h2></div></div></div></a>';
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
      var every = 7;
      var first = 1;
  function isNumeric(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }

    $(".dup").click(function(){
      var id = $(this).val();
      swal({title: "",showCancelButton: true,text: `
        <p>ต้องกาารเรียนทุกกี่วัน?</p>
          <span class="input-group-btn">
              <span type="button" class="save-edit-button button button-orange"  data-type="minus" data-field="quant[2]">
              -</span>
          </span>
          <input type="text" name="quant[2]" id='kd' class="form-control input-number" value="7" min="1" max="100">
          <span class="input-group-btn">
              <span type="button" class="save-edit-button button button-orange" data-type="plus" data-field="quant[2]">
              +</span>
          </span>
          <div class='tap'>
          <p>ต้องการเรียนอีกกี่ครั้ง</p>
           <span class="input-group-btn">
              <span type="button" class="save-edit-button button button-orange"  data-type="minus" data-field="quant[3]">
              -</span>
          </span>
          <input type="text" name="quant[3]" id='kd2' class="form-control input-number" value="1" min="1" max="100">
          <span class="input-group-btn">
              <span type="button" class="save-edit-button button button-orange" data-type="plus" data-field="quant[3]">
              +</span>
          </span>
          </div>
      `,
      html: true,
      allowOutsideClick: false}, function(){
        $('body').on('click', 'button.confirm', function() {
          var every = $("#kd").val();
          var first = $("#kd2").val();
          window.location = "{{route('welcome')}}/"+ "dup/" +id +"/" + first +"/" + every;
        });
      });
      $('.save-edit-button').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$(document).ready(function(){$('.input-number').change(function() {
    var every = $("#kd").val();
    var first = $("#kd2").val();
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }});

    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    });


  </script>
}
@endsection