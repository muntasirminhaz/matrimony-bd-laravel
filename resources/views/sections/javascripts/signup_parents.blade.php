<script>
    $(function () {
       
        $('.hanflat').on('change', function () {
            if ($(this).val() == 2) {
                $("#landDivHide").show(300);
            } 
            else{
                $("#landDivHide").hide(300);
            }
        })

//================================================================
$("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_fname, #err_flstatus , #err_fsrvstatus , #err_fprofession  , #err_mname ,#err_mlstatus ,#err_msrvstatus , #err_mprofession, #err_landyeno, #err_typeland, #err_familybackground" ).text("");

            var fname = $("input[name='fname']").val();
            var flstatus = $("input[name='flstatus']").val();
            var fsrvstatus = $("input[name='fsrvstatus']").val();
            var fprofession = $("select[name='fprofession']").val();
            var mname = $("input[name='mname']").val();
            var mlstatus = $("input[name='mlstatus']").val(); 
            var msrvstatus = $("input[name='msrvstatus']").val();
            var mprofession = $("select[name='mprofession']").val();
            var landyeno = $("input[name='landyeno']").val();
            var typeland = $("input[name='typeland']").val();
            var familybackground = $("textarea[name='familybackground']").val();


            if (fname == "") {
                $("#err_fname").text("Father's Name Required");
                err++;
            }

           if (!$(".flstat1").is(":checked")){
                 $("#err_flstatus").text("Father's Living Status Required");
                  err++;
                }
           if (!$(".serv").is(":checked")){
                 $("#err_fsrvstatus").text("Father's Service Status Required");
                  err++;
                }

            /*
            else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                err++;
            }*/
            if (fprofession == "") {
                $("#err_fprofession").text("Father's Profession Required");
                err++;
            }
               
            if (mname == "") {
                $('#err_mname').text("Mother's Name  Required");
                err++;
            }
            
            if (!$(".mls").is(":checked")){
                    $("#err_mlstatus").text("Mother's Living Status Required");
                    err++;
                }
            if (!$(".mss").is(":checked")){
                    $("#err_msrvstatus").text("Mother's Service Status Required");
                    err++;
                }
          
            if (mprofession == "") {
                $("#err_mprofession").text("Mother's Profession Required");
                err++;
            }

           if (!$(".hanflat").is(":checked")){
                $("#err_landyeno").text("Have any land/flat in Dhaka/Nearby Required");
                err++;
            }
            if ($("#landyeno").is(":checked")){
                    if (!$(".tofland").is(":checked")){
                          $("#err_typeland").text("Types of Land/Flat Required");
                          err++;
                    }
                 }
            if (familybackground == "") {
                $("#err_familybackground").text("Family Backgroud Required");
                err++;
            }
           

            if (err > 0) {
                return false;
            }
            return true;
        });
//================================================================

        function showProfession() {
            $('.father_profesion_details').show(300);
            $('#father_profesion_details').children().remove();
            $('#father_profesion_details').attr('required','required');
            $('#father_profesion_details').append("<option value=''>Select ...</option>");
        }

        $('#fprofession').on('change', function () {
            $('.fatherother').hide(300);

            $('.father_profesion_details').hide(300);
            $('#father_profesion_details').removeAttr('required');
            $('#father_profesion_details').children().remove();
            if ($(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14) {
                $('.father_profesion_details').hide(300);
                $('#father_profesion_details').children().remove();

            }
            if (
                $(this).val() == 13 ||
                $(this).val() == 3 ||
                $(this).val() == 4 ||
                $(this).val() == 7 ||
                $(this).val() == 8
            ) {
                

                $('#father_profesion_details').children().remove();
                $('.father_profesion_details').hide(300);
                

            }

            if ($(this).val() == 1) {
                showProfession();
                @foreach(professionTypeBCS() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

            if ($(this).val() == 2) {
                showProfession();
                @foreach(professionTypeGovGrade() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 5) {
                showProfession();
                @foreach(professionTypeBank() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 6) {
                showProfession();
                @foreach(professionTypeTeacher() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 9) {
                showProfession();
                @foreach(professionTypeDefense() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 10) {
                showProfession();
                @foreach(professionTypeLawyer() as $key => $value)
                $('#father_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 15) {
               $('.fatherother').show(300);
            }

        })



    });
</script>
