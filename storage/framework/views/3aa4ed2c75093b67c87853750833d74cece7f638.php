<div class="input-field <?php echo e($errors->has('Organisation_Name') ? 'has-error' : ''); ?>">
    <label for="Organisation_Name" class="active font_lable"><?php echo e(trans('organisations.Organisation_Name')); ?></label>
    <div class="form-group">
        <input type="text" style="" name="Organisation_Name" id="Organisation_Name"  value="<?php echo e(old('Organisation_Name', optional($organisation)->Organisation_Name)); ?>" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('organisations.Organisation_Name__placeholder')); ?>" />
        <input name="Login_Token" type="hidden" id="Login_Token" value="<?php echo e(old('Login_Token', optional($organisation)->Login_Token)); ?>">
        <?php echo $errors->first('Organisation_Name', '<p class="help-block">:message</p>'); ?>

    </div>
      
</div>


<script>
    // Script Added by Yuris
    // Adds listener to all defined forms that convert checkbox values from on/off to 1/0
    var forms = document.forms;
    //alert(forms.length);
    for (var f = 0, form; form = forms[f++];) {
        if (form.name.length > 0) {
            //alert(form.name);
            form.addEventListener("submit", function() {
                var elements = this.elements;
                for (var i = 0, element; element = elements[i++];) {
                    if (element.type === 'checkbox' ) {
                        //alert(element.name);
                        if (element.value == 'on') element.value = 1;
                        if (element.value == 'off') element.value = 0;
                    }
                }
            })
        }
    };
    $('#customCheck1').on('click', function(e){
        console.log('1');
        $('#default_value').val('1');
    });
    $('#customCheck2').on('click', function(e){
        $('#default_value').val('0');
        console.log('0');
    });
</script>
<?php /**PATH D:\data\10.30\li\webde\resources\views/organisations/form.blade.php ENDPATH**/ ?>