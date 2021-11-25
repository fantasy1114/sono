<div class="row edit__add__formpage">
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('Key_Name') ? 'has-error' : ''); ?>">
            <label for="Key_Name" class="active font_lable"><?php echo e(trans('keys.Key_Name')); ?></label>
        
            <div class="form-group">
                <input type="text" style="" name="Key_Name" id="Key_Name" value="<?php echo e(old('Key_Name', optional($key)->Key_Name)); ?>" minlength="1" maxlength="64" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('keys.Key_Name__placeholder')); ?>" />
                <?php echo $errors->first('Key_Name', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>

    <?php if(Request::path() == 'keys/create' || Auth::user()->is_superuser == 1): ?>
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('Employee_ID') ? 'has-error' : ''); ?>">
            <label for="Employee_ID" class="active font_lable"><?php echo e(trans('keys.Employee_ID')); ?></label>
        
            <div class="form-group">
                <select class="" id="Employee_ID" name="Employee_ID">
                    <option value="" style="display: none;" <?php echo e(old('Employee_ID', optional($key)->Employee_ID ?: '') == '' ? 'selected' : ''); ?> disabled selected><?php echo e(trans('keys.Employee_ID__placeholder')); ?></option>
                    <?php $__currentLoopData = $Employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkkey => $Employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kkkey); ?>" <?php echo e(old('Employee_ID', optional($key)->Employee_ID) == $kkkey ? 'selected' : ''); ?>>
                            <?php echo e($Employee); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <?php echo $errors->first('Employee_ID', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>
 
    <?php endif; ?>
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('Is_Active') ? 'has-error' : ''); ?>">
            <label for="Is_Active" class="active font_lable"><?php echo e(trans('keys.Is_Active')); ?></label>
            <div class="border-bottom">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" <?php echo e(old('Is_Active', optional($key)->Is_Active) == '1' ? 'checked' : ''); ?> value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                    <label class="custom-control-label" for="customCheck1"><?php echo e(trans('locale.Yes')); ?></label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" <?php echo e(old('Is_Active', optional($key)->Is_Active) != '1' ? 'checked' : ''); ?> value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                    <label class="custom-control-label" for="customCheck2"><?php echo e(trans('locale.No')); ?></label>
                    <input type="hidden" id="default_value" name="Is_Active" value="0">
                </div>
            </div>
            <?php echo $errors->first('Is_Active', '<p class="help-block">:message</p>'); ?>

        </div>
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
<?php /**PATH D:\data\10.30\li\webde\resources\views/keys/form.blade.php ENDPATH**/ ?>