$(document).ready(function () {

    var old_row_val = 4,
        old_col_val = 6,
        icons_num,
        icons = 24,
        custom = 0,
        check_re = 0,
        check_bomb = 0,
        check_tips = 0,
        check_peek = 0,
        re_icon_num = 2,
        bomb_icon_num = 2,
        level;

    $('#row').click(function () {

        no_odd_cell();
        icons_num = "Total Icons in Game: ";
        icons_num = icons_num.substring(0, 21) + (row_val * col_val);
        $('#icons_num').html(icons_num);
        check_re_bomb_num();

    })

    $('#col').click(function () {

        no_odd_cell();
        icons_num = "Total Icons in Game: ";
        icons_num = icons_num.substring(0, 21) + (row_val * col_val);
        $('#icons_num').html(icons_num);
        check_re_bomb_num();

    })

    function no_odd_cell() {
        row_val = Number($('#row').val());
        col_val = Number($('#col').val());

        //console.log("rwo:"+row_val);
        //console.log("col:"+col_val);

        if ((row_val % 2 != 0) && (col_val % 2 != 0)) {

            //console.log("old_row:"+old_row_val);
            //console.log("old_col:"+old_col_val);

            if ((row_val < old_row_val) || (col_val < old_col_val)) {
                row_val = row_val - 1;
                $('#row').attr('value', row_val);
                $('#row').val(row_val);
            } else if ((row_val > old_row_val) || (col_val > old_col_val)) {
                row_val = row_val + 1;
                $('#row').attr('value', row_val);
                $('#row').val(row_val);
            }
        }
        old_row_val = row_val;
        old_col_val = col_val;
    }

    $('.level').click(function () {

        level = $(this).attr('value');

        var postdata = {
            level: level,
        }

        var rules = $.ajax({
            url: "level.php",
            method: "POST",
            data: postdata,
            dataType: "text",
            success: function (data) {
                $('.level_rules').html("");
                $('.level_rules').html(data);
            },

        });

    })

    $('.easy').click(function () {
        $('.customize_table, .choose_ramdomly_tr').hide();
        if (custom == 1) {
            custom--;
            check_avalible();
            check_radio();
        }
    })

    $('.normal').click(function () {
        $('.customize_table, .choose_ramdomly_tr').hide();
        if (custom == 1) {
            custom--;
            check_avalible();
            check_radio();
        }
    })

    $('.hard').click(function () {
        $('.customize_table, .choose_ramdomly_tr').hide();
        if (custom == 1) {
            custom--;
            check_avalible();
            check_radio();
        }
    })

    $('.custom').click(function () {
        custom++;
        $('.customize_table, .choose_ramdomly_tr').show();
        if (custom == 1) {
            check_avalible();
            re_custom_radio();
        }
    })

    $('.check_peek').click(function () {

        if (check_peek == 0) {
            check_peek = 1;
        } else if (check_peek == 1) {
            check_peek = 0;
        }

        if ($('.peek').attr('disabled') == "disabled") {
            $('.peek').removeAttr('disabled');
        } else if (typeof $('.peek').attr('disabled') == 'undefined') {
            $('.peek').attr('disabled', "");
        }
    })

    $('.check_tips').click(function () {

        if (check_tips == 0) {
            check_tips = 1;
        } else if (check_tips == 1) {
            check_tips = 0;
        }

        if ($('.tips').attr('disabled') == "disabled") {
            $('.tips').removeAttr('disabled');
        } else if (typeof $('.tips').attr('disabled') == 'undefined') {
            $('.tips').attr('disabled', "");
        }
    })

    $('.check_re').click(function () {

        if (check_re == 0) {
            check_re = 1;
        } else if (check_re == 1) {
            check_re = 0;
        }

        if ($('.re_radio').attr('disabled') == "disabled") {
            $('.re_radio').removeAttr('disabled');
        } else if (typeof $('.re_radio').attr('disabled') == 'undefined') {
            $('.re_radio').attr('disabled', "");
        }

        check_re_bomb_num();
    })

    $('.check_bomb').click(function () {

        if (check_bomb == 0) {
            check_bomb = 1;
        } else if (check_bomb == 1) {
            check_bomb = 0;
        }

        if ($('.bomb_radio').attr('disabled') == "disabled") {
            $('.bomb_radio').removeAttr('disabled');
        } else if (typeof $('.bomb_radio').attr('disabled') == 'undefined') {
            $('.bomb_radio').attr('disabled', "");
        }

        check_re_bomb_num();
    })

    $('.re_radio').click(function () {
        re_icon_num = Number($(this).attr('value'));
        check_re_bomb_num();
    })

    $('.bomb_radio').click(function () {
        bomb_icon_num = Number($(this).attr('value'));
        check_re_bomb_num();
    })

    $('.random').click(function () {


        var random_row = Math.round((2 + Math.random() * 8));
        var random_col = Math.round((4 + Math.random() * 6));

        $('#row').attr('value', random_row);
        $('#col').attr('value', random_col);
        $('#row').val(random_row);
        $('#col').val(random_col);

        no_odd_cell();

        icons_num = "Total Icons in Game: ";
        icons_num = icons_num.substring(0, 21) + (row_val * col_val);
        $('#icons_num').html(icons_num);

        var datapost = {
            row_num: $('#row').attr('value'),
            col_num: $('#col').attr('value'),
        }

        var random_op = $.ajax({

            url: "random_op.php",
            method: "POST",
            data: datapost,
            dataType: "text",
            success: function (data) {

                $('.chance_op').html(data.substring(1, 351));
                $('.check_tips').click(function () {

                    if (check_tips == 0) {
                        check_tips = 1;
                    } else if (check_tips == 1) {
                        check_tips = 0;
                    }

                    if ($('.tips').attr('disabled') == "disabled") {
                        $('.tips').removeAttr('disabled');
                    } else if (typeof $('.tips').attr('disabled') == 'undefined') {
                        $('.tips').attr('disabled', "");
                    }
                })

                $('.peek_op').html(data.substring(352, 689));
                $('.check_peek').click(function () {

                    if (check_peek == 0) {
                        check_peek = 1;
                    } else if (check_peek == 1) {
                        check_peek = 0;
                    }

                    if ($('.peek').attr('disabled') == "disabled") {
                        $('.peek').removeAttr('disabled');
                    } else if (typeof $('.peek').attr('disabled') == 'undefined') {
                        $('.peek').attr('disabled', "");
                    }
                })

                $('.re_op').html(data.substring(690, 1426));

                re_icon_num = Number($('.rand_renum').attr('data-randnum'));
                //console.log(re_icon_num);

                if (typeof $('.check_re').attr('checked') === "undefined") {
                    check_re = 0;
                } else {
                    check_re = 1;
                }

                $('.check_re').click(function () {

                    if (check_re == 0) {
                        check_re = 1;
                    } else if (check_re == 1) {
                        check_re = 0;
                    }

                    if ($('.re_radio').attr('disabled') == "disabled") {
                        $('.re_radio').removeAttr('disabled');
                    } else if (typeof $('.re_radio').attr('disabled') == 'undefined') {
                        $('.re_radio').attr('disabled', "");
                    }

                    check_re_bomb_num();
                })

                $('.re_radio').click(function () {
                    re_icon_num = Number($(this).attr('value'));
                    check_re_bomb_num();
                })

                $('.bomb_op').html(data.substring(1427, data.length));

                bomb_icon_num = Number($('.rand_bombnum').attr('data-randnum'));
                //console.log(bomb_icon_num);

                if (typeof $('.check_bomb').attr('checked') === "undefined") {
                    check_bomb = 0;
                } else {
                    check_bomb = 1;
                }

                $('.check_bomb').click(function () {

                    if (check_bomb == 0) {
                        check_bomb = 1;
                    } else if (check_bomb == 1) {
                        check_bomb = 0;
                    }

                    if ($('.bomb_radio').attr('disabled') == "disabled") {
                        $('.bomb_radio').removeAttr('disabled');
                    } else if (typeof $('.bomb_radio').attr('disabled') == 'undefined') {
                        $('.bomb_radio').attr('disabled', "");
                    }

                    check_re_bomb_num();
                })

                $('.bomb_radio').click(function () {
                    bomb_icon_num = Number($(this).attr('value'));
                    check_re_bomb_num();
                })


            },

        });

    })


    function check_avalible() {

        if ($('.check_tips').attr('disabled') == "disabled") {
            $('.check_tips').removeAttr('disabled');
        } else if (typeof $('.check_tips').attr('disabled') == 'undefined') {
            $('.check_tips').attr('disabled', "");
        }

        if ($('.check_peek').attr('disabled') == "disabled") {
            $('.check_peek').removeAttr('disabled');
        } else if (typeof $('.check_peek').attr('disabled') == 'undefined') {
            $('.check_peek').attr('disabled', "");
        }

        if ($('.check_re').attr('disabled') == "disabled") {
            $('.check_re').removeAttr('disabled');
        } else if (typeof $('.check_re').attr('disabled') == 'undefined') {
            $('.check_re').attr('disabled', "");
        }

        if ($('.check_bomb').attr('disabled') == "disabled") {
            $('.check_bomb').removeAttr('disabled');
        } else if (typeof $('.check_bomb').attr('disabled') == 'undefined') {
            $('.check_bomb').attr('disabled', "");
        }

        if ($('#row').attr('disabled') == "disabled") {
            $('#row').removeAttr('disabled');
        } else if (typeof $('#row').attr('disabled') == 'undefined') {
            $('#row').attr('disabled', "");
        }

        if ($('#col').attr('disabled') == "disabled") {
            $('#col').removeAttr('disabled');
        } else if (typeof $('#col').attr('disabled') == 'undefined') {
            $('#col').attr('disabled', "");
        }

        if ($('.random').attr('disabled') == "disabled") {
            $('.random').removeAttr('disabled');
        } else if (typeof $('#col').attr('.random') == 'undefined') {
            $('.random').attr('disabled', "");
        }
    }

    function check_radio() {

        if (typeof $('.tips').attr('disabled') == "undefined") {
            $('.tips').attr('disabled', "");
        }

        if (typeof $('.peek').attr('disabled') == "undefined") {
            $('.peek').attr('disabled', "");
        }

        if (typeof $('.re_radio').attr('disabled') == "undefined") {
            $('.re_radio').attr('disabled', "");
        }

        if (typeof $('.bomb_radio').attr('disabled') == "undefined") {
            $('.bomb_radio').attr('disabled', "");
        }
    }

    function re_custom_radio() {

        if (check_tips == 1) {
            $('.tips').removeAttr('disabled');
        }

        if (check_peek == 1) {
            $('.peek').removeAttr('disabled');
        }

        if (check_re == 1) {
            $('.re_radio').removeAttr('disabled');
        }

        if (check_bomb == 1) {
            $('.bomb_radio').removeAttr('disabled');
        }
    }

    function check_re_bomb_num() {

        if (typeof row_val != "undefined" && typeof col_val != "undefined") {
            icons = row_val * col_val;
        }

        console.log(check_re);
        console.log(check_bomb);
        console.log(re_icon_num);
        console.log(bomb_icon_num);
        console.log(icons);

        if (check_re == 1 && check_bomb == 1) {
            //console.log("check both");
            if (re_icon_num + bomb_icon_num >= icons) {
                //console.log("Ops")
                alert("Total Icons need to larger than Refresh Icons + Bomb Icons !");
                $('.sub_op_button').attr('disabled', "");
            } else {
                if ($('.sub_op_button').attr('disabled') === "disabled") {
                    $('.sub_op_button').removeAttr('disabled');
                }
            }
        } else if (check_re == 1 && check_bomb == 0) {
            //console.log("only check refresh");
            if (re_icon_num >= icons) {
                //console.log("Ops")
                alert("Total Icons need to larger than Refresh Icons + Bomb Icons !");
                $('.sub_op_button').attr('disabled', "");
            } else {
                if ($('.sub_op_button').attr('disabled') === "disabled") {
                    $('.sub_op_button').removeAttr('disabled');
                }
            }
        } else if (check_re == 0 && check_bomb == 1) {
            //console.log("only check bomb");
            if (bomb_icon_num >= icons) {
                //console.log("Ops")
                alert("Total Icons need to larger than Refresh Icons + Bomb Icons !");
                $('.sub_op_button').attr('disabled', "");
            } else {
                if ($('.sub_op_button').attr('disabled') === "disabled") {
                    $('.sub_op_button').removeAttr('disabled');
                }
            }
        }
    }

})
