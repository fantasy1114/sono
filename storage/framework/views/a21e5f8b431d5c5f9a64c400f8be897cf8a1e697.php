<div class="input-field <?php echo e($errors->has('Tracker_Code') ? 'has-error' : ''); ?>">
    <label for="Tracker_Code" class="active"><?php echo e(trans('devices.Tracker_Code')); ?></label>
        <input class="validate" name="Tracker_Code" type="text" id="Tracker_Code" value="<?php echo e(old('Tracker_Code', optional($device)->Tracker_Code)); ?>" minlength="15" maxlength="25" required="true" placeholder="<?php echo e(trans('devices.Tracker_Code__placeholder')); ?>">
        <?php echo $errors->first('Tracker_Code', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('Worksite_ID') ? 'has-error' : ''); ?>">
    <label for="Worksite_ID" class="active"><?php echo e(trans('devices.Worksite_ID')); ?></label>
        <select class="" id="Worksite_ID" name="Worksite_ID">
        	    <option value="" style="display: none;" <?php echo e(old('Worksite_ID', optional($device)->Worksite_ID ?: '') == '' ? 'selected' : ''); ?> disabled selected><?php echo e(trans('devices.Worksite_ID__placeholder')); ?></option>
        	<?php $__currentLoopData = $Worksites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkkey => $Worksite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <option value="<?php echo e($kkkey); ?>" <?php echo e(old('Worksite_ID', optional($device)->Worksite_ID) == $kkkey ? 'selected' : ''); ?>>
			    	<?php echo e($Worksite); ?>

			    </option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <?php echo $errors->first('Worksite_ID', '<p class="help-block">:message</p>'); ?>

</div>
<div class="input-field <?php echo e($errors->has('Is_Active') ? 'has-error' : ''); ?>">
    <label for="Is_Active" class="active"><?php echo e(trans('devices.Is_Active')); ?></label>
        <div class="mb-5 checkbox">
                <div class="switch">
                    <label><?php echo e(trans('locale.No')); ?><input name="Is_Active" type="checkbox"  <?php echo e(old('Is_Active', optional($device)->Is_Active ?: '1') == '1' ? 'checked' : ''); ?>><span class = "lever"></span><?php echo e(trans('locale.Yes')); ?></label>
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
<?php /**PATH D:\data\li\webde\resources\views/devices/form.blade.php ENDPATH**/ ?>