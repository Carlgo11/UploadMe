$(function () {
        $('#submit').attr("disabled", true);

        $('#file').change(function () {
            if ($('#file').val().length == 0)
                $('#submit').attr("disabled", true);
            else
                $('#submit').attr("disabled", false);
        });
    });