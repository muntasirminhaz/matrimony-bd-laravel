<script>
    $(function () {
        function showProfession() {
            $('.mother_profesion_details').show(300);
            $('#mother_profesion_details').children().remove();
            $('#mother_profesion_details').attr('required','required');
            $('#mother_profesion_details').append("<option value=''>Select ...</option>");
        }

        $('#mprofession').on('change', function () {
            $('.motherother').hide(300);

            $('.mother_profesion_details').hide(300);
            $('#mother_profesion_details').removeAttr('required');
            $('#mother_profesion_details').children().remove();
            if ($(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14) {
                $('.mother_profesion_details').hide(300);
                $('#mother_profesion_details').children().remove();

            }
            if (
                $(this).val() == 13 ||
                $(this).val() == 3 ||
                $(this).val() == 4 ||
                $(this).val() == 7 ||
                $(this).val() == 8
            ) {
                

                $('#mother_profesion_details').children().remove();
                $('.mother_profesion_details').hide(300);
                

            }

            if ($(this).val() == 1) {
                showProfession();
                <?php $__currentLoopData = professionTypeBCS(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            if ($(this).val() == 2) {
                showProfession();
                <?php $__currentLoopData = professionTypeGovGrade(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 5) {
                showProfession();
                <?php $__currentLoopData = professionTypeBank(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 6) {
                showProfession();
                <?php $__currentLoopData = professionTypeTeacher(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 9) {
                showProfession();
                <?php $__currentLoopData = professionTypeDefense(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 10) {
                showProfession();
                <?php $__currentLoopData = professionTypeLawyer(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#mother_profesion_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 15) {
               $('.motherother').show(300);
            }

        })



    });
</script>
