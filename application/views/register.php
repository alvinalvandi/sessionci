<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Particle JS</title>
    <style media="screen">
    #particles-js{
      background-image: url(<?php echo base_url('assets/images/'); ?>images.jpg);
      background-repeat: round;
      height: 100vh;
    }
    body {
      width: 100%;
      font: normal 16px Arial, Helvetica, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    #login {
      background: #fff;
      opacity: 0.9;
      padding: 2em;
      position: absolute;
      top: 200px;
      left: 150px;
    }
    #login h3 {
      color: #555555;
    }
    #login input[type="text"], #login input[type="password"] {
      padding: 7px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }
    #login input[type="submit"] {
      padding: 7px;
      background: rgb(5, 200, 118);
      color: #fff;
      border: none;
      opacity: 1;
      display: block;
      float: right;
    }
    </style>
  </head>
  <body>
    <div id="particles-js">
      <div id="login">
        <h3>Register</h3>
        <form  method="post" action="<?php echo base_url();?>index.php/warkop/input_daftar">
          <div>
            <input type="hidden" name="id_user">
            <label for="username">Username</label><br>
            <input type="text" name="username" placeholder="Username" required>
          </div>
 
          <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          
          <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" placeholder="Email" required>
          </div>
             
          <div>
            <p>Jabatan</p>  
            <select for="jabatan" name="jabatan">
                <option value="0">Super Admin</option>
                <option value="1">Manager</option>
                <option value="2">Employee</option>
            </select><br>
          </div>
 
          <input type="submit" name="" value="Register">
        </form>
      </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      particlesJS.load('particles-js','particles.json', function() {
        console.log('particles.json loaded...');
      })
    </script>
  </body>
</html>