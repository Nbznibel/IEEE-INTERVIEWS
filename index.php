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
                data-bs-toggle="dropdown" aria-expanded="false"  style='font-size:18px;'>
               <i class='fa fa-user pe-3'> </i><?php echo$_SESSION['sessusername'];?>
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
        <div class="col-6">
          <button onclick='getData(0,addbutton.value)' id='addbutton' value='add' type="button"
            class="btn btn-primary float-end mb-3">Add Interviewee
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
                  <th scope="col">Name</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Facebook/Social account</th>
                  <th scope="col">School</th>
                  <th scope="col">Utilité</th>
                </tr>
              </thead>
              <tbody id='alloffers'>
              </tbody>
            </table>

          </div>
        </div>
      </div>


    </div>
    </div>
  </main>



  <div class="modal" id="offremodal" role="dialog" style='overflow: scroll;'>
    <div class="formdimention modal-dialog d-flex justify-content-center modal-xl">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='flex-direction: row-reverse;'>
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
                        <label for="title color_black">Name :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="name" id="name" minlength="4"
                          required>
                      </div>
                    </div>
                  </div>  
                   
                     <div class="form-group pt-2 pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="title color_black">E-mail :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="email" id="email" minlength="4"
                          required>
                      </div>
                    </div>
                  </div>  
                   <div class="form-group pt-2 pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="title color_black">Phone :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="phone" id="phone" minlength="4"
                          required>
                      </div>
                    </div>
                  </div>
                   <div class="form-group pt-2 pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="title color_black">School :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="school" id="school" minlength="4"
                          required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group pt-2 pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="title color_black">Social :*</label>
                      </div>
                      <div class="col-lg-9">
                        <input type="text" class="textstyle form-control " name="social" id="social" minlength="4"
                          required>
                      </div>
                    </div>
                  </div>
                  

                 
                  <!--<div id='detailsarea1' class="form-group pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2"> <label for="details color_black">Détails:*</label></div>
                      <div class="col-lg-9">
                        <textarea name="details" id="details"></textarea>
                      </div>
                    </div>

                  </div>
                  <div id='detailsarea2' class="form-group pl-1">
                    <div class="row mb-4">
                      <div class="col-lg-2">
                        <label for="details color_black">Détails:*</label>
                      </div>

                      <div id class="col-lg-9">
                        <textarea class="textstyle form-control " minlength="4" name="detailsshow" id="detailsshow"
                          rows="5" disabled></textarea>
                      </div>
                    </div>
                  </div>-->

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

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>



  $(document).ready(function () {
    $('#details').summernote();
    
    setInterval(() => {
      refreshtable();

    }, 1000);
  });

  function refreshtable() {
    $.ajax({
      url: "intervieweestable.php",
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
            text += "<td>" + users[x].phone + "</td>";
            text += "<td style='  white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;'>" + users[x].socials + "</td>";
            text += "<td>" + users[x].school + "</td>";
            text += "<td> <ul class='wrapper'>";
            text += " <li class='icon showw'><span class='tooltip fw-bold'>Détails</span><span value='show' id='showoffrebtn' data-id=" + users[x].id + " onclick=getData(" + users[x].id + ",'show')><i class='fa fa-eye'></i></span></li>";
            text += " <li class='icon update'><span class='tooltip fw-bold'>Modifier</span><span value='update' id='updateoffrebtn' data-id=" + users[x].id + " onclick=getData(" + users[x].id + ",'update') ><i class='fa fa-pencil'></i></span></li>";

            text += " <li class='icon delete'><span class='tooltip fw-bold'>Supprimer</span><span  onclick='deleteoffer(this)' data-id=" + users[x].id + " ><i class='fa fa-trash btn_delete'></i></span></li>";

            text += "</ul>";
            text += "</td>"
            i++;
            text += "</tr>";
          }
          document.getElementById("alloffers").innerHTML = text;
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
    /*$('#editor').froalaEditor('html.set', '');*/
    if (modaltype != 'add') {
      $.ajax({
        url: 'getinfo.php',
        type: 'GET',
        data: {
          id: id
        },
        success: function (response) {
          const info = JSON.parse(response);
          document.getElementById("name").value = info.name;
          document.getElementById("email").value = info.email;
          document.getElementById("phone").value = info.phone;
          document.getElementById("social").value = info.socials;
          document.getElementById("school").value = info.school;
          if (modaltype == 'update') {

            document.getElementById("updateoffrebtnform").value = info.offerid;
            $('#details').summernote('reset');

            $('#details').summernote('pasteHTML', info.details);
            if (info.agence=='oui') {
              $("#posted").prop("checked", true);

            } else {
              $("#posted").prop("checked", false);
            }

          } else if (modaltype == 'show') {
            document.getElementById("detailsshow").value = info.details;
            document.getElementById("buttonplace").innerHTML = "";
            if (info.agence=='oui') {
              $("#posted").prop("checked", true);

            } else {
              $("#posted").prop("checked", false);
            }
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
    modalshow();
    document.getElementById("errormsg").innerHTML = '';

    if (modaltype == 'show') {
      document.getElementById("modaltitle").innerHTML = 'Afficher offre';
      document.getElementById("buttonplace").innerHTML = "";
      document.getElementById("name").setAttribute('disabled', 'disabled');
      document.getElementById("email").setAttribute('disabled', 'disabled');
      document.getElementById("phone").setAttribute('disabled', 'disabled');
      document.getElementById("social").setAttribute('disabled', 'disabled');
      document.getElementById("school").setAttribute('disabled', 'disabled');
     /* document.getElementById("details").setAttribute("hidden", true);
      document.getElementById("detailsshow").removeAttribute("hidden");
      document.getElementById("detailsarea1").setAttribute("hidden", true);
      document.getElementById("detailsarea2").removeAttribute("hidden");

      document.getElementById("date").setAttribute('disabled', 'disabled');
      document.getElementById("posted").setAttribute('disabled', 'disabled');*/

    }
    else {


      document.getElementById("name").removeAttribute('disabled');
      document.getElementById("email").removeAttribute('disabled');
      document.getElementById("phone").removeAttribute('disabled');
      document.getElementById("social").removeAttribute('disabled');
      document.getElementById("school").removeAttribute('disabled');
      /*document.getElementById("details").removeAttribute("hidden");
     document.getElementById("detailsshow").setAttribute("hidden", true);
      document.getElementById("date").removeAttribute('disabled');
      document.getElementById("detailsarea2").setAttribute("hidden", true);
      document.getElementById("detailsarea1").removeAttribute("hidden");*/
      if (modaltype == 'add') {
        document.getElementById("buttonplace").innerHTML = "<button onclick='addoffre()' type='button' id='addoffrebtn' class='btn_envoyer' >Envoyer</button>";
        document.getElementById("modaltitle").innerHTML = 'Ajouter offre';
        document.getElementById("name").value = '';
        document.getElementById("email").value = '';
        document.getElementById("phone").value = '';
        document.getElementById("social").value = '';
        document.getElementById("school").value = '';
  
        $('#details').summernote('reset');
      } else if (modaltype == 'update') {

        document.getElementById("buttonplace").innerHTML = "<button value='' onclick='updateoffre()' type='button' id='updateoffrebtnform' class='btn_envoyer' >Envoyer</button>";
        document.getElementById("modaltitle").innerHTML = 'Modifier offre';

      }
    }
  };



  $('.updateoffrebtn').click(function () {
    const id = jQuery(updateoffrebtn).data('id');


  });

  function addoffre() {
    document.getElementById("errormsg").innerHTML = '';

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const details = document.getElementById('details').value;
    const date = document.getElementById('date').value;
  
    let posted = 'non';
    if ( document.getElementById('posted').checked) {
      posted=document.getElementById('posted').value;
    }
    

    if (title == '') {
      document.getElementById("errormsg").innerHTML = 'titre vide';

    } else if (date == '') {
      document.getElementById("errormsg").innerHTML = 'date vide';

    } else if (description == '') {
      document.getElementById("errormsg").innerHTML = 'description vide ';

    } else if (details == '') {
      document.getElementById("errormsg").innerHTML = 'details vide';

    }
    else {
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
            url: 'addoffer.php',
            type: 'POST',
            data: {
              title: title,
              description: description,
              details: details,
              date: date,
              posted: posted
            },
            success: function (response) {

              modalhide();
              Swal.fire(
                'AJOUTE!',
                'Votre offre a ete modifié .',
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




  function updateoffre() {
    document.getElementById("errormsg").innerHTML = '';
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const details = document.getElementById('details').value;
    const id = document.getElementById('updateoffrebtnform').value;
    const date = document.getElementById('date').value;
     let posted = 'non';
    if ( document.getElementById('posted').checked) {
      posted=document.getElementById('posted').value;
    }
    

    if (title == '') {
      document.getElementById("errormsg").innerHTML = 'titre vide';

    } else if (date == '') {
      document.getElementById("errormsg").innerHTML = 'date vide';

    } else if (description == '') {
      document.getElementById("errormsg").innerHTML = 'description vide ';

    } else if (details == '') {
      document.getElementById("errormsg").innerHTML = 'details vide';

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
            url: 'updateoffer.php',
            type: 'POST',
            data: {
              id: id,
              date: date,
              title: title,
              description: description,
              details: details,
              posted: posted
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




  function deleteoffer(btn) {
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
          url: 'deleteinterviewee.php',
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