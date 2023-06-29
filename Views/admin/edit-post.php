<!DOCTYPE html>
<?php
$config = array();

$config["apiKey"] = "fgbb8a8eke3zhpgp1kd717aq9vvrhh4e21cup6gn92llj1z6";

?>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=11', initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style-admin.css">

  <style>

  </style>
</head>

<body>
  <div class="container-1">
  <?php
    require_once dirname(__FILE__) . "/../_partials/_sidebar.php";
    ?>
    <div class="main">
      <h2>Editar Post</h2>
      <form action="?action=update" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" value="<?php echo $post['title'] ?>" name="title" placeholder="Digite o título do post">
        <input type="hidden" id="id" value="<?php echo $post['id'] ?>" name="id">

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" value="<?php echo $post['category_id'] ?>">
          <option disabled >Selecione uma categoria</option>
          <?php foreach ($categories as $categoria) : ?>
            <option value="<?= $categoria['id'] ?>"><?= $categoria['name'] ?></option>
          <?php endforeach; ?>
        </select>
        <label for="titulo">Trecho:</label>
        <textarea name="excerpt" id="trecho"  cols="30" rows="7"><?php echo $post['excerpt'] ?></textarea>
        <label for="imagem">Imagem:</label>
        <label class="input-preview" for="img" style="background-image: url(uploads/<?php echo $post['image'] ?>);">
        
          <input   name="image_path" value="<?php echo $post['image'] ?>"  type="hidden">

          <input class="input-preview__src"  name="image" id="img" type="file">
        </label>

        <label for="conteudo">Conteúdo:</label>
        <textarea name="content" id="conteudo" cols="30" rows="10"><?php echo $post['content'] ?></textarea>

        <input type="submit" value="Publicar">
      </form>
    </div>

  </div>
  <?php
    require_once dirname(__FILE__) . "/../_partials/_footer.php";
    ?>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script> -->



  <script src="../js/menu_navbar.js"></script>
  <script src="https://cloud.tinymce.com/6/tinymce.min.js?apiKey=<?php echo $config["apiKey"]; ?>"></script>
  <script>
    tinymce.init({
      selector: "textarea#conteudo",
      plugins: "powerpaste casechange searchreplace autolink directionality advcode visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave",
      toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat",
      height: "700px",
    });

    const fileImage = document.querySelector('.input-preview__src');
    const filePreview = document.querySelector('.input-preview');

    fileImage.onchange = function() {
      const reader = new FileReader();

      reader.onload = function(e) {
        // get loaded data and render thumbnail.
        filePreview.style.backgroundImage = "url(" + e.target.result + ")";
        filePreview.classList.add("has-image");
      };

      // read the image file as a data URL.
      reader.readAsDataURL(this.files[0]);
    };
  </script>
</body>

</html>