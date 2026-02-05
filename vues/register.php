<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="background-color:#2E2A2A">
  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div>
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/toile2.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-white" style="background-color:#181818; border-radius: 0 1rem 1rem 0;">

                <form class="FormItems" action="../index.php?action=register" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1 signUpTop">
                    <img src="images/logoMini.png" class="logoForm"/>
                    <span class="h1 fw-bold mb-0">SIGN UP</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Veuillez remplir les formulaires ci-dessous</h5>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" class="form-control form-control-lg" name="email" />
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" class="form-control form-control-lg" name="username"/>
                    
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="verifPassword">Veuillez retaper votre mot de passe </label>
                    <input type="password" id="verifPassword" class="form-control form-control-lg" />
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="register">Sign up</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>