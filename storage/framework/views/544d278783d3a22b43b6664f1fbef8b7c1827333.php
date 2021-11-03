<div class="input-field <?php echo e($errors->has('Worksite_Name') ? 'has-error' : ''); ?>">
    <label for="Worksite_Name" class="active"><?php echo e(trans('worksites.Worksite_Name')); ?></label>
        <input class="validate" name="Worksite_Name" type="text" id="Worksite_Name" value="<?php echo e(old('Worksite_Name', optional($worksite)->Worksite_Name)); ?>" minlength="1" maxlength="64" required="true" placeholder="<?php echo e(trans('worksites.Worksite_Name__placeholder')); ?>">
        <?php echo $errors->first('Worksite_Name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('Worksite_Address') ? 'has-error' : ''); ?>">
    <label for="Worksite_Address" class="active"><?php echo e(trans('worksites.Worksite_Address')); ?></label>
        <input class="validate" name="Worksite_Address" type="text" id="Worksite_Address" value="<?php echo e(old('Worksite_Address', optional($worksite)->Worksite_Address)); ?>" minlength="1" maxlength="255" required="true" placeholder="<?php echo e(trans('worksites.Worksite_Address__placeholder')); ?>">
        <?php echo $errors->first('Worksite_Address', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('Is_Active') ? 'has-error' : ''); ?>">
    <label for="Is_Active" class="active"><?php echo e(trans('worksites.Is_Active')); ?></label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label><?php echo e(trans('locale.No')); ?><input name="Is_Active" type="checkbox"  <?php echo e(old('Is_Active', optional($worksite)->Is_Active) == '1' ? 'checked' : ''); ?>><span class = "lever"></span><?php echo e(trans('locale.Yes')); ?></label>
                </div>
        </div>

        <?php echo $errors->first('Is_Active', '<p class="help-block">:message</p>'); ?>

</div>
<?php if(Auth::user()->is_superuser == 1): ?>
<div class="input-field <?php echo e($errors->has('Organisation_ID') ? 'has-error' : ''); ?>">
    <label for="Organisation_ID" class="active"><?php echo e(trans('worksites.Organisation_ID')); ?></label>
        <select class="" id="Organisation_ID" name="Organisation_ID" >
        	    <option value="" style="display: none;" <?php echo e(old('Organisation_ID', optional($worksite)->Organisation_ID ?: '') == '' ? 'selected' : ''); ?> disabled selected><?php echo e(trans('worksites.Organisation_ID__placeholder')); ?></option>
        	<?php $__currentLoopData = $Organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkkey => $Organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <option value="<?php echo e($kkkey); ?>" <?php echo e(old('Organisation_ID', optional($worksite)->Organisation_ID) == $kkkey ? 'selected' : ''); ?>>
			    	<?php echo e($Organisation); ?>

			    </option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <?php echo $errors->first('Organisation_ID', '<p class="help-block">:message</p>'); ?>

</div>
<?php endif; ?>
<div class="input-field <?php echo e($errors->has('Date_From') ? 'has-error' : ''); ?>">
    <label for="Date_From" class="active"><?php echo e(trans('worksites.Date_From')); ?></label>
        <input class="validate" name="Date_From" type="text" id="Date_From" value="<?php echo e(old('Date_From', optional($worksite)->Date_From)); ?>" placeholder="<?php echo e(trans('worksites.Date_From__placeholder')); ?>">
        <?php echo $errors->first('Date_From', '<p class="help-block">:message</p>'); ?>

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
<?php /**PATH D:\data\li\webde\resources\views/worksites/form.blade.php ENDPATH**/ ?>