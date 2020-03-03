  <!-- Bibliotecas JS -->
  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
  <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
  <script src="node_modules/lax.js/lib/lax.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


  <!-- Arquivo JS -->
  <script src="js/index.js"></script>

  <script>
      $(document).ready(function() {
        $('input.autocomplete').autocomplete({
          data: {
            <?php

            require_once 'conexao.php';

            $query = "SELECT nomeCategoria FROM categoria";
            $categoria = mysqli_query($conexao, $query);
            while ($lista = mysqli_fetch_array($categoria)) {
              echo '"' . $lista['nomeCategoria'] . '": null,';
            }
            ?>
          },
        });
      });
  </script>

  </body>

  </html>