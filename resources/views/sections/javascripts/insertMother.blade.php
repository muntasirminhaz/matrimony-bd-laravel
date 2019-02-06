<script>
        $(document).ready(function () {





            /* if ($('#sibLivStatus1').is(':checked')) {
                 $('#HidDivSibLiv').show(300);
             } else {
                 $('#HidDivSibLiv').hide(300);
             }
             $( "#mprofession option:selected" )) 
             */
                //------------------
            if ($('#mlstatus1').is(':checked')) {
                $('#motherliveStausLinkToServiceDivId').show(300);
            } else {
                $('#motherliveStausLinkToServiceDivId').hide(300);
            }
            //------------------
            $('#mhidpro').hide(300);
            if ($('#msrvstatus1').is(':checked')) {
                $('#mhidpro').show(300);
            }
            if ($('#msrvstatus2').is(':checked')) {
                $('#mhidpro').show(300);
            }
            //------------------
            
            if ($( "#mprofession option:selected" ).val() == 0 || $( "#mprofession option:selected" ).val() == 11 ||$( "#mprofession option:selected" ).val() == 12 || $( "#mprofession option:selected" ).val() == 14 || $( "#mprofession option:selected" ).val() == 15) {
                     $('#ProDesignOrgNameDiv').hide(300);

            }
            //------------------
            
            if ($( "#mprofession option:selected" ).val() == 3 || $( "#mprofession option:selected" ).val() == 4|| $( "#mprofession option:selected" ).val() ==7 || $( "#mprofession option:selected" ).val() == 8 || $( "#mprofession option:selected" ).val() == 13 ) {
                     $('#ProDesignOrgNameDiv').show(300);

            }
            //------------------
            
            if ($("#mprofession option:selected" ).val() == 1 || $("#mprofession option:selected" ).val() == 2 || $("#mprofession option:selected" ).val() == 5 || $("#mprofession option:selected" ).val() == 6 || $("#mprofession option:selected" ).val() == 9 || $("#mprofession option:selected" ).val() == 10) {
                     $('#professiondetails').show(300);
                     $('.allHideClass').show(300);
                     $('#ProDesignOrgNameDiv').show(300);
            }
            //------------------
            
               
                $('#mother_profesion_details option').remove();
                if ($('#mprofession').val() == 0 || $('#mprofession').val() == 11 || $('#mprofession').val() == 12 || $('#mprofession').val() == 14 ||
                    $('#mprofession').val() == 15) {
                    $('.allHideClass').hide(300);
                    $('#ProfDetailsIdHide').hide(300);
                    $('#mother_profesion_details option').remove();
                }
                if ($('#mprofession').val() == 0 || $('#mprofession').val() == 13 || $('#mprofession').val() == 3 || $('#mprofession').val() == 4 ||
                    $('#mprofession').val() == 7 || $('#mprofession').val() == 8) {
                    $('.allHideClass').hide(300);
                    $('#mother_profesion_details option').remove();
                    $('#ProfDetailsIdHide').show(300);
                }
    
                if ($('#mprofession').val() == 1) {
                    showProfession();  
                    @foreach( professionTypeBCS() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
                if ($('#mprofession').val() == 2) {
                    showProfession();
                    @foreach( professionTypeGovGrade() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#mprofession').val() == 5) {
                    showProfession();
                    @foreach( professionTypeBank() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#mprofession').val() == 6) {
                    showProfession();
                    @foreach( professionTypeTeacher() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#mprofession').val() == 9) {
                    showProfession();
                    @foreach( professionTypeDefense() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#mprofession').val() == 10) {
                    showProfession();
                    @foreach( professionTypeLawyer() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
           
            //===============================================



                     //---------------------------------------------
            //11 12 14 15 siblings Profession 
            $('#mprofession').on('change', function () {
                if ($('#mprofession').val() < 1 || $('#mprofession').val() == 11) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#mprofession').val() < 1 || $('#mprofession').val() == 12) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#mprofession').val() < 1 || $('#mprofession').val() == 14) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#mprofession').val() < 1 || $('#mprofession').val() == 15) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else {
                    $('#ProDesignOrgNameDiv').show(300);
                }
            })
            //===============================================
    
            function showProfession() {
                $('.allHideClass').show(300)
                $('#ProfDetailsIdHide').show(300);
                $('#mother_profesion_details').append("<option value='0'>Select ...</option>");
            }
            
            $('#mprofession').on('change', function () {
                $('.allHideClass').hide(300);
                $('#mother_profesion_details option').remove();
                if ($(this).val() == 0 || $(this).val() == 11 || $(this).val() == 12 || $(this).val() == 14 ||
                    $(this).val() == 15) {
                    $('.allHideClass').hide(300);
                    $('#ProfDetailsIdHide').hide(300);
                    $('#mother_profesion_details option').remove();
                }
                if ($(this).val() == 0 || $(this).val() == 13 || $(this).val() == 3 || $(this).val() == 4 ||
                    $(this).val() == 7 || $(this).val() == 8) {
                    $('.allHideClass').hide(300);
                    $('#mother_profesion_details option').remove();
                    $('#ProfDetailsIdHide').show(300);
                }
    
                if ($(this).val() == 1) {
                    showProfession();  
                    @foreach( professionTypeBCS() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
                if ($(this).val() == 2) {
                    showProfession();
                    @foreach( professionTypeGovGrade() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 5) {
                    showProfession();
                    @foreach( professionTypeBank() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 6) {
                    showProfession();
                    @foreach( professionTypeTeacher() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 9) {
                    showProfession();
                    @foreach( professionTypeDefense() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 10) {
                    showProfession();                    
                    @foreach( professionTypeLawyer() as $key => $value )
                    $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
            })
            //===============================================
    
            //---------------------------------------------
            /*motherLiveStatusRadio
            motherliveStausLinkToServiceDivId*/
            $('.motherLiveStatusRadio').on('change', function () {
                if ($(this).val() == 1) {
                    $('#motherliveStausLinkToServiceDivId').show(300);
                } else {
                    $('#motherliveStausLinkToServiceDivId').hide(300);
                    $('#mhidpro').hide(300);
                }
            })
            //---------------------------------------------
    
            //for father profession 
            $('.msrvstatus').on('change', function () {
                if (3 == $(this).val()) {
                    $('#mhidpro').hide(300);
                } else {
                    $('#mhidpro').show(300);
                }
            })
            //for mother profession
    
            $('.msrvclass').on('change', function () {
                //alert($(this).val());
                if (3 == $(this).val()) {
                    $('#mhidpro').hide(300);
                } else {
                    $('#mhidpro').show(300);
                }
            })
       
            if($('#mother_profesion_details').attr('data-oldval') > 0){
                oldval = $('#mother_profesion_details').attr('data-oldval');
                $("#mother_profesion_details option[value="+oldval+"]").prop("selected", 'selected');
            }

        })

        

    
    </script>