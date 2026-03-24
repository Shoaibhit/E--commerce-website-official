<?php
if(isset($_GET['edit_categorie'])){
    $edit_categorie=$_GET['edit_categorie'];
    
}

?>




<div class="container mt-3">
    <h1 class="text-center">Edit Categorie</h1>
    <form action="" method="post" class="text-center">
         <div class="form-outline mb-4 m-auto w-50">
                <label for="Categorie_title" class="form-label">
                   Categorie_title
                </label>
                <input type="text" name="Categorie_title" id="Categorie_title" class="form-control"   required="required">
            </div>
            <input type="submit" value="Update_categorie"class="btn btn-info px-3 mb-3" >
    </form>
</div>