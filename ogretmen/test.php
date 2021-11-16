

<?php 
   require_once("dizi.php");
   require_once("db.php");  
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>soru Ekleme Çıkarma</title>
      <link rel="stylesheet" href="css/sorular.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   </head>
   <body>
      <form action="" method="POST">
         <div class="modal fade" id="soruekle" tabindex="-1" aria-labelledby="exampleModalLabel" 				aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h3 class="modal-title" id="exampleModalLabel">
                        <p class="fw-bold fs-5"><i class="fas fa-question"></i></p>
                     </h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="input-group">
                           <span class="input-group-text bg-dark text-white">1. soru</span>
                           <textarea id="soru_metni" name="soru_metni" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="input-group mt-2">
                              <span class="input-group-text bg-warning text-white">1. şık</span>
                              <textarea class="form-control" aria-label="With textarea"></textarea>
                           </div>
                        </div>
                        <div class="col">
                           <div class="input-group mt-2">
                              <span class="input-group-text bg-warning text-white">2. şık</span>
                              <textarea class="form-control" aria-label="With textarea"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row pt-1">
                        <div class="col">
                           <div class="input-group">
                              <span class="input-group-text bg-warning text-white">3. şık</span>
                              <textarea class="form-control" aria-label="With textarea"></textarea>
                           </div>
                        </div>
                        <div class="col">
                           <div class="input-group">
                              <span class="input-group-text bg-warning text-white">4. şık</span>
                              <textarea class="form-control" aria-label="With textarea"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="input-group mt-2 mb-2">
                        <label class="input-group-text bg-success" for="inputGroupSelect01"><i class="fas fa-check-circle"></i></label>
                        <select class="form-select" id="inputGroupSelect01">
                           <option selected>Doğru Cevap</option>
                           <option value="1">1. şık</option>
                           <option value="2">2. şık</option>
                           <option value="3">3. şık</option>
                           <option value="4">4. şık</option>
                        </select>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                     <button type="button" class="btn btn-success">Kaydet</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <div class="container">
         <div class="jumbotron">
            <div class="card bg-dark">
               <h2 class="py-2 text-light text-center"><i class="fas fa-question"></i>  Soru Ekleme Çıkarma</h2>
            </div>
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-center">
                     <form action="" method="post" class="w-50">
                        <select class="form-select" aria-label="Default select example">
                           <option selected>Sınav listesi</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                        <div class="row pt-2">
                           <div class="col">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#soruekle">
                              Soru Ekle
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="ckeditor5/ckeditor.js"></script>
      <script type="text/javascript" src="script/soru.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>

