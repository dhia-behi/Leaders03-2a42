<?php
// Include the necessary files
include_once "../model/reponse.php";
include_once "../controller/reponseC.php";

$id = $_GET['id'];
$reponseC= new reponseC();
$currentreponse = $reponseC->findreponse($id);
$idrec = $currentreponse['idreclamation'];
if (
    isset($_POST["email"])
) {
    if (
        !empty($_POST["email"])
        
    ) {
        $reponse = new reponse(
            $_POST['idreclamation'],
			$_POST['email'],
			$_POST['nom'],
			$_POST['reponse'],
		);
        $reponseC->updatereponse($reponse,$id,$idrec);
        header('Location:afficher.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Ajouter Réponse</title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header id="header" id="home">
        <!-- Header content goes here -->
    </header><!-- #header -->

    <!-- Start banner Area -->
    <section class="banner-area relative" id="home">
        <!-- Banner content goes here -->
    </section><!-- End banner Area -->

    <!-- Start Form Section -->
    <section class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Ajouter Réponse</h2>
                    <form method="POST">
                        <input type="hidden" name="idReclamation" value="<?= $currentreponse['idreclamation']?>"> <!-- Replace '1' with the actual ID of the reclamation -->
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" value="<?= $currentreponse['email']?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" placeholder="Your Name" value="<?= $currentreponse['nom']?>" required>
                        </div>
                        <div class="form-group">
    <textarea class="form-control" name="reponse" placeholder="Your Response" rows="5" required><?= $currentreponse['reponse'] ?></textarea>
</div>  
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form Section -->

    <!-- JavaScript -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
							let myForm = document.getElementById('Form')
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('nom')
								let myRegex = /^[a-zA-Z\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("categorie Obligatoire");
									e.preventDefault();
								}else if (myRegex.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect categorie !");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('email')
								let myRegex = /^[a-zA-Z1-9@.\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("titre Obligatoire");
									e.preventDefault();
								}else if (myRegex.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect titre !");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('reponse')
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("message Obligatoire");
									e.preventDefault();
								}
							});
						</script>
</body>
</html>
<?php
?>
