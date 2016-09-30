<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIAM KNOWLEDGE</title>

    <link rel="stylesheet" href="assets/login.css">
    <link rel="stylesheet" href="assets/reset.css">


  </head>
  <body>

  <div class="login">
    <a href="#">
    <div class="register-button">
      <h4>ไม่ได้เป็นสมาชิก ?</h4>
      <h1>สมัครเรียน</h1>
      <span class="ion-ios-arrow-right"></span>
    </div>
  </a>
    <div class="hero">
      <span class="blub"></span>
      <h1>SIAM</h1>
      <h2>KNOWLEDGE</h2>
      <form action='' method="post">
      <!--- [if - wrong password]
      <p>ขออภัย ไม่มีชื่อผู้ใช้งานในระบบ หรือรหัสผ่านไม่ถูกต้อง</p>
      ------>
      <input class="enterplace user"  placeholder="ชื่อผู้ใช้งาน" name='email' type="text"></input><br/>
      <input class="enterplace pass"  name='password' placeholder="รหัสผ่าน" type="password"></input></br>
      {{ csrf_field() }}
      <input class="sign-in-button" type="submit" value="ลงชื่อเข้าใช้"><br/>
      </form>
      <p><a class="forgot" href="#">ลืมรหัสผ่าน</a></p>
    </div>
  </div>

  </body>
</html>
