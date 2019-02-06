<script>
    $(function () {
        $('.other_details').hide();
        function showProfession() {
            $('#professiondetails').show(300);
            $('#profession_details').children().remove();
            $('#profession_details').attr('required','required');
            $('#profession_details').append("<option value=''>Select ...</option>");

            $('.extrainfo').show(300);

        }

        $('#profession').on('change', function () {
            $('.other_details').hide(300);

            $('#professiondetails').hide(300);

            $('.extrainfo').show(300);

            $('#designation').attr('required','required');
            $('#orgName').attr('required','required');

            $('#profession_details').removeAttr('required');
            $('#profession_details').children().remove();
            if ($(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14 ||
                $(this).val() == 15) {
                $('#professiondetails').hide(300);
                $('#profession_details').children().remove();

            }
            if (
                $(this).val() == 13 ||
                $(this).val() == 3 ||
                $(this).val() == 4 ||
                $(this).val() == 7 ||
                $(this).val() == 8
            ) {
                
                
                $('#profession_details').children().remove();
                $('#professiondetails').hide(300);

            }
            if (
                $(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14 ||
                $(this).val() == 15
            ) {
                               
                $('.extrainfo').hide(300);
                

                $('#designation').removeAttr('required');
                $('#orgName').removeAttr('required');
                $('#profession_details').removeAttr('required');

                $('#profession_details').children().remove();
                $('#professiondetails').hide(300);
                $('.other_details').show(300);

            }

            if ($(this).val() == 1) {
                showProfession();
                <?php $__currentLoopData = professionTypeBCS(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            if ($(this).val() == 2) {
                showProfession();
                <?php $__currentLoopData = professionTypeGovGrade(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 5) {
                showProfession();
                <?php $__currentLoopData = professionTypeBank(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 6) {
                showProfession();
                <?php $__currentLoopData = professionTypeTeacher(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 9) {
                showProfession();
                <?php $__currentLoopData = professionTypeDefense(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
            if ($(this).val() == 10) {
                showProfession();
                <?php $__currentLoopData = professionTypeLawyer(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#profession_details').append("<option value='<?php echo e($key); ?>'><?php echo e($value); ?></option>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            if($(this).val() == 8){
                $('.designation-level').text('Business Type*');
            }else{
                $('.designation-level').text('Job / Designation*');
                
            }

          

        })
 //==================================================================  
 $("body").on("click", "#submit", function () {
            var err = 0;                                    
            $("#err_profession, #err_designation  , #err_orgName  ").text("");

            var profession = $("select[name='profession']").val();
            var designation = $("input[name='designation']").val();     
            var orgName = $("input[name='orgName']").val();

                if (profession == "") {
                    $("#err_profession").text("Profession Required");
                    err++;
                } 
           
                /*
                if($("profession != 11 || profession != 12 profession != 14 profession != 15")){
                    alert('kdfkds');
                }  */  
           
            /*
            if (designation == "") {
                $("#err_designation").text("Job / Designation Required");
                err++;
            }

            if (orgName == "") {
                $("#err_orgName").text("Business / Organization Name Required");
                err++;
            }*/
           
            if (err > 0) {
                return false;
            }
           console.log(err);
            return true;
        });

  //==================================================================


    });

</script>
