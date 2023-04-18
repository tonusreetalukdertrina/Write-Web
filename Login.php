<!DOCTYPE html>
<html>
    <style>
        .login {
        height: 100vh;
        background-color: rgb(193, 190, 255);
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }
  
    .card {
      width: 50%;
      display: flex;
      background-color: white;
      border-radius: 10px;
      min-height: 600px;
      overflow: hidden;
    }
  
    .left {
        flex: 1;
        background: linear-gradient(rgba(39, 11, 96, 0.5), rgba(39, 11, 96, 0.5)),
            url("https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/210408290/original/15d4ae61dd7031089525ca5b339f850714877f87/design-a-well-structured-and-aesthetic-website-mobile-ui-ux.png")
            center;
        background-size: cover;
        padding: 3px;
        display: flex;
        flex-direction: column;
        gap: 30px;
        color: white;
    }
  
    h1 {
        font-size: 60px;
        line-height: 60px;
    }
        
    p {
        font-weight: bold;
        color: white;
        font-size: 16px;
    }
  
    span {
        font-size: 14px;
    }
        
    button {
        width: 50%;
        padding: 10px;
        border: none;
        background-color: white;
        color: rebeccapurple;
        font-weight: bold;
        cursor: pointer;
    }
  
    .right {
        flex: 1;
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 50px;
        justify-content: center;
    }
        
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
          
    input {
        border: none;
        border-bottom: 1px solid lightgray;
        padding: 20px 10px;
    }
          
    button {
    width: 50%;
    padding: 10px;
    border: none;
    background-color: #938eef;
    color: white;
    font-weight: bold;
    cursor: pointer;
    }
    </style>

    <body>
    <div class="login">
      <div class="card">
        <div class="left">
          <h1>Write Web</h1>
          <p>
            Hello world!!!
            <br/>
            Welcome to the world of writers.
          </p>
          <span>Don't you have an account?</span>
          <button><a href="Registration.php">Register</a></button>
        </div>
        <div class="right">
          <h1>Login</h1>
          <form action="Authentication.php" method="POST">
            <label>Email</label>
            <input required type="text" placeholder="Enter Your Email Address" name="email" />
            <label>Password</label>
            <input required type="password" placeholder="Enter Your Password" name="password" />
            <button type="submit">Log In</button>
          </form>
        </div>
      </div>
    </div>

    </body>
</html>