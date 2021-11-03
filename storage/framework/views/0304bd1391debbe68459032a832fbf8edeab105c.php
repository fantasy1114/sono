<div class="input-field <?php echo e($errors->has('Key_Name') ? 'has-error' : ''); ?>">
    <label for="Key_Name" class="active"><?php echo e(trans('keys.Key_Name')); ?></label>
        <input class="validate" name="Key_Name" type="text" id="Key_Name" value="<?php echo e(old('Key_Name', optional($key)->Key_Name)); ?>" minlength="1" maxlength="32" required="true" placeholder="<?php echo e(trans('keys.Key_Name__placeholder')); ?>">
        <?php echo $errors->first('Key_Name', '<p class="help-block">:message</p>'); ?>

</div>

<?php if(Request::path() == 'keys/create' || Auth::user()->is_superuser == 1): ?>
<div class="input-field <?php echo e($errors->has('Employee_ID') ? 'has-error' : ''); ?>">
    <label for="Employee_ID" class="active"><?php echo e(trans('keys.Employee_ID')); ?></label>
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
<?php endif; ?>
<div class="input-field <?php echo e($errors->has('Is_Active') ? 'has-error' : ''); ?>">
    <label for="Is_Active" class="active"><?php echo e(trans('keys.Is_Active')); ?></label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label><?php echo e(trans('locale.No')); ?><input name="Is_Active" type="checkbox"  <?php echo e(old('Is_Active', optional($key)->Is_Active ?: '1') == '1' ? 'checked' : ''); ?>><span class = "lever"></span><?php echo e(trans('locale.Yes')); ?></label>
                </div>
        </div>

        <?php echo $errors->first('Is_Active', '<p class="help-block">:message</p>'); ?>

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
</script>
<?php /**PATH D:\data\li\webde\resources\views/keys/form.blade.php ENDPATH**/ ?>