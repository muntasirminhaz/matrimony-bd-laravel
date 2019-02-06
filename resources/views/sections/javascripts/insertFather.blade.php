<script>
        $(document).ready(function () {





            /* if ($('#sibLivStatus1').is(':checked')) {
                 $('#HidDivSibLiv').show(300);
             } else {
                 $('#HidDivSibLiv').hide(300);
             }
             $( "#fprofession option:selected" )) 
             */
                //------------------
            if ($('#flstatus1').is(':checked')) {
                $('#liveStausLinkToServiceDivId').show(300);
            } else {
                $('#liveStausLinkToServiceDivId').hide(300);
            }
            //------------------
            $('#fhidpro').hide(300);
            if ($('#fsrvstatus1').is(':checked')) {
                $('#fhidpro').show(300);
            }
            if ($('#fsrvstatus2').is(':checked')) {
                $('#fhidpro').show(300);
            }
            //------------------
            
            if ($( "#fprofession option:selected" ).val() == 0 || $( "#fprofession option:selected" ).val() == 11 ||$( "#fprofession option:selected" ).val() == 12 || $( "#fprofession option:selected" ).val() == 14 || $( "#fprofession option:selected" ).val() == 15) {
                     $('#ProDesignOrgNameDiv').hide(300);

            }
            //------------------
            
            if ($( "#fprofession option:selected" ).val() == 3 || $( "#fprofession option:selected" ).val() == 4|| $( "#fprofession option:selected" ).val() ==7 || $( "#fprofession option:selected" ).val() == 8 || $( "#fprofession option:selected" ).val() == 13 ) {
                     $('#ProDesignOrgNameDiv').show(300);

            }
            //------------------
            
            if ($("#fprofession option:selected" ).val() == 1 || $("#fprofession option:selected" ).val() == 2 || $("#fprofession option:selected" ).val() == 5 || $("#fprofession option:selected" ).val() == 6 || $("#fprofession option:selected" ).val() == 9 || $("#fprofession option:selected" ).val() == 10) {
                     $('#professiondetails').show(300);
                     $('.allHideClass').show(300);
                     $('#ProDesignOrgNameDiv').show(300);
            }
            //------------------
            
               
                $('#profesion_details option').remove();
                if ($('#fprofession').val() == 0 || $('#fprofession').val() == 11 || $('#fprofession').val() == 12 || $('#fprofession').val() == 14 ||
                    $('#fprofession').val() == 15) {
                    $('.allHideClass').hide(300);
                    $('#ProfDetailsIdHide').hide(300);
                    $('#profesion_details option').remove();
                }
                if ($('#fprofession').val() == 0 || $('#fprofession').val() == 13 || $('#fprofession').val() == 3 || $('#fprofession').val() == 4 ||
                    $('#fprofession').val() == 7 || $('#fprofession').val() == 8) {
                    $('.allHideClass').hide(300);
                    $('#profesion_details option').remove();
                    $('#ProfDetailsIdHide').show(300);
                }
    
                if ($('#fprofession').val() == 1) {
                    showProfession();  
                    @foreach( professionTypeBCS() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
                if ($('#fprofession').val() == 2) {
                    showProfession();
                    @foreach( professionTypeGovGrade() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#fprofession').val() == 5) {
                    showProfession();
                    @foreach( professionTypeBank() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#fprofession').val() == 6) {
                    showProfession();
                    @foreach( professionTypeTeacher() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#fprofession').val() == 9) {
                    showProfession();
                    @foreach( professionTypeDefense() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($('#fprofession').val() == 10) {
                    showProfession();
                    @foreach( professionTypeLawyer() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
           
            //===============================================



                     //---------------------------------------------
            //11 12 14 15 siblings Profession 
            $('#fprofession').on('change', function () {
                if ($('#fprofession').val() < 1 || $('#fprofession').val() == 11) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#fprofession').val() < 1 || $('#fprofession').val() == 12) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#fprofession').val() < 1 || $('#fprofession').val() == 14) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else if ($('#fprofession').val() < 1 || $('#fprofession').val() == 15) {
                    $('#ProDesignOrgNameDiv').hide(300);
                } else {
                    $('#ProDesignOrgNameDiv').show(300);
                }
            })
            //===============================================
    
            function showProfession() {
                $('.allHideClass').show(300)
                $('#ProfDetailsIdHide').show(300);
                $('#profesion_details').append("<option value='0'>Select ...</option>");
            }
            
            $('#fprofession').on('change', function () {
                $('.allHideClass').hide(300);
                $('#profesion_details option').remove();
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
                    @foreach( professionTypeBCS() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
                if ($(this).val() == 2) {
                    showProfession();
                    @foreach( professionTypeGovGrade() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 5) {
                    showProfession();
                    @foreach( professionTypeBank() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 6) {
                    showProfession();
                    @foreach( professionTypeTeacher() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 9) {
                    showProfession();
                    @foreach( professionTypeDefense() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
                if ($(this).val() == 10) {
                    showProfession();
                    @foreach( professionTypeLawyer() as $key => $value )
                    $('#profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");         
                    @endforeach
                }
    
            })
            //===============================================
    
            //---------------------------------------------
            /*fatherLiveStatusRadio
            liveStausLinkToServiceDivId*/
            $('.fatherLiveStatusRadio').on('change', function () {
                if ($(this).val() == 1) {
                    $('#liveStausLinkToServiceDivId').show(300);
                } else {
                    $('#liveStausLinkToServiceDivId').hide(300);
                    $('#fhidpro').hide(300);
                }
            })
            //---------------------------------------------
    
            //for father profession 
            $('.fsrvstatus').on('change', function () {
                if (3 == $(this).val()) {
                    $('#fhidpro').hide(300);
                } else {
                    $('#fhidpro').show(300);
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
       
            if($('#profesion_details').attr('data-oldval') > 0){
                oldval = $('#profesion_details').attr('data-oldval');
                $("#profesion_details option[value="+oldval+"]").prop("selected", 'selected');
            }

        })

        

    
    </script>