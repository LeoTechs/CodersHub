
    <body>
      <?php  ?>
        <div class="container">
             <div class="form-div">
              <form action="code_zone.php" method="post" enctype="multipart/form-data">
               <h3 class="text-center">Uploader un Code sur Coder's Hub</h3>
                 </br>
               <div class="form-group text-center">
                <input type="hidden" name="file" value="MAX_FILE_SIZE">
                <img src="./assets/img/add_code_default.png" id="add_code_default" onclick="triggerClick()">
                <label for="code_import"><strong><em>Importez le code a publier</em> </strong> (Archives uniquement!)</label>
                <input type="file" id="code_import"name="code_import" class="form-control" style="display: none" onchange="displayImage(this)" accept=".zip,.rar,.kz,.iso,.img,.bin"> 
              </div>
              <div class="form-group">

               <label for="code_name">Entrez un nom pour votre code(*20 Caracteres max)</label>

               <input type="text" name="code_name" class="form-control">
             </div>
             <div class="form-group">
              <label for="code_description">Entrez une description pour votre code</label>
              <textarea name="code_description" class="form-control"></textarea>
            </div>
            <div class="form-group">
             <button type="submit" name="publish" class="btn btn-primary btn-block">Publier le code</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
<script type="text/javascript" src="assets/javascript/script.js"></script>
</body>
</html>