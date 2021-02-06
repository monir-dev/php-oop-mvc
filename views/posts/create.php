<script src="https://cdn.tiny.cloud/1/mhawumz0vd0asge65q0jkld1r24hf19uem496splgjwx9yl7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

<?php
/** @var $model \app\monirdev\phpcore\Model */

use app\monirdev\phpcore\form\Form;

$form = new Form();
?>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'title') ?>
    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image" value="">
        <div class="invalid-feedback">

        </div>
    </div>

    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" id="body" cols="30" rows="20" class="form-control"></textarea>
        <div class="invalid-feedback">

        </div>
    </div>

    <button class="btn btn-success">Submit</button>
<?php Form::end() ?>