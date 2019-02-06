<script>
    $(function () {
        $('#toggle-form').on('click', function () {
            $('.show-userinfo').toggle(300);
            $('.show-form').toggle(300);

            $(this).toggleClass('btn-danger');
            $(this).toggleClass('btn-info');

            if ($('#toggle-form .edit-text').text() == 'Edit') {
                $('#toggle-form .edit-icon').removeClass('fa-edit');
                $('#toggle-form .edit-icon').addClass('fa-window-close');
                $('#toggle-form .edit-text').text('Cancel Edit');
            } else {
                $('#toggle-form .edit-icon').removeClass('fa-window-close');
                $('#toggle-form .edit-icon').addClass('fa-edit');
                $('#toggle-form .edit-text').text('Edit');
            }

        });



        /*Personal : Which Form to Show :  start */
        if ($('#presentbd').attr('checked')) {
            $('#personalabroadform').hide(300);
            $('#personalbdform').show(300);
        }
        if ($('#presentabroad').attr('checked')) {
            $('#personalabroadform').toggle(300);
            $('#personalbdform').toggle(300);
        }

        $('.livein').on('change', function () {
            if (1 == $(this).val()) {
                $('#personalbdform').toggle(300);
                $('#personalabroadform').toggle(300);
            } else {
                $('#personalbdform').toggle(300);
                $('#personalabroadform').toggle(300);

            }
        });

        /*Personal Form Start */
        $('#personaldivision').attr('disabled', 'disabled');
        $('#personaldistrict').attr('disabled', 'disabled');
        $('#personalupzila').attr('disabled', 'disabled');

        personalFormOnload({{ $userinfo->present_address_upzilla ?? 0 }});

        function personalFormOnload(upzila) {
            $('#personaldivision').append("<option value='0' selected>Select Division</option>");
            @foreach($divisions as $division) $('#personaldivision').append(
                "<option value='{{  $division->id }}'>{{ $division->name }}</option>");
            @endforeach
            $('#personaldistrict').append("<option value='0' selected>Select District</option>");
            @foreach($districts as $district) $('#personaldistrict').append(
                "<option data-division='{{  $district->division_id }}' value='{{  $district->id }}'>{{ $district->name }}</option>"
            );
            @endforeach
            $('#personalupzila').append("<option value='0' selected>Select District</option>");
            @foreach($upazilas as $upzila) $('#personalupzila').append(
                "<option data-district='{{  $upzila->district_id }}' value='{{  $upzila->id }}'>{{ $upzila->name }}</option>"
            );
            @endforeach
            if (upzila !== 0) {
                $("#personalupzila option[value=" + upzila + "]").attr('selected', 'selected');
                $("#personaldistrict option[value=" + $("#personalupzila option[value=" + upzila + "]").attr(
                    'data-district') + "]").attr('selected', 'selected');
                division = $("#personaldistrict option[value=" + $("#personalupzila option[value=" + upzila +
                    "]").attr('data-district') + "]").attr('data-division');
                $("#personaldivision option[value=" + division + "]").attr('selected', 'selected');
                $('#personaldivision').removeAttr('disabled');
            }
        }

        function setDisrict(divisionId) {
            $('#personaldistrict').children().remove();
            $('#personaldistrict').append("<option value='0' selected>Select District</option>");

            if (divisionId == 0) {
                $('#personaldistrict').attr('disabled', 'disabled');
                $('#personalupzila').attr('disabled', 'disabled');
                $('#personaldistrict').children().remove();
                $('#personalupzila ').children().remove();
                $('#personaldistrict').append("<option value='0' selected>Select District</option>");
                $('#personalupzila').append("<option value='0' selected>Select Uppozilla</option>");
            }
            @foreach($divisions as $division)
            if (divisionId == {{ $division->id }}) {
                @foreach($districts as $district)
                @if($district->division_id == $division->id)
                $('#personaldistrict').append(
                    "<option data-division='{{  $district->division_id }}' value='{{  $district->id }}'>{{ $district->name }}</option>"
                );
                @endif
                @endforeach
            }
            @endforeach
            $('#personaldistrict').removeAttr('disabled');
        }

        function setUpazila(disrictId) {
            $('#personalupzila').children().remove();
            $('#personalupzila').append("<option value='0' selected>Select Uppozilla</option>");
            if (disrictId == 0) {
                $('#personalupzila').attr('disabled', 'disabled');
                $('#personalupzila').children().remove();
                $('#personalupzila').append("<option value='0' selected>Select Uppozilla</option>");
            }
            @foreach($districts as $district)
            if (divisionId == {{ $division->id }}) {
                @foreach($upazilas as $upzila)
                $('#personalupzila').append(
                    "<option data-district='{{  $upzila->district_id }}' value='{{  $upzila->id }}'>{{ $upzila->name }}</option>"
                );
                @endforeach
            }
            @endforeach
            $('#personalupzila').removeAttr('disabled');
        }
        $('#personaldivision').on('change', function () {
            setDisrict($(this).val());
        });

        $('#personaldistrict').on('change', function () {
            setUpazila($(this).val());
        });
        /* Personal Form : End */




        /*Familty : Which Form to Show :  start */


        $('.familtylivein').on('change', function () {
            if (3 == $(this).val()) {
                $('#familtybdform').hide(300);
                $('#familtyabroadform').show(300);
            }
            if (2 == $(this).val()) {


                $('#familtyabroadform').hide(300);
                $('#familtybdform').show(300);

            }
            if (1 == $(this).val()) {
                $('#familtybdform').hide(300);
                $('#familtyabroadform').hide(300);
            }
        });

        /*Familty : Which Form to Show :  End */



        if ($('#familtysame').attr('checked')) {
            $('#familtybdform').hide(300);
            $('#familtyabroadform').hide(300);
        }
        if ($('#familtybangladesh').attr('checked')) {
            $('#familtybdform').show(300);
            $('#familtyabroadform').hide(300);
        }

        if ($('#familtyabroad').attr('checked')) {
            $('#familtybdform').hide(300);
            $('#familtyabroadform').show(300);
        }



        $('#familydivision').attr('disabled', 'disabled');
        $('#familydistrict').attr('disabled', 'disabled');
        $('#familyupzila').attr('disabled', 'disabled');

        familyFormOnload({{ $userinfo->present_address_upzilla ?? 0}});

        function familyFormOnload(upzila) {
            $('#familydivision').append("<option value='0' selected>Select Division</option>");
            @foreach($divisions as $division) $('#familydivision').append(
                "<option value='{{ $division->id }}'>{{ $division->name }}</option>");
            @endforeach
            $('#familydistrict').append("<option value='0' selected>Select District</option>");
            @foreach($districts as $district) $('#familydistrict').append(
                "<option data-division='{{ $district->division_id }}' value='{{  $district->id }}'>{{ $district->name }}</option>"
            );
            @endforeach
            $('#familyupzila').append("<option value='0' selected>Select District</option>");
            @foreach($upazilas as $upzila) $('#familyupzila').append(
                "<option data-district='{{ $upzila->district_id }}' value='{{ $upzila->id }}'>{{ $upzila->name }}</option>"
            );
            @endforeach
            if (upzila !== 0) {
                $("#familyupzila option[value=" + upzila + "]").attr('selected', 'selected');
                $("#familydistrict option[value=" + $("#familyupzila option[value=" + upzila + "]").attr(
                    'data-district') + "]").attr('selected', 'selected');
                division = $("#familydistrict option[value=" + $("#familyupzila option[value=" + upzila + "]").attr(
                    'data-district') + "]").attr('data-division');
                $("#familydivision option[value=" + division + "]").attr('selected', 'selected');
                $('#familydivision').removeAttr('disabled');
            }
        }

        function setDisrict(divisionId) {
            $('#familydistrict').children().remove();
            $('#familydistrict').append("<option value='0' selected>Select District</option>");

            if (divisionId == 0) {
                $('#familydistrict').attr('disabled', 'disabled');
                $('#familyupzila').attr('disabled', 'disabled');
                $('#familydistrict').children().remove();
                $('#familyupzila ').children().remove();
                $('#familydistrict').append("<option value='0' selected>Select District</option>");
                $('#familyupzila').append("<option value='0' selected>Select Uppozilla</option>");
            }
            @foreach($divisions as $division)
            if (divisionId == {{ $division->id }} ) {
                @foreach($districts as $district)
                @if($district->division_id == $division->id)
                $('#familydistrict').append(
                    "<option data-division='{{  $district->division_id }}' value='{{  $district->id }}'>{{ $district->name }}</option>"
                );
                @endif
                @endforeach
            }
            @endforeach
            $('#familydistrict').removeAttr('disabled');
        }

        function setUpazila(disrictId) {
            $('#familyupzila').children().remove();
            $('#familyupzila').append("<option value='0' selected>Select Uppozilla</option>");
            if (disrictId == 0) {
                $('#familyupzila').attr('disabled', 'disabled');
                $('#familyupzila').children().remove();
                $('#familyupzila').append("<option value='0' selected>Select Uppozilla</option>");
            }
            @foreach($districts as $district)
            if (divisionId == {{ $division->id }} ) {
                @foreach($upazilas as $upzila)
                $('#familyupzila').append(
                    "<option data-district='{{  $upzila->district_id }}' value='{{  $upzila->id }}'>{{ $upzila->name }}</option>"
                );
                @endforeach
            }
            @endforeach
            $('#familyupzila').removeAttr('disabled');
        }
        $('#familydivision').on('change', function () {
            setDisrict($(this).val());
        });

        $('#familydistrict').on('change', function () {
            setUpazila($(this).val());
        });

    });

</script>