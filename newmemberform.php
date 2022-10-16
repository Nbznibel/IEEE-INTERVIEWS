<?php
session_start();
include 'baseconnect.php';
if(  empty($_SESSION['sessuser']) ){header('Location: login.php');} 
  else
 {
header('Content-Type: text/html; charset=utf8mb4');
        ?>
<html lang="fr">

<head>
    <meta HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="assets/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <title>IEEE INTREVIWES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets\css\style.css" />


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Karla", sans-serif;
            background-image: url("./assets/images/bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: inherit;
            font-size: 18px;
            padding-bottom: 75px;
            overflow: hidden;

        }
    </style>
</head>

<body class="min-vh-100  flex-column">
    <header>
        <div class="container">
            <div class='row'>
                <div class='col-6 pt-2'>

                    <nav class="navbar navbar-dark bg-transparenet">

                    </nav>
                </div>
                <div class='col-6 pt-5'>
                    <nav class=" float-end navbar navbar-dark bg-transparenet">
                        <div class="dropdown ">
                            <button class="btn btn-col dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false" style='font-size:18px;'>
                                <i class='fa fa-user pe-3'> </i>
                                <?php echo$_SESSION['sessusername'];?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <form action="logout.php" method="post" class="">
                                        <fieldset>
                                            <div class="form-actions form-group">
                                                <a href='users.php' type="submit" class="dropdown-item">Hr Officers</a>
                                                <button type="submit" class="dropdown-item">Deconnection</button>
                                                <div>
                                        </fieldset>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="my-auto">
        <div class="container p-5">
            <div class="row">
                <div class="col-6">
                    <h1>Interviewees</h1>
                </div>
                
            </div>
            <div class="card" style='opacity:0.9;'>
                <div class="card-body">
                    <div class="bg-white d-flex justify-content-center " style="height: 400px; overflow: auto">
                        <form class='form_style ' action="" method="post">
                            <div class="container ">
                                <div class="row my-2 mx-2">
                                    <div class="col-md-12 ">
                                        <h1 id='modaltitle'
                                            class="form-title d-flex justify-content-center fw-bold mb-5 "></h1>
                                        <div class='form_style '>
                                            <div class="form-group pt-2 pl-1">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2">
                                                        <label for="title color_black">Name :*</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="textstyle form-control " name="name"
                                                            id="name" minlength="4" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group pl-1">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2"><label for="Date color_black">Email:*</label>
                                                    </div>
                                                    <div class="col-lg-9"> <input minlength="4" type="Email"
                                                            class="textstyle form-control " name="email" id="email"
                                                            required></div>
                                                </div>
                                            </div>


                                            <div class="form-group pl-1">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2"><label for="description color_black"> Phone
                                                            Number:*</label></div>
                                                    <div class="col-lg-9"> <input minlength="4" type="number"
                                                            class="textstyle form-control " name="phone" id="phone"
                                                            required></div>
                                                </div>
                                            </div>
                                            <div class="form-group pl-1">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2"><label for="description color_black">
                                                            School:*</label></div>
                                                    <div class="col-lg-9"> <input minlength="4" type="text"
                                                            class="textstyle form-control " name="school" id="school"
                                                            required></div>
                                                </div>
                                            </div>
                                            <div id='detailsarea1' class="form-group pl-1">
                                                <div class="row mb-4">
                                                    <div class="col-lg-2"> <label
                                                            for="details color_black">Social Media:*</label></div>
                                                    <div class="col-lg-9">
                                                        <textarea name="social" id="social"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row d-flex justify-content-center">

                                                <div id='buttonplace' class="mt-5 d-flex justify-content-center ">

                                                   
                                                        <button onclick='addmember()' id='addbutton' value='add' type="button"
                                                            class="btn btn-primary float-end mb-3">Add Interviewee
                                                        </button>


                                                </div>
                                                <div id='errormsg' class="mt-5 d-flex justify-content-center ">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>



    $(document).ready(function () {
        $('#social').summernote();
    });

   function addmember() {
    document.getElementById("errormsg").innerHTML = '';

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const school = document.getElementById('school').value;
    const social = document.getElementById('social').value;

  
    if (name == '') {
      document.getElementById("errormsg").innerHTML = 'titre vide';

    } else if (email == '') {
      document.getElementById("errormsg").innerHTML = 'date vide';

    } else if (phone == '') {
      document.getElementById("errormsg").innerHTML = 'description vide ';

    } else if (school == '') {
      document.getElementById("errormsg").innerHTML = 'details vide';

    }else if (school == '') {
      document.getElementById("errormsg").innerHTML = 'details vide';

    }
    else {
      Swal.fire({
        title: 'are you sure?',
        text: "please verify all your info before proceeding!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmer       !'
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            url: 'addmember.php',
            type: 'POST',
            data: {
              name: name,
              email: email,
              phone: phone,
              school: school,
              social: social
            },
            success: function (response) {

             
              Swal.fire(
                'SENT!',
                'your responce have been sent.',
                'success',
              )
            },
            fail: function (error) {
              console.log(error);
            }
          });
          /**/
        }
      })
    }
  };

   
    



    




</script>

</html>
<?php
}
?>