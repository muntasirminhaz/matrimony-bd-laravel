<script>
    $(function () {
        
//------------------------------------------------------------------  
    if($('#sibling_living1').is(':checked')){
        $('#liveStatusToLinkRelProfessionId').show(300);
    }  
        $('.spouse-infos').hide(300);
    if($('#marital_status1').is(':checked')){
        $('.spouse-infos').show(300);
    } 
    //-------------------
    if($('#sibling_spouse_living1').is(':checked')){
        $('#liveStatusToLinkRelProfessionIdRS').show(300);
    } 
//------------------------------------------------------------------     
        
        $('.marital_status').on('click', function () {

            if ($(this).val() == 1) {
                $('.spouse-infos').show(300);
            }
            if ($(this).val() == 2) {
                $('.spouse-infos').hide(300);
            }
        });
       //==============================================

    });
    //------------------------------------
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
    //------------------------------------
//====================================================

 if ($( "#sibling_profession option:selected" ).val() == 0 || $( "#sibling_profession option:selected" ).val() == 11 ||$( "#sibling_profession option:selected" ).val() == 12 || $( "#sibling_profession option:selected" ).val() == 14 || $( "#sibling_profession option:selected" ).val() == 15) {
                     $('#ProfDetailsIdHide').hide(300);
            }
            //------------------
            
            if ($( "#sibling_profession option:selected" ).val() == 3 || $( "#sibling_profession option:selected" ).val() == 4|| $( "#sibling_profession option:selected" ).val() ==7 || $( "#sibling_profession option:selected" ).val() == 8 || $( "#sibling_profession option:selected" ).val() == 13 ) {
                     $('#ProfDetailsIdHide').show(300);
            }
            //------------------
            
            if ($("#sibling_profession option:selected" ).val() == 1 || $("#sibling_profession option:selected" ).val() == 2 || $("#sibling_profession option:selected" ).val() == 5 || $("#sibling_profession option:selected" ).val() == 6 || $("#sibling_profession option:selected" ).val() == 9 || $("#sibling_profession option:selected" ).val() == 10) {
                     $('#ProfDetailsIdHide').show(300);
                     $('.allHideClass2').show(300);
                     $('#professiondetails').show(300);
            }
            //------------------
 // ===================================================  
    //====================
    $(document).ready(function () {

        function showProfession() {
            $('.allHideClass2').show(300)
            $('#ProfDetailsIdHide').show(300);
            $('#profession_details').children().remove();
            $('#profession_details').append("<option value='0'>Select ...</option>");
        }

        $('#sibling_profession').on('change', function () {
            $('.allHideClass2').hide(300);           
            $('#profession_details').children().remove();
            if ($(this).val() == 0 || $(this).val() == 11 || $(this).val() == 12 || $(this).val() == 14 ||
                $(this).val() == 15) {
                $('.allHideClass2').hide(300);
                $('#ProfDetailsIdHide').hide(300);
                $('#profesion_details option').remove();
            }
            if ($(this).val() == 0 || $(this).val() == 13 || $(this).val() == 3 || $(this).val() == 4 ||
                $(this).val() == 7 || $(this).val() == 8) {
                $('.allHideClass2').hide(300);
                $('#profesion_details option').remove();
                $('#ProfDetailsIdHide').show(300);
            }

            if ($(this).val() == 1) {
                showProfession();
                @foreach(professionTypeBCS() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

            if ($(this).val() == 2) {
                showProfession();
                @foreach(professionTypeGovGrade() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 5) {
                showProfession();
                @foreach(professionTypeBank() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 6) {
                showProfession();
                @foreach(professionTypeTeacher() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 9) {
                showProfession();
                @foreach(professionTypeDefense() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 10) {
                showProfession();
                @foreach(professionTypeLawyer() as $key => $value)
                $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
        })
//------------------------------------------------------------
 //====================================================

 if ($( "#sibling_spouse_profession option:selected" ).val() == 0 || $( "#sibling_spouse_profession option:selected" ).val() == 11 ||$( "#sibling_spouse_profession option:selected" ).val() == 12 || $( "#sibling_spouse_profession option:selected" ).val() == 14 || $( "#sibling_spouse_profession option:selected" ).val() == 15) {
                     $('#relativeSpouseProfession').hide(300);
            }
            //------------------
            
            if ($( "#sibling_spouse_profession option:selected" ).val() == 3 || $( "#sibling_spouse_profession option:selected" ).val() == 4|| $( "#sibling_spouse_profession option:selected" ).val() ==7 || $( "#sibling_spouse_profession option:selected" ).val() == 8 || $( "#sibling_spouse_profession option:selected" ).val() == 13 ) {
                     $('#relativeSpouseProfession').show(300);
            }
            //------------------
            
            if ($("#sibling_spouse_profession option:selected" ).val() == 1 || $("#sibling_spouse_profession option:selected" ).val() == 2 || $("#sibling_spouse_profession option:selected" ).val() == 5 || $("#sibling_spouse_profession option:selected" ).val() == 6 || $("#sibling_spouse_profession option:selected" ).val() == 9 || $("#sibling_spouse_profession option:selected" ).val() == 10) {
                     $('#relativeSpouseProfession').show(300);
                     $('.allHideClass').show(300);
                     $('#spouse_profession_details').show(300);
            }
            //------------------


        function showProfessionRelative() {
            $('.allHideClass').show(300)
            $('#relativeSpouseProfession').show(300);
            $('#spouse_profession_details').children().remove();
            $('#spouse_profession_details').append("<option value='0'>Select ...</option>");
        }

        $('#sibling_spouse_profession').on('change', function () {
            $('.allHideClass').hide(300);
            $('#spouse_profession_details').children().remove();
            if ($(this).val() == 0 || $(this).val() == 11 || $(this).val() == 12 || $(this).val() == 14 ||
                $(this).val() == 15) {
                $('.allHideClass').hide(300);
                $('#relativeSpouseProfession').hide(300);
                $('#spouse_profession_details option').remove();
            }
            if ($(this).val() == 0 || $(this).val() == 13 || $(this).val() == 3 || $(this).val() == 4 ||
                $(this).val() == 7 || $(this).val() == 8) {
                $('.allHideClass').hide(300);
                $('#spouse_profession_details option').remove();
                $('#relativeSpouseProfession').show(300);
            }

            if ($(this).val() == 1) {
                showProfessionRelative();
                @foreach(professionTypeBCS() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

            if ($(this).val() == 2) {
                showProfessionRelative();
                @foreach(professionTypeGovGrade() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 5) {
                showProfessionRelative();
                @foreach(professionTypeBank() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 6) {
                showProfessionRelative();
                @foreach(professionTypeTeacher() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 9) {
                showProfessionRelative();
                @foreach(professionTypeDefense() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 10) {
                showProfessionRelative();
                @foreach(professionTypeLawyer() as $key => $value)
                $('#spouse_profession_details').append(
                    "<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

        })


    })
    //====================

</script>
