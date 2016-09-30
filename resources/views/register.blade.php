<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIAM KNOWLEDGE</title>

    <link rel="stylesheet" href="assets/login.css">
    <link rel="stylesheet" href="assets/reset.css">


  </head>
  <body>

  <div class="register">


  <div class="hero">
  <div class="register-logo">
  <span class="blub"></span>
  <h1>SIAM</h1>
  <h2>KNOWLEDGE</h2>
</div>
<hr/>

<form action='' method="post">
  <section class="personal-info">
  <h2><span class="ion-ios-compose-outline"></span> กรุณากรอกข้อมูลส่วนตัว</h2>
  <h3> ชื่อ - นามสกุล <span class="reject"> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='name' class="enterplace name"  placeholder="John Appleseed" type="name"></input>
  <h3>ชื่อเล่น</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='calledname' class="enterplace calledname"  placeholder="กรอกชื่อเล่น" type="text"></input>
  <h3>อายุ</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='birthdate' class="enterplace birth"  placeholder="กรอกอายุ" type="number"></input>
  <h3>เพศ</h3>
  <br/>
  <div id="radios">
  		<label for="male" >
  			<input type="radio" name="gender" id="male" value="male" checked/>
  		  <span><span class="ion-male"></span> ชาย</span>
  		</label>
  		<label for="female" >
  			<input type="radio" name="gender" id="female" value="female" />
  			<span><span class="ion-female"></span> หญิง</span>
  		</label>
  		<label for="other" >
  			<input type="radio" name="gender" id="other" value="other" />
  			<span><span class="ion-transgender"></span> อื่น ๆ</span>
  		</label>
  	</div>
    <h3>Email</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='email' class="enterplace email"  placeholder="your@email.com" type="email"  autocomplete="on"></input>
  </section>
   <h3>รหัสผ่าน</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='password' class="enterplace pass"  placeholder="ตั้งรหัสผ่านของคุณ" type="password"  autocomplete="off"></input>
   <h3>ยืนยันรหัสผ่าน<h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='password' class="enterplace pass"  placeholder="ตั้งรหัสผ่านของคุณ" type="password"  autocomplete="off"></input>
  </section>

  <section class="edu-info">
    <h2><span class="ion-ios-bookmarks-outline"></span> ข้อมูลการศึกษา</h2>
     <hr/>

         <p>ระบุข้อมูลด้านการศึกษา โปรดเลือกอย่างใดอย่างหนึ่ง</p>
    <h3>โรงเรียน <span class="minor"></span></h3>
    <input name='school' class="enterplace name"  placeholder="กรอกชื่อโรงเรียน" type="text"></input>

    <h3>มหาวิทยาลัย<span class="minor"> หากอยู่ในระดับมหาวิทยาลัย</span></h3>
    <input name='university' class="enterplace name"  placeholder="หรอกชื่อมหาวิทยาลัย และคณะ" type="text"></input>


    <h3>สายการเรียน</h3><br/>
    <div id="radios">
        <label for="sci-math" >
          <input type="radio" name="field" id="sci-math" value="sci-math"/>
          <span><span class="ion-ios-flask-outline"></span> วิทย์-คณิต</span>
        </label>
        <label for="com-sci" >
          <input type="radio" name="field" id="com-sci" value="com-sci" />
          <span><span class="ion-ios-monitor-outline"></span> วิทย์-คอม</span>
        </label>
        <label for="art-math" >
          <input type="radio" name="field" id="art-math" value="art-math" />
          <span><span class="ion-ios-list-outline"></span> ศิลป์-คำนวณ</span>
        </label><br/><br/>
        <label for="art-lang" >
          <input type="radio" name="field" id="art-lang" value="art-lang" />
          <span><span class="ion-ios-world-outline"></span> ศิลป์-ภาษา</span>
        </label>
        <label for="other-field" >
          <input type="radio" name="field" id="other-field" value="other-field" />
          <span><span class="ion-ios-information-outline"></span> อื่น ๆ</span>
        </label>
      </div>
      <h3>ลักษณะการเรียน</h3><br/>
      <div id="radios">
          <label for="yes-inter" >
            <input type="radio" name="inter" id="yes-inter" value="yes-inter" />
            <span><span class="ion-ios-world-outline"></span> อินเตอร์</span>
          </label>
          <label for="no-not-inter" >
            <input type="radio" name="inter" id="no-not-inter" value="no-not-inter" checked/>
            <span><span class="ion-ios-chatbubble-outline"></span> ธรรมดา</span>
          </label>
        </div>
  </section>

  <section class="contact-info">
  <h2><span class="ion-ios-paperplane"></span> ข้อมูลติดต่อ</h2><hr/>
  <h3>โทรศัพท์มือถือ</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='phone' class="enterplace phone"  placeholder="หมายเลขโทรศัพท์" type="tel"></input>
  <h3>ID LINE</h3> <!--<span class="ion-ios-minus-outline"></span> ข้อมูลไม่ถูกต้องกรุณาตรวจสอบใหม่</span></h3> -->
  <input name='lineid' class="enterplace line"  placeholder="ID LINE" type="text"></input>
  <br/>
  <h3>เชื่อมต่อบัญชีเข้ากับ</h3>
  <div class="social-account">
  <!--- If Facebook connected  change class to "facebook-connected" -->
  <!--- If Twitter connected  change class to "twitter-connected" -->
  <a href=""><span class="ion-social-facebook facebook-connect"></span></a>
    <a href=""><span class="ion-social-twitter twitter-connect"></span></a>
  </div>
    <p class="minor">การเชื่อมบัญชีเพื่อข้อมูลการติดต่อ สามารถทำได้ในภายหลัง</p>
  </section>
  	{{ csrf_field() }}
  <div class="finish-button">
  <a href="#"><input class="finish-register-button" type="submit" value="ลงทะเบียน"></a><br/>
  </form>
</div>
  </div>
  </div>

<footer><p>Copyright 2016. All Rights Reserved.</p></footer>

  </body>
</html>
