
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
<div class="login-container">

<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
					</div>
					<div class="card shadow-lg" style="background-color:#1D1D1D; height:120%; border-radius:20px;">
						<div class="card-body p-5">
						
        					<button type="button" class="close" aria-label="Close" id="closeLoginCard">
            					<span aria-hidden="true">&times;</span>
        					</button>
							<h1 class="loginTitle">LOGIN</h1>
							<form method="POST" action="../index.php?action=login" class="needs-validation" novalidate="" autocomplete="off">
								<div class="inputLogin">	
									<label class="mb-2 text-muted" for="email">Adresse email</label>
                  <br>
									<input id="email" type="email" class="infos" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										L'email est requis
									</div>
								</div>

								<div class="inputLogin">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password" name="password">Mot de passe</label>
									</div>
									<input id="password" type="password" class="infos" name="password" required>
                  <br>
                  <a href="forgot.html" class="forgot">
											Mot de passe oublié?
										</a>
								    <div class="invalid-feedback">
								    	Le mot de passe est requis
							    	</div>
								</div>

									<div class="remember">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Se souvenir de moi</label>
									</div>
									<button type="submit" class="btn btn-primary loginButton" name="login">
										Login
									</button>
								
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center dontHaveAccount" style="position:absolute;top: 93%; left:20%; color:white;">
								Don't have an account? <a href="register.php" class="">Create One</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
</body>
</html>