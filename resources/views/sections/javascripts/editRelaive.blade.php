<script>
    $(function () {

        if($('#relative_living1').is(':checked')){
            $('#liveStatusToLinkRelProfessionId').show(300);
        }
        $('.spouse-infos').hide(300);
        if($('#marital_status1').is(':checked')){
            $('.spouse-infos').show(300);
        }
        //-------------------
       /*
        if($('#relative_spouse_living1').is(':checked')){
            $('#liveStatusToLinkRelProfessionIdRS').show(300);
        }//relative_spouse_profession
        */
  //=============================================      
        

        $('.marital_status').on('click', function () {

            if ($(this).val() == 1) {
                $('.spouse-infos').show(300);
            }
            if ($(this).val() == 2) {
                $('.spouse-infos').hide(300);
            }
        });

//====================================================
   /*          relative spouse 
        
         if($('#relative_spouse_living1').is(':checked')){
            $('#liveStatusToLinkRelProfessionIdRS').show(300);
        }//relative_spouse_profession

    if ($( "#relative_spouse_profession option:selected" ).val() == 0 || $( "#relative_spouse_profession option:selected" ).val() == 11 ||$( "#relative_spouse_profession option:selected" ).val() == 12 || $( "#relative_spouse_profession option:selected" ).val() == 14 || $( "#relative_spouse_profession option:selected" ).val() == 15) {
                     $('#ProfDetailsIdHide').hide(300);
            }
            //------------------
            
            if ($( "#relative_spouse_profession option:selected" ).val() == 3 || $( "#relative_spouse_profession option:selected" ).val() == 4|| $( "#relative_spouse_profession option:selected" ).val() ==7 || $( "#relative_spouse_profession option:selected" ).val() == 8 || $( "#relative_spouse_profession option:selected" ).val() == 13 ) {
                     $('#ProfDetailsIdHide').show(300);
            }
            //------------------
            
            if ($("#relative_spouse_profession option:selected" ).val() == 1 || $("#relative_spouse_profession option:selected" ).val() == 2 || $("#relative_spouse_profession option:selected" ).val() == 5 || $("#relative_spouse_profession option:selected" ).val() == 6 || $("#relative_spouse_profession option:selected" ).val() == 9 || $("#relative_spouse_profession option:selected" ).val() == 10) {
                     $('#ProfDetailsIdHide').show(300);
                     $('.allHideClass').show(300);
                     $('#professiondetails').show(300);
            } */
            //------------------

 // ===================================================


//====================================================
        if ($( "#relative_profession option:selected" ).val() == 0 || $( "#relative_profession option:selected" ).val() == 11 ||$( "#relative_profession option:selected" ).val() == 12 || $( "#relative_profession option:selected" ).val() == 14 || $( "#relative_profession option:selected" ).val() == 15) {
                     $('#ProfDetailsIdHide').hide(300);
            }
            //------------------
            
            if ($( "#relative_profession option:selected" ).val() == 3 || $( "#relative_profession option:selected" ).val() == 4|| $( "#relative_profession option:selected" ).val() ==7 || $( "#relative_profession option:selected" ).val() == 8 || $( "#relative_profession option:selected" ).val() == 13 ) {
                     $('#ProfDetailsIdHide').show(300);
            }
            //------------------
            
            if ($("#relative_profession option:selected" ).val() == 1 || $("#relative_profession option:selected" ).val() == 2 || $("#relative_profession option:selected" ).val() == 5 || $("#relative_profession option:selected" ).val() == 6 || $("#relative_profession option:selected" ).val() == 9 || $("#relative_profession option:selected" ).val() == 10) {
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

        $('#relative_profession').on('change', function () {
            $('.allHideClass').hide(300);
            $('#profession_details').children().remove();            

            if ($(this).val() == 0 || $(this).val() == 11 || $(this).val() == 12 || $(this).val() == 14 ||
                $(this).val() == 15) {
                $('.allHideClass').hide(300);
                $('#ProfDetailsIdHide').hide(300);
                $('#profesion_details option').remove();
            }
            if ($(this).val() == 0 || $(this).val() == 13 || $(this).val() == 3 || $(this).val() == 4 ||
                $(this).val() == 7 || $(this).val() == 8) {
                $('.allHideClass').hide(300);
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

//---


//====================================================
 
         if($('#relative_spouse_living1').is(':checked')){
            $('#liveStatusToLinkRelProfessionIdRS').show(300);
        }//relative_spouse_profession

    if ($( "#relative_spouse_profession option:selected" ).val() == 0 || $( "#relative_spouse_profession option:selected" ).val() == 11 ||$( "#relative_spouse_profession option:selected" ).val() == 12 || $( "#relative_spouse_profession option:selected" ).val() == 14 || $( "#relative_spouse_profession option:selected" ).val() == 15) {
                    // $('#ProfDetailsIdHide').hide(300);
                     $('#relativeSpouseProfession').hide(300);
            }
            //------------------
            
            if ($( "#relative_spouse_profession option:selected" ).val() == 3 || $( "#relative_spouse_profession option:selected" ).val() == 4|| $( "#relative_spouse_profession option:selected" ).val() ==7 || $( "#relative_spouse_profession option:selected" ).val() == 8 || $( "#relative_spouse_profession option:selected" ).val() == 13 ) {
                    // $('#ProfDetailsIdHide').show(300);
                     $('#relativeSpouseProfession').show(300);
            }
            //------------------
            
            if ($("#relative_spouse_profession option:selected" ).val() == 1 || $("#relative_spouse_profession option:selected" ).val() == 2 || $("#relative_spouse_profession option:selected" ).val() == 5 || $("#relative_spouse_profession option:selected" ).val() == 6 || $("#relative_spouse_profession option:selected" ).val() == 9 || $("#relative_spouse_profession option:selected" ).val() == 10) {
                     //$('#ProfDetailsIdHide').show(300);
                    // $('.allHideClass').show(300);
                    // $('#professiondetails').show(300);
                 $('#relativeSpouseProfession').show(300);
                     $('.allHideClass2').show(300);
                     $('#professiondetails1').show(300);
            } 
            //------------------

 // ===================================================     

        function showProfessionRelative() {
            $('.allHideClass2').show(300)
            $('#relativeSpouseProfession').show(300);
            $('#spouse_profession_details').children().remove();            
            $('#spouse_profession_details').append("<option value='0'>Select ...</option>");
        }


        $('#relative_spouse_profession').on('change', function () {
            $('.allHideClass2').hide(300);
            $('#spouse_profession_details').children().remove();

            if ($(this).val() == 0 || $(this).val() == 11 || $(this).val() == 12 || $(this).val() == 14 ||
                $(this).val() == 15) {
                $('.allHideClass2').hide(300);
                $('#relativeSpouseProfession').hide(300);
                $('#relativeSpouseProfession option').remove();
            }
            if ($(this).val() == 0 || $(this).val() == 13 || $(this).val() == 3 || $(this).val() == 4 ||
                $(this).val() == 7 || $(this).val() == 8) {
                $('.allHideClass2').hide(300);
                $('#relativeSpouseProfession option').remove();
                $('#relativeSpouseProfession').show(300);
            }

            if ($(this).val() == 1) {
                showProfessionRelative();
                @foreach(professionTypeBCS() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

            if ($(this).val() == 2) {
                showProfessionRelative();
                @foreach(professionTypeGovGrade() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 5) {
                showProfessionRelative();
                @foreach(professionTypeBank() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 6) {
                showProfessionRelative();
                @foreach(professionTypeTeacher() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 9) {
                showProfessionRelative();
                @foreach(professionTypeDefense() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 10) {
                showProfessionRelative();
                @foreach(professionTypeLawyer() as $key => $value)
                $('#spouse_profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

        })



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
    });

</script>
