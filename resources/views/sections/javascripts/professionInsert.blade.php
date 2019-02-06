<script>
    $(function () {
        function showProfession() {
            $('.allHideClass').show(300)
            $('#ProfDetailsIdHide').show(300);
            $('.ProfDetailsIdHide').show(300);

            $('#profession_details').children().remove();
            $('#profession_details').append("<option value='0'>Select ...</option>");
        }

        $('#profession').on('change', function () {
            $('.allHideClass').hide(300);

            $('.ProfDetailsIdHide').hide(300);
            $('#profession_details').children().remove();
            if ($(this).val() == 0 ||
                $(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14 ||
                $(this).val() == 15) {
                $('.allHideClass').hide(300);
                $('#profession_details').children().remove();
                $('#ProfDetailsIdHide').hide(300);

            }
            if (
                $(this).val() == 0 ||
                $(this).val() == 13 ||
                $(this).val() == 3 ||
                $(this).val() == 4 ||
                $(this).val() == 7 ||
                $(this).val() == 8
            ) {
                $('.ProfDetailsIdHide').show(300);

                $('#profession_details').children().remove();
                $('.allHideClass').hide(300);
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



        $('#profession_details').children().remove();
        if ($('#profession').val() == 0 || $('#profession').val() == 11 || $('#profession').val() == 12 || $(
                '#profession').val() == 14 ||
            $('#profession').val() == 15) {
            $('.allHideClass').hide(300);
            $('#ProfDetailsIdHide').hide(300);
            $('#profession_details').children().remove();
        }
        if ($('#profession').val() == 0 || $('#profession').val() == 13 || $('#profession').val() == 3 || $(
                '#profession').val() == 4 ||
            $('#profession').val() == 7 || $('#profession').val() == 8) {
            $('.allHideClass').hide(300);
            $('#profession_details').children().remove();
            $('#ProfDetailsIdHide').show(300);
        }

        if ($('#profession').val() == 1) {
            showProfession();
            @foreach(professionTypeBCS() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }

        if ($('#profession').val() == 2) {
            showProfession();
            @foreach(professionTypeGovGrade() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }
        if ($('#profession').val() == 5) {
            showProfession();
            @foreach(professionTypeBank() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }
        if ($('#profession').val() == 6) {
            showProfession();
            @foreach(professionTypeTeacher() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }
        if ($('#profession').val() == 9) {
            showProfession();
            @foreach(professionTypeDefense() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }
        if ($('#profession').val() == 10) {
            professionTypeLawyer();
            @foreach(professionTypeLawyer() as $key => $value)
            $('#profession_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
            @endforeach
        }


        if ($('#profession_details').attr('data-oldval') > 0) {
            oldval = $('#profession_details').attr('data-oldval');
            $("#profession_details option[value=" + oldval + "]").prop("selected", 'selected');
        }

    });

</script>
