<script>
    $(function () {
        function showProfession() {
            $('.mother_profesion_details').show(300);
            $('#mother_profesion_details').children().remove();
            $('#mother_profesion_details').attr('required','required');
            $('#mother_profesion_details').append("<option value=''>Select ...</option>");
        }

        $('#mprofession').on('change', function () {
            $('.motherother').hide(300);

            $('.mother_profesion_details').hide(300);
            $('#mother_profesion_details').removeAttr('required');
            $('#mother_profesion_details').children().remove();
            if ($(this).val() == 11 ||
                $(this).val() == 12 ||
                $(this).val() == 14) {
                $('.mother_profesion_details').hide(300);
                $('#mother_profesion_details').children().remove();

            }
            if (
                $(this).val() == 13 ||
                $(this).val() == 3 ||
                $(this).val() == 4 ||
                $(this).val() == 7 ||
                $(this).val() == 8
            ) {
                

                $('#mother_profesion_details').children().remove();
                $('.mother_profesion_details').hide(300);
                

            }

            if ($(this).val() == 1) {
                showProfession();
                @foreach(professionTypeBCS() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }

            if ($(this).val() == 2) {
                showProfession();
                @foreach(professionTypeGovGrade() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 5) {
                showProfession();
                @foreach(professionTypeBank() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 6) {
                showProfession();
                @foreach(professionTypeTeacher() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 9) {
                showProfession();
                @foreach(professionTypeDefense() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 10) {
                showProfession();
                @foreach(professionTypeLawyer() as $key => $value)
                $('#mother_profesion_details').append("<option value='{{ $key }}'>{{ $value }}</option>");
                @endforeach
            }
            if ($(this).val() == 15) {
               $('.motherother').show(300);
            }

        })



    });
</script>
