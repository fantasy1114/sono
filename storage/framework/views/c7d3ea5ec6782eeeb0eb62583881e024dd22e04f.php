<!-- Customized by Yuris -->

<div class="input-field <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="active"><?php echo e(trans('managers.name')); ?></label>
        <input class="validate" name="name" type="text" id="name" value="<?php echo e(old('name', optional($manager)->name)); ?>" minlength="1" maxlength="255" required="true" placeholder="<?php echo e(trans('managers.name__placeholder')); ?>">
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="active"><?php echo e(trans('managers.email')); ?></label>
        <input class="validate" name="email" type="email" id="email" value="<?php echo e(old('email', optional($manager)->email)); ?>" 
            required="true" placeholder="<?php echo e(trans('managers.email__placeholder')); ?>" autocomplete="new-email">
        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('organisation_id') ? 'has-error' : ''); ?>">
    <label for="organisation_id" class="active"><?php echo e(trans('managers.organisation_id')); ?></label>
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
<div class="input-field <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="active"><?php echo e(trans('managers.password')); ?></label>
        <input class="form-control" name="password" type="password" id="password" value="<?php echo e(old('password', optional($manager)->password)); ?>" 
            required="true" placeholder="<?php echo e(trans('managers.password__placeholder')); ?>" autocomplete="new-password">
        <input class="" name="ptkn" type="hidden" id="ptkn" value="<?php echo e(optional($manager)->password); ?>">
        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
    <label for="phone" class="active"><?php echo e(trans('managers.phone')); ?></label>
        <input class="validate" name="phone" type="text" id="phone" value="<?php echo e(old('phone', optional($manager)->phone)); ?>" maxlength="255" placeholder="<?php echo e(trans('managers.phone__placeholder')); ?>">
        <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('is_superuser') ? 'has-error' : ''); ?>">
    <label for="is_superuser" class="active"><?php echo e(trans('managers.is_superuser')); ?></label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label><?php echo e(trans('locale.No')); ?><input name="is_superuser" type="checkbox"  <?php echo e(old('is_superuser', optional($manager)->is_superuser) == '1' ? 'checked' : ''); ?>><span class = "lever"></span><?php echo e(trans('locale.Yes')); ?></label>
                </div>
        </div>

        <?php echo $errors->first('is_superuser', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="active"><?php echo e(trans('managers.is_active')); ?></label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label><?php echo e(trans('locale.No')); ?><input name="is_active" type="checkbox"  <?php echo e(old('is_active', optional($manager)->is_active) == '0' ? '' : 'checked'); ?>><span class = "lever"></span><?php echo e(trans('locale.Yes')); ?></label>
                </div>
        </div>

        <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

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
</script>
<?php /**PATH D:\data\10.30\li\webde\resources\views/managers/form.blade.php ENDPATH**/ ?>