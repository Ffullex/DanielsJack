<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'layout/Header.php';
if (!isset($_SESSION['login']) || $_SESSION['isAdmin'] == 0) {
    header('Location: /login');
} else {
    ?>
        <form method="post" action="/include/api/upload_api.php">
    <div class='form-row'>
        <label class='label'>
            <i class='material-icons'>attach_file</i>
            <span class='title'>Добавить фото</span>
            <input id='js-file' type='file' name='file[]' multiple accept='.jpg,.jpeg,.png,.gif'>
        </label>
    </div>
            <div class="form-row">
                <button type="submit">Загрузить</button>
            </div>
        </form>
    <div class='img-list' id='js-file-list'></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#js-file').change(function(){
            if (window.FormData === undefined) {
                alert('В вашем браузере загрузка файлов не поддерживается');
            } else {
                var formData = new FormData();
                $.each($('#js-file')[0].files, function(key, input){
                    formData.append('file[]', input);
                });
                $.ajax({
                    type: 'POST',
                    url: 'include/api/upload_photo.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType : 'json',
                    success: function(msg){
                        msg.forEach(function(row) {
                            if (row.error === '') {
                                $('#js-file-list').append(row.data);
                            } else {
                                alert(row.error);
                            }
                        });
                        $('#js-file').val('');
                    }
                });
            }
        });
        /* Удаление загруженной картинки */
        function remove_img(target){
            $(target).parent().remove();
        }
    </script>
    <?php
}
require_once 'layout/Footer.php';
