<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('assets/css/style2.css')}}" />
    <link href="assets/img/index.png" rel="icon">
    <title>Нэвтрэх болон бүртгүүлэх хэсэг</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{url('/login')}}" method="POST" class="sign-in-form">
          @csrf
            <h2 class="title">Нэвтрэх</h2>                                  
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Хэрэглэгчийн и-мэйл" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Нууц үг" />                            
            </div>
            <input type="submit" value="Нэвтрэх" class="btn solid" />
            <p class="social-text">Эсвэл өөрийн сошиал платформоор нэвтэрнэ үү. </p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="{{url('/signup')}}" method="POST" class="sign-up-form">
          @csrf
            <h2 class="title">Бүртгүүлэх</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name='username' placeholder="Хэрэглэгчийн нэр" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name='email' placeholder="И-Мэйл" />               
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name='password' placeholder="Нууц үг" />
            </div>
            <input type="submit" class="btn" value="Бүртгүүлэх" />
            <p class="social-text">Эсвэл өөрийн сошиал платформоор нэвтэрнэ үү</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Бүртгэлгүй бол энд дарна уу.</h3>
            <p>
              Системд нэвтрэхийн тулд бүртгэл хийлгэнэ үү.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Бүртгүүлэх
            </button>
          </div>
          <img src="assets/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Бүртгэлтэй бол энд дарна уу.</h3>
            <p>
              Систэмд бүртгэлтэй платформоороо нэвтэрнэ үү.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Нэвтрэх
            </button>
          </div>
          <img src="assets/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="assets/js/app.js"></script>
  </body>
</html>
