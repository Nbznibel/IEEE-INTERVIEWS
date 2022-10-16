<?php
session_start();
include 'baseconnect.php';
if(  empty($_SESSION['sessuser']) ){header('Location:login.php');} 
  else
 {
header('Content-Type: text/html; charset=utf-8');
        ?>
<html lang="fr">

<head>
  <meta HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="assets/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
  <title>IEEE HR </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets\css\style.css" />


  <style>
    body {
      font-family: "Karla", sans-serif;
      background-image: url("./assets/images/bg.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: inherit;
      font-size: 18px;
      padding-bottom: 75px;
    }
  </style>
</head>

<body class="min-vh-100  flex-column">
  <header>
    <div class="container">
      <div class='row'>
        <div class='col-6 pt-5 pb-5'>

          <nav class=" bg-transparenet">
            
          </nav>
        </div>
        <div class='col-6 pt-5 pb-5'>
          <nav class=" float-end  bg-transparenet">
            <div class="dropdown ">
              <button class="btn btn-col dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false" style='font-size:18px;'>
                <i class='fa fa-user pe-3'> </i><?php echo$_SESSION['sessusername'];?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <form action="logout.php" method="post" class="">
                    <fieldset>
                      <div class="form-actions form-group">
                        <a href='index.php' type="submit" class="dropdown-item">Iterviewees</a>

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
    <div class="container p-5 mt-5">
      <div class="row">
        <div class="col-6">
          <h1>HR MANAGERS</h1>
        </div>
        <div class="col-6">
          <button onclick='getData(0,addbutton.value)' id='addbutton' value='add' type="button"
            class="btn btn-primary btn-lg float-end mb-3" data-toggle="modal" data-target="#offremodal">Aadd Manager
          </button>

        </div>
      </div>
      <div class="card" style='opacity:0.9;'>
        <div class="card-body">
          <div class="bg-white d-flex justify-content-center " style="height: 400px; overflow: auto">
            <table class="table y-scroll">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Utilité</th>
                </tr>
              </thead>
              <tbody id='allusers'>
              </tbody>
            </table>

          </div>
        </div>
      </div>


    </div>
    </div>
  </main>



  <div class="modal  " id="offremodal" role="dialog">
    <div class="formdimention modal-dialog d-flex justify-content-center modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button onclick='modalhide()' type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="container ">
            <div class="row my-2 mx-2">
              <div class="col-md-12 ">
                <h1 id='modaltitle' class="form-title d-flex justify-content-center fw-bold mb-5 "></h1>
                <div class='form_style '>
                  <div class="form-group pt-2 pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="name color_black">Name :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="name" id="name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2"><label for="email color_black">email:*</label></div>
                      <div class="col-lg-9"> <input type="Email" class="textstyle form-control " name="email"
                          id="email"></div>
                    </div>
                  </div>
                  <div class="form-group pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2"> <label for="password color_black">Mot de pass:</label></div>
                      <div class="col-lg-9"><input type="password" class="textstyle form-control " name="password"
                          id="password"></input></div>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">

                    <div id='buttonplace' class="mt-5 d-flex justify-content-center ">


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
        </div>
        <div class="modal-footer">
          <button onclick='modalhide()' type="button" class="btn_model btn btn-default"
            data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.all.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>


  var patternname = new RegExp("^\s*^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$");
  var patternmail = new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$");

  $(document).ready(function () {
    refreshtable();
    setInterval(() => {
    }, 1000);
  });

  function refreshtable() {
    $.ajax({
      url: "userstable.php",
      metode: "GET",
      datatype: "JSON",
      success: function (response) {

        const resp = JSON.parse(response);
        if (resp.error) {
          console.log('error');
        } else {
          const users = resp.data;

          let text = "<tr>";
          let i = 1;

          for (let x in users) {
            text += "<td>" + i + "</td>";
            text += "<td>" + users[x].name + "</td>";
            text += "<td>" + users[x].email + "</td>";

            
            text += "<td> <ul class='wrapper'>";
            text += " <li  class='icon showw'><span class='tooltip fw-bold'>Détails</span><span value='show' id='showoffrebtn' data-id=" + users[x].userid + " onclick=getData(" + users[x].userid + ",'show')><i class='fa fa-eye'></i></span></li>";
            text += " <li  class='icon update'><span class='tooltip fw-bold'>Modifier</span><span value='update' id='updateoffrebtn' data-id=" + users[x].userid + " onclick=getData(" + users[x].userid + ",'update') ><i class='fa fa-pencil'></i></span></li>";

            text += " <li  class='icon delete'><span class='tooltip fw-bold'>Supprimer</span><span  onclick='deleteuser(this)' data-id=" + users[x].userid + " ><i class='fa fa-trash btn_delete'></i></span></li>";

            text += "</ul>";
           
            text += "</td>"
            i++;
            text += "</tr>";
          }
          document.getElementById("allusers").innerHTML = text;
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  };


  ///*/
  function getData(id, modaltype) {


    openmodal(modaltype);
    if (modaltype != 'add') {
      $.ajax({
        url: 'getuser.php',
        type: 'GET',
        data: {
          id: id
        },
        success: function (response) {

          const info = JSON.parse(response);
          document.getElementById("name").value = info.name;
          document.getElementById("email").value = info.email;
          document.getElementById("password").value = '';
          if (modaltype == 'update') {
            document.getElementById("updateoffrebtnform").value = info.userid;
          } else if (modaltype == 'show') {
            document.getElementById("buttonplace").innerHTML = "";
            document.getElementById("password").value = info.password;


          }

          modalshow();
        },
        fail: function (error) {
          console.log(error);
        }
      });
    }
  }
  function openmodal(modaltype) {
    document.getElementById("errormsg").innerHTML = '';

    if (modaltype == 'show') {
      document.getElementById("modaltitle").innerHTML = 'Afficher utilisateur';
      document.getElementById("buttonplace").innerHTML = "";
      document.getElementById("name").setAttribute('disabled', 'disabled');
      document.getElementById("email").setAttribute('disabled', 'disabled');
      document.getElementById("password").setAttribute('disabled', 'disabled');

    }
    else {
      document.getElementById("name").removeAttribute('disabled');
      document.getElementById("email").removeAttribute('disabled');
      document.getElementById("password").removeAttribute('disabled');
      if (modaltype == 'add') {


        document.getElementById("buttonplace").innerHTML = "<button onclick='adduser()' type='button' id='addoffrebtn' class='btn_envoyer' >Envoyer</button>";
        document.getElementById("modaltitle").innerHTML = 'Ajouter utilisateur';
        document.getElementById("name").value = '';
        document.getElementById("email").value = '';
        document.getElementById("password").value = '';

      } else if (modaltype == 'update') {

        document.getElementById("buttonplace").innerHTML = "<button value='' onclick='updateuser()' type='button' id='updateoffrebtnform' class='btn_envoyer' >Envoyer</button>";
        document.getElementById("modaltitle").innerHTML = 'Modifier utilisateur';

      }
    }
  };



  $('.updateoffrebtn').click(function () {
    var  id = jQuery(updateoffrebtn).data('id');


  });

  function adduser() {
    document.getElementById("errormsg").innerHTML = '';

    const name = document.getElementById('name').value;

    const email = document.getElementById('email').value;

    const password = document.getElementById('password').value;

    if (name == '') {
      document.getElementById("errormsg").innerHTML = 'nom vide';

    } else if (email == '') {
      document.getElementById("errormsg").innerHTML = 'email vide ';

    } else if (password == '') {
      document.getElementById("errormsg").innerHTML = 'mot de pass vide';

    } else {
      if (!patternname.test(name)) {
        document.getElementById("errormsg").innerHTML = 'nom invalid';

      } else if (!patternmail.test(email)) {
        document.getElementById("errormsg").innerHTML = 'email invalid ';

      } else if (password.length < 8) {
        document.getElementById("errormsg").innerHTML = 'mot de pass invalid';

      } else {
        Swal.fire({
          title: 'Etes Vous Sur ?',
          text: "Cette action est irreversible!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmer       !'
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              url: 'adduser.php',
              type: 'POST',
              data: {
                name: name,
                email: email,
                password: password
              },
              success: function (response) {
                Swal.fire(
              'AJOUTE!',
              'Votre offre a ete modifié .',
              'success',
              modalhide()
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
    };}
    function updateuser() {
      document.getElementById("errormsg").innerHTML = '';
      const name = document.getElementById('name').value;

      const email = document.getElementById('email').value;

      const password = document.getElementById('password').value;

      const id = document.getElementById('updateoffrebtnform').value;

      if (name == '') {
        document.getElementById("errormsg").innerHTML = 'nom vide';

      } else if (email == '') {
        document.getElementById("errormsg").innerHTML = 'email vide ';

      } else {
        if (!patternname.test(name)) {
          document.getElementById("errormsg").innerHTML = 'nom invalid';

        } else if (!patternmail.test(email)) {
          document.getElementById("errormsg").innerHTML = 'email invalid ';

        } else if (password.length > 0 && password.length < 8) {
          document.getElementById("errormsg").innerHTML = 'mot de pass invalid';

        } else {
          Swal.fire({
            title: 'Etes Vous Sur ?',
            text: "Cette action est irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmer       !'
          }).then((result) => {
            if (result.isConfirmed) {

              $.ajax({
                url: 'updateuser.php',
                type: 'POST',
                data: {
                  id: id,
                  name: name,
                  email: email,
                  password: password
                },
                success: function (response) {
                Swal.fire(
                'MODIFIE!',
                'Votre offre a ete modifié .',
                'success',
                modalhide()
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
    }


      function deleteuser(btn) {
        const id = jQuery(btn).data('id');

        Swal.fire({
          title: 'Etes Vous Sur ?',
          text: "Cette action est irreversible!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmer       !'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'deleteuser.php',
              type: 'GET',
              data: {
                id: id
              },
              success: function (response) {
               


              },
              fail: function (error) {
                console.log(error);


              }
            });

            /**/
            Swal.fire(
              'SUPPRIME!',
              'Votre offre a ete supprimé.',
              'success'
            )
          }
        })
      }
      function modalshow() {
    $('#offremodal').show();

  };
  function modalhide() {
    $('#offremodal').hide();

  };
    
</script>

</html>
<?php
}
?>