<script>
        $(function () {
    
            if ($('#relative_living1').is(':checked')) {
                $('#liveStatusToLinkRelProfessionId').show(300);
            }
            $('.spouse-infos').hide(300);
    
            if ($('#marital_status1').is(':checked')) {
                $('.spouse-infos').show(300);
            }
    
    
    
    
            $('.marital_status').on('click', function () {
    
                if ($(this).val() == 1) {
                    $('.spouse-infos').show(300);
                }
                if ($(this).val() == 2) {
                    $('.spouse-infos').hide(300);
                }
            });
    
    
            //====================================================
            if ($("#relative_profession option:selected").val() == 0 ||
                $("#relative_profession option:selected").val() == 11 ||
                $("#relative_profession option:selected").val() == 12 ||
                $("#relative_profession option:selected").val() == 14 ||
                $("#relative_profession option:selected").val() == 15) {
                $('#ProfDetailsIdHide').hide(300);
            }
            //------------------
    
            if ($("#relative_profession option:selected").val() == 3 ||
                $("#relative_profession option:selected").val() == 4 ||
                $("#relative_profession option:selected").val() == 7 ||
                $("#relative_profession option:selected").val() == 8 ||
                $("#relative_profession option:selected").val() == 13) {
                $('#ProfDetailsIdHide').show(300);
            }
            //------------------
    
            if ($("#relative_profession option:selected").val() == 1 ||
                $("#relative_profession option:selected").val() == 2 ||
                $("#relative_profession option:selected").val() == 5 ||
                $("#relative_profession option:selected").val() == 6 ||
                $("#relative_profession option:selected").val() == 9 ||
                $("#relative_profession option:selected").val() == 10) {
                $('#ProfDetailsIdHide').show(300);
                $('.allHideClass').show(300);
                $('#professiondetails').show(300);
            }
            //------------------
            // ===================================================        
    
    
    
    
    
    
            function showProfession() {
                $('.allHideClass').show(300)
                $('#ProfDetailsIdHide').show(300);
                $('#profession_details').children().remove();
                $('#profession_details').append("<option value='0'>Select ...</option>");
            }
            //---
    
    
            //====================================================
    
            if ($('#relative_spouse_living1').is(':checked')) {
                $('#liveStatusToLinkRelProfessionIdRS').show(300);
            } //relative_spouse_profession
    
            if ($("#relative_spouse_profession option:selected").val() == 0 || $(
                    "#relative_spouse_profession option:selected").val() == 11 || $(
                    "#relative_spouse_profession option:selected").val() == 12 || $(
                    "#relative_spouse_profession option:selected").val() == 14 || $(
                    "#relative_spouse_profession option:selected").val() == 15) {
                // $('#ProfDetailsIdHide').hide(300);
                $('#SpouseProfession').hide(300);
            }
            //------------------
    
            if ($("#relative_spouse_profession option:selected").val() == 3 || $(
                    "#relative_spouse_profession option:selected").val() == 4 || $(
                    "#relative_spouse_profession option:selected").val() == 7 || $(
                    "#relative_spouse_profession option:selected").val() == 8 || $(
                    "#relative_spouse_profession option:selected").val() == 13) {
                // $('#ProfDetailsIdHide').show(300);
                $('#SpouseProfession').show(300);
            }
            //------------------
    
            if ($("#relative_spouse_profession option:selected").val() == 1 || $(
                    "#relative_spouse_profession option:selected").val() == 2 || $(
                    "#relative_spouse_profession option:selected").val() == 5 || $(
                    "#relative_spouse_profession option:selected").val() == 6 || $(
                    "#relative_spouse_profession option:selected").val() == 9 || $(
                    "#relative_spouse_profession option:selected").val() == 10) {
                //$('#ProfDetailsIdHide').show(300);
                // $('.allHideClass').show(300);
                // $('#professiondetails').show(300);
                $('#SpouseProfession').show(300);
                $('.allHideClass2').show(300);
                $('#professiondetails1').show(300);
            }
            //------------------
    
            // ===================================================     
    
            function showProfessionRelative() {
                $('.allHideClass2').show(300)
                $('#SpouseProfession').show(300);
                $('#spouse_profession_details').children().remove();
                $('#spouse_profession_details').append("<option value='0'>Select ...</option>");
            }
    
    
    
    
    
    
    
    
            //====================
            //==============================================
    
            //===============================================
            $('.liveStatusClass').on('change', function () {
                if ($(this).val() == 1) {
                    $('#liveStatusToLinkRelProfessionId').show(300);
                } else {
                    $('#liveStatusToLinkRelProfessionId').hide(300);
                }
            })
            //------------------------------------
            //------------------------------------
            $('.liveStatusClassRS').on('change', function () {
                if ($(this).val() == 1) {
                    $('#liveStatusToLinkRelProfessionIdRS').show(300);
                } else {
                    $('#liveStatusToLinkRelProfessionIdRS').hide(300);
                }
            })
    
    
    
    
    
            /*
                relative_profession
            */
            professionDetails($('#relative_profession').val());
    
            $('#relative_profession').on('change', function () {
                professionDetails($(this).val());
            })
    
            function professionDetails(professionValue) {
    
                $('.allHideClass').hide(300);
                $('#profession_details').children().remove();
    
                if (professionValue == 0 || professionValue == 11 || professionValue == 12 || professionValue == 14 ||
                    professionValue == 15) {
                    $('.allHideClass').hide(300);
                    $('#ProfDetailsIdHide').hide(300);
                    $('#profesion_details option').remove();
                }
                if (professionValue == 0 || professionValue == 13 || professionValue == 3 || professionValue == 4 ||
                    professionValue == 7 || professionValue == 8) {
                    $('.allHideClass').hide(300);
                    $('#profesion_details option').remove();
                    $('#ProfDetailsIdHide').show(300);
                }
    
                if (professionValue == 1) {
                    showProfession();
                    @foreach(professionTypeBCS() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
    
                if (professionValue == 2) {
                    showProfession();
                    @foreach(professionTypeGovGrade() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (professionValue == 5) {
                    showProfession();
                    @foreach(professionTypeBank() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (professionValue == 6) {
                    showProfession();
                    @foreach(professionTypeTeacher() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (professionValue == 9) {
                    showProfession();
                    @foreach(professionTypeDefense() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (professionValue == 10) {
                    showProfession();
                    @foreach(professionTypeLawyer() as $key => $value)
                    $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
            }
    
            /*
                spouse profession
            */
            spouseProfessionDetails($('#relative_spouse_profession').val());
            $('#relative_spouse_profession').on('change', function () {
                spouseProfessionDetails($(this).val());
            })
    
            function spouseProfessionDetails(spouseProfessionValue) {
                $('.allHideClass2').hide(300);
                $('#spouse_profession_details').children().remove();
    
                if (spouseProfessionValue == 0 || spouseProfessionValue == 11 || spouseProfessionValue == 12 ||
                    spouseProfessionValue == 14 ||
                    spouseProfessionValue == 15) {
                    $('.allHideClass2').hide(300);
                    $('#SpouseProfession').hide(300);
                    $('#SpouseProfession option').remove();
                }
                if (spouseProfessionValue == 0 || spouseProfessionValue == 13 || spouseProfessionValue == 3 ||
                    spouseProfessionValue == 4 ||
                    spouseProfessionValue == 7 || spouseProfessionValue == 8) {
                    $('.allHideClass2').hide(300);
                    $('#SpouseProfession option').remove();
                    $('#SpouseProfession').show(300);
                }
    
                if (spouseProfessionValue == 1) {
                    showProfessionRelative();
                    @foreach(professionTypeBCS() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
    
                if (spouseProfessionValue == 2) {
                    showProfessionRelative();
                    @foreach(professionTypeGovGrade() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (spouseProfessionValue == 5) {
                    showProfessionRelative();
                    @foreach(professionTypeBank() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (spouseProfessionValue == 6) {
                    showProfessionRelative();
                    @foreach(professionTypeTeacher() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (spouseProfessionValue == 9) {
                    showProfessionRelative();
                    @foreach(professionTypeDefense() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
                if (spouseProfessionValue == 10) {
                    showProfessionRelative();
                    @foreach(professionTypeLawyer() as $key => $value)
                    $('#spouse_profession_details').append(
                        "<option value='{{ $key }}'>{{ $value }}</option>");
                    @endforeach
                }
            }
    
    
    
            /*
                old value
            */
            if ($('#profesion_details').attr('data-oldval') > 0) {
                oldval = $('#profesion_details').attr('data-oldval');
                $("#profesion_details option[value=" + oldval + "]").prop("selected", 'selected');
            }
            if ($('#relative_spouse_profession').attr('data-oldval') > 0) {
                oldval = $('#relative_spouse_profession').attr('data-oldval');
                $("#relative_spouse_profession option[value=" + oldval + "]").prop("selected", 'selected');
            }
    
    //===================================================================
            $("body").on("click", "#submit", function () {
                var err = 0;
                $("#err_relative_side, #err_gender , #err_relative_living , #err_marital_status " ).text("");
    
                //var siblingposition = $("input[name='siblingposition']").val();
                //var sibling_profession = $("select[name='sibling_profession']").val();
                //var permanentaddress = $("textarea[name='permanentaddress']").val();
    
                if (!$(".relaFromCheck").is(":checked")) {
                      $("#err_relative_side").text("Relative from Required");
                      err++;
                     }
                if (!$(".genderChek").is(":checked")) {
                      $("#err_gender").text("Relative is Required");
                      err++;
                     }
    
                if (!$(".reltvChecLiv").is(":checked")) {
                      $("#err_relative_living").text("Living Status Required");
                      err++;
                     }
                if (!$(".mariStatsChe").is(":checked")) {
                      $("#err_marital_status").text("Marital Status Required");
                      err++;
                     }
                        //--------------------
                        /*
                if (!$(".chekhavesiblings").is(":checked")) {
                        $("#err_havesiblings").text("Do you have brothers and sisters Required");
                         err++;
                    }
    
                        if($("#havesiblingsId").is(":checked")){
    
                                if (brothersnumber == "") {
                                    $("#err_brothersnumber").text("Number of Brothers Required");
                                    err++;
                                }
                                if (brothersmarriednumber == "") {
                                    $("#err_brothersmarriednumber").text("Number of Brothers Married Required");
                                    err++;
                                }
                                if (sistersnumber == "") {
                                    $("#err_sistersnumber").text("Number of Sisters Required");
                                    err++;
                                }
                                if (sistersmarriednumber == "") {
                                    $("#err_sistersmarriednumber").text("Number of Sisters Married Required");
                                    err++;
                                }
                        } */ 
    
                /*
                else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                    $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                    err++;
                }*/
    
                if (err > 0) {
                    return false;
                }
                return true;
            });
    
    //====================================================================
    
        });
    
    </script>
    