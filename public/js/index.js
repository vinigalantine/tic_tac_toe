$(document).ready(function () {
    hitBoxEvent();
});

function hitBoxEvent() {
    $('.hit-box').click(function () {

        if ($(this).find('h1').html().trim() == "") {
            $(this).find('h1').html("X");
            $(this).find('input').val("X");


            $('.hit-box').unbind();

            $.ajax({
                url: "/routes.php",
                type: "POST",
                async: false,
                data: {
                    action: "move",
                    id: $('#id').val(),
                    field: $(this).find('input').prop("id"),
                    difficulty: $("#difficulty").val()
                }
            }).done(function (data) {

                if ("board" in data && !("win" in data)) {
                    $('#id').val(data.id);

                    $('#one').val(data.board[0][0]);
                    $('#text-one').html(data.board[0][0]);

                    $('#two').val(data.board[0][1]);
                    $('#text-two').html(data.board[0][1]);

                    $('#three').val(data.board[0][2]);
                    $('#text-three').html(data.board[0][2]);

                    $('#four').val(data.board[1][0]);
                    $('#text-four').html(data.board[1][0]);

                    $('#five').val(data.board[1][1]);
                    $('#text-five').html(data.board[1][1]);

                    $('#six').val(data.board[1][2]);
                    $('#text-six').html(data.board[1][2]);

                    $('#seven').val(data.board[2][0]);
                    $('#text-seven').html(data.board[2][0]);

                    $('#eight').val(data.board[2][1]);
                    $('#text-eight').html(data.board[2][1]);

                    $('#nine').val(data.board[2][2]);
                    $('#text-nine').html(data.board[2][2]);

                    hitBoxEvent();

                } else if ("win" in data) {
                    alert(
                        "The winner is " + data.symbol
                        + "\n (The game will restart in 5(five) seconds)"
                    );

                    $('#one').val(data.board[0][0]);
                    $('#text-one').html(data.board[0][0]);

                    $('#two').val(data.board[0][1]);
                    $('#text-two').html(data.board[0][1]);

                    $('#three').val(data.board[0][2]);
                    $('#text-three').html(data.board[0][2]);

                    $('#four').val(data.board[1][0]);
                    $('#text-four').html(data.board[1][0]);

                    $('#five').val(data.board[1][1]);
                    $('#text-five').html(data.board[1][1]);

                    $('#six').val(data.board[1][2]);
                    $('#text-six').html(data.board[1][2]);

                    $('#seven').val(data.board[2][0]);
                    $('#text-seven').html(data.board[2][0]);

                    $('#eight').val(data.board[2][1]);
                    $('#text-eight').html(data.board[2][1]);

                    $('#nine').val(data.board[2][2]);
                    $('#text-nine').html(data.board[2][2]);

                    setTimeout(function () {
                        location.reload();
                    }, 5000);

                }
            }).fail(function () {

                alert("Error!!! :/");

            });
        }
    });
}