<script>
        $(function () {
    
            if ($('#sibling_living1').is(':checked')) {
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
            if ($("#sibling_profession option:selected").val() == 0 ||
                $("#sibling_profession option:selected").val() == 11 ||
                $("#sibling_profession option:selected").val() == 12 ||
                $("#sibling_profession option:selected").val() == 14 ||
                $("#sibling_profession option:selected").val() == 15) {
                $('#ProfDetailsIdHide').hide(300);
            }
            //------------------
    
            if ($("#sibling_profession option:selected").val() == 3 ||
                $("#sibling_profession option:selected").val() == 4 ||
                $("#sibling_profession option:selected").val() == 7 ||
                $("#sibling_profession option:selected").val() == 8 ||
                $("#sibling_profession option:selected").val() == 13) {
                $('#ProfDetailsIdHide').show(300);
            }
            //------------------
    
            if ($("#sibling_profession option:selected").val() == 1 ||
                $("#sibling_profession option:selected").val() == 2 ||
                $("#sibling_profession option:selected").val() == 5 ||
                $("#sibling_profession option:selected").val() == 6 ||
                $("#sibling_profession option:selected").val() == 9 ||
                $("#sibling_profession option:selected").val() == 10) {
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
    
            if ($('#sibling_spouse_living1').is(':checked')) {
                $('#liveStatusToLinkRelProfessionIdRS').show(300);
            } //sibling_spouse_profession
    
            if ($("#sibling_spouse_profession option:selected").val() == 0 || $(
                    "#sibling_spouse_profession option:selected").val() == 11 || $(
                    "#sibling_spouse_profession option:selected").val() == 12 || $(
                    "#sibling_spouse_profession option:selected").val() == 14 || $(
                    "#sibling_spouse_profession option:selected").val() == 15) {
                // $('#ProfDetailsIdHide').hide(300);
                $('#SpouseProfession').hide(300);
            }
            //------------------
    
            if ($("#sibling_spouse_profession option:selected").val() == 3 || $(
                    "#sibling_spouse_profession option:selected").val() == 4 || $(
                    "#sibling_spouse_profession option:selected").val() == 7 || $(
                    "#sibling_spouse_profession option:selected").val() == 8 || $(
                    "#sibling_spouse_profession option:selected").val() == 13) {
                // $('#ProfDetailsIdHide').show(300);
                $('#SpouseProfession').show(300);
            }
            //------------------
    
            if ($("#sibling_spouse_profession option:selected").val() == 1 || $(
                    "#sibling_spouse_profession option:selected").val() == 2 || $(
                    "#sibling_spouse_profession option:selected").val() == 5 || $(
                    "#sibling_spouse_profession option:selected").val() == 6 || $(
                    "#sibling_spouse_profession option:selected").val() == 9 || $(
                    "#sibling_spouse_profession option:selected").val() == 10) {
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
                sibling_profession
            */
            professionDetails($('#sibling_profession').val());
    
            $('#sibling_profession').on('change', function () {
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
            spouseProfessionDetails($('#sibling_spouse_profession').val());
            $('#sibling_spouse_profession').on('change', function () {
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
            if ($('#sibling_spouse_profession').attr('data-oldval') > 0) {
                oldval = $('#sibling_spouse_profession').attr('data-oldval');
                $("#sibling_spouse_profession option[value=" + oldval + "]").prop("selected", 'selected');
            }
    
    //===================================================================
    $("body").on("click", "#submit", function () {
                var err = 0;
                $("#err_siblingposition, #err_gender , #err_sibling_living , #err_marital_status " ).text("");
    
                var siblingposition = $("input[name='siblingposition']").val();
                //var sibling_profession = $("select[name='sibling_profession']").val();
                //var permanentaddress = $("textarea[name='permanentaddress']").val();
    
                if (siblingposition == "") {
                      $("#err_siblingposition").text("Brother/Sister Position Required");
                      err++;
                     }
                if (!$(".gendercheck").is(":checked")) {
                      $("#err_gender").text("Brother / Sister Required");
                      err++;
                     }
                if (!$(".livCheck").is(":checked")) {
                      $("#err_sibling_living").text("Living Status is Required");
                      err++;
                     }
    
                if (!$(".maritStaCheck").is(":checked")) {
                      $("#err_marital_status").text("Marital Status is Required");
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
    