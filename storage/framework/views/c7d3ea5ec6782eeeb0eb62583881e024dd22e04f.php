<!-- Customized by Yuris -->
<div class="row py-2">
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <label for="name" class="active font_lable"><?php echo e(trans('managers.name')); ?></label>
            <div class="form-group">
                <input type="text" style="" name="name" id="name" value="<?php echo e(old('name', optional($manager)->name)); ?>" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('managers.name__placeholder')); ?>" />
                <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <label for="email" class="active font_lable"><?php echo e(trans('managers.email')); ?></label>
            <div class="form-group">
                <input type="email" style="" name="email" id="email" value="<?php echo e(old('email', optional($manager)->email)); ?>" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('managers.email__placeholder')); ?>" />
                <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('organisation_id') ? 'has-error' : ''); ?>">
            <label for="organisation_id" class="active font_lable"><?php echo e(trans('managers.organisation_id')); ?></label>
            <select class="" id="organisation_id" name="organisation_id">
                <option value="" style="display: none;" <?php echo e(old('organisation_id', optional($manager)->organisation_id ?: '') == '' ? 'selected' : ''); ?> disabled selected><?php echo e(trans('managers.organisation_id__placeholder')); ?></option>
                <?php $__currentLoopData = $Organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkkey => $Organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kkkey); ?>" <?php echo e(old('organisation_id', optional($manager)->organisation_id) == $kkkey ? 'selected' : ''); ?>>
                        <?php echo e($Organisation); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        
            <?php echo $errors->first('organisation_id', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

    
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <label for="password" class="active font_lable"><?php echo e(trans('managers.password')); ?></label>
            <div class="form-group">
                <input type="password" style="" name="password" id="password" value="<?php echo e(old('password', optional($manager)->password)); ?>" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('managers.password__placeholder')); ?>" autocomplete="new-password"/>
                <input class="" name="ptkn" type="hidden" id="ptkn" value="<?php echo e(optional($manager)->password); ?>">
                <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
            <label for="phone" class="active font_lable"><?php echo e(trans('managers.phone')); ?></label>
            <div class="form-group">
                <input type="phone" style="" name="phone" id="phone" value="<?php echo e(old('phone', optional($manager)->phone)); ?>" minlength="1" maxlength="255" required="true" class="form-control pl-0 placeholder_font validate" placeholder="<?php echo e(trans('managers.phone__placeholder')); ?>" autocomplete="new-phone"/>
                
                <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    </div>
   
    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('is_superuser') ? 'has-error' : ''); ?>">
            <label for="is_superuser" class="active font_lable"><?php echo e(trans('managers.is_superuser')); ?></label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" <?php echo e(old('is_superuser', optional($manager)->is_superuser) == '1' ? 'checked' : ''); ?> value="1" class="custom-control-input" name="bbbb" id="customCheck1" />
                    <label class="custom-control-label pt-1" for="customCheck1"><?php echo e(trans('locale.Yes')); ?></label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" <?php echo e(old('is_superuser', optional($manager)->is_superuser) != '1' ? 'checked' : ''); ?> value="0" class="custom-control-input" name="bbbb" id="customCheck2" />
                    <label class="custom-control-label pt-1" for="customCheck2"><?php echo e(trans('locale.No')); ?></label>
                    <input type="hidden" id="default_value" name="is_superuser" value="0">
                </div>
            </div>
    
            <?php echo $errors->first('is_superuser', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

    <div class="col-md-6 card-width">
        <div class="input-field <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
            <label for="is_active" class="active font_lable"><?php echo e(trans('managers.is_active')); ?></label>
            <div class="pt-4 border-bottom pb-2">
                <div class="custom-control custom-checkbox d-inline">
                    <input type="radio" <?php echo e(old('is_active', optional($manager)->is_active) == '1' ? 'checked' : ''); ?> value="1" class="custom-control-input" name="aaa" id="customCheck3" />
                    <label class="custom-control-label pt-1" for="customCheck3"><?php echo e(trans('locale.Yes')); ?></label>
                </div>
                <div class="custom-control custom-checkbox d-inline ml-5">
                    <input type="radio" <?php echo e(old('is_active', optional($manager)->is_active) != '1' ? 'checked' : ''); ?> value="0" class="custom-control-input" name="aaa" id="customCheck4" />
                    <label class="custom-control-label pt-1" for="customCheck4"><?php echo e(trans('locale.No')); ?></label>
                    <input type="hidden" id="default_value" name="is_active" value="0">
                </div>
            </div>
    
            <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

</div>

<script>
    // Script Added by Yuris
    // Adds listener to all defined forms that convert checkbox values from on/off to 1/0
    var forms = document.forms;
    //alert(forms.length);
    for (var f = 0, form; form = forms[f++];) {
        //if (form.name.length > 0) {
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
        //}
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
<?php /**PATH D:\data\10.30\li\webde\resources\views/managers/form.blade.php ENDPATH**/ ?>