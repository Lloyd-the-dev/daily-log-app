<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily logging | 2023</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1 class="heading">Daily Log</h1>
     <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOGIN</h2>
                    <form method="POST" action="login.php">
                        <input type="email" placeholder="Your email" required class="input-box loginBox" name="email" id="createAcc" style="display: block">
                        <input type="password" placeholder="Your Password" required class="input-box loginBox" name="password" id="createAcc" style="display: block">
                        <button type="submit" class="submit-btn" name="submit">Submit</button>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm new here</button>    
                </div>
                <div class="card-back">
                    <h2>CREATE ACCOUNT</h2>
                    <form method="POST" action="form.php" id="signup">
                        <div class="form-item loginBox">
                            <input type="text" placeholder="Your First Name" required class="input-box" id="createAcc" name="firstName">
                            <input type="text" placeholder="Your Last Name" required class="input-box" id="createAcc" name="lastName">    
                        </div>
                        <div class="form-item loginBox">
                            <input type="email" placeholder="Your email" required class="input-box" id="createAcc" name="email">
                            <input type="text" placeholder="Your phone number" required class="input-box" id="createAcc" name="phoneNumber">
                        </div>
                        <div class="form-item loginBox">
                            <input type="text" placeholder="Your Address" required class="input-box" id="createAcc" name="address">
                            <input type="text" placeholder="Your Country" required class="input-box" id="createAcc" name="country">
                        </div>
                        <div class="form-item">
                            <input type="password" placeholder="Your Password" required class="input-box" name="password" id="createAcc">
                            <input type="password" placeholder="Confirm your Password" required class="input-box" name="confirmPassword" id="createAcc">
                        </div>
                        <div  style="color: red;"></div>
                       
                        <button type="submit" class="submit-btn" name="submit">Submit</button>
                        
                    </form>
                    <button type="button" class="btn" onclick="openLogin()" id="sub">I have an account</button>
                </div>

            </div>
        </div>
     </div>
     
     <script src="./index.js"></script>
    

</body>
</html>