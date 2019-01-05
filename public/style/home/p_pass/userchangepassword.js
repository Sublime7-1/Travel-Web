//验证确认密码
function check_password() {
    var old_pwd = $("#old_pwd").val();
    var password = $("#password").val();
    var password_tip = $('#password-tip');
    var password_tip_inner = $('#password-tip .input-tip-inner');
    var rule = /^(?![\d]+$)(?![a-zA-Z]+$)(?![^\da-zA-Z]+$).{8,16}$/i;
    if (password.indexOf(" ") >= 0) {
        password_tip.removeClass('ok');
        password_tip.addClass('err');
        password_tip_inner.html('<p>密码中请不要包含空格</p>');
        password_tip_inner.show();
        $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
        return false;
    }

    password = password.replace(/(^\s*)|(\s*$)/g, '');

    if (password == '') {
        password_tip.removeClass('ok');
        password_tip.addClass('err');
        password_tip_inner.html('<p>请输入密码</p>');
        password_tip_inner.show();
        $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
        return false;
    }

    if (password.length < 8 || !rule.test(password) || password.length > 16) {
        $('#password-tip').removeClass('ok');
        $('#password-tip').addClass('err');
        password_tip_inner.html('<p>请输入符合提示规则的密码</p>');
        password_tip_inner.show();
        return false;
    }

    if (old_pwd == password) {
        password_tip.removeClass('ok');
        password_tip.addClass('err');
        password_tip_inner.html('<p>新密码不能与原密码相同</p>');
        ;
        password_tip_inner.show();
        return false;
    }

    password_tip.removeClass('ok');
    password_tip.removeClass('err');
    password_tip_inner.html('<p></p>');
    password_tip_inner.hide();
    return true;

}
function check_passwordagain() {
    var password = $("#password").val();
    password = password.replace(/(^\s*)|(\s*$)/g, '');
    var passwordagain = $("#passwordagain").val();
    if (passwordagain.indexOf(" ") >= 0) {
        $('#passwordagain-tip').removeClass('ok');
        $('#passwordagain-tip').addClass('err');
        $('#passwordagain-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
        $('#passwordagain-tip .input-tip-inner').show();
        return false;
    }
    passwordagain = passwordagain.replace(/(^\s*)/g, "");
    if (passwordagain == '') {
        $('#passwordagain-tip').removeClass('ok');
        $('#passwordagain-tip').addClass('err');
        $('#passwordagain-tip .input-tip-inner').html('<p>请输入确认密码</p>');
        $('#passwordagain-tip .input-tip-inner').show();
        return false;
    }
    if (password != '') {
        if (passwordagain != password) {
            $('#passwordagain-tip').removeClass('ok');
            $('#passwordagain-tip').addClass('err');
            $('#passwordagain-tip .input-tip-inner').html('<p>两次密码输入不一致，请重新输入</p>');
            $('#passwordagain-tip .input-tip-inner').show();
            return false;
        }
    }

    $('#passwordagain-tip').addClass('ok');
    $('#passwordagain-tip').removeClass('err');
    $('#passwordagain-tip .input-tip-inner').html('<p></p>');
    return true;
}

function check_oldpwd() {
    var old_pwd = $("#old_pwd").val();
    if (old_pwd.indexOf(" ") >= 0) {
        $('#oldpwd-tip').removeClass('ok');
        $('#oldpwd-tip').addClass('err');
        $('#oldpwd-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
        $('#oldpwd-tip .input-tip-inner').show();
        return false;
    }

    old_pwd = old_pwd.replace(/(^\s*)|(\s*$)/g, '');
    if (old_pwd == '') {
        $('#oldpwd-tip').removeClass('ok');
        $('#oldpwd-tip').addClass('err');
        $('#oldpwd-tip .input-tip-inner').html('<p>请输入原密码</p>');
        $('#oldpwd-tip .input-tip-inner').show();
        return false;
    }
    if (old_pwd.length < 8) {
        $('#oldpwd-tip').removeClass('ok');
        $('#oldpwd-tip').addClass('err');
        $('#oldpwd-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
        $('#oldpwd-tip .input-tip-inner').show();
        return false;
    }
    var url = "/userChangeAjax/checkPassword";
    $.ajax({
        url: url,
        data: {
            old_pwd: md5(old_pwd)
        },
        type: 'post',
        async: false,
        dataType: 'json',
        success: function(data) {
            if (data.success && data.data == 1) {
                $('#oldpwd-tip').addClass('ok');
                $('#oldpwd-tip').removeClass('err');
                $('#oldpwd-tip .input-tip-inner').html('<p></p>');
                return true;
            } else {
                $('#oldpwd-tip').removeClass('ok');
                $('#oldpwd-tip').addClass('err');
                $('#oldpwd-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
                $('#oldpwd-tip .input-tip-inner').show();
                return false;
            }
        }
    });

}

function change_pwd() {
    if (!check_password()) {
        return false;
    }
    if (!check_passwordagain()) {
        return false;
    }

    var old_pswd = $("#old_pwd").val();
    var new_pswd = $("#password").val();
    var pwd_s = $("#pwd_s").val();
    var url = "/userChangeAjax/changePassword";
    $("#tel_submit_ing").show();
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            old: md5(old_pswd),
            new: md5(new_pswd),
            pwd_s: md5(pwd_s)
        },
        success: function(data) {
            $("#tel_submit_ing").hide();
            $("#old_pwd").val('');
            $("#password").val('');
            $("#passwordagain").val('');
            switch (data.data) {
                case 1:
                    layer.alert("恭喜，您的密码修改成功，可能需要等待1到2分钟生效！");
                    break;
                case 2:
                    layer.alert("对不起，密码修改失败，请重试！");
                    break;
                default:
                    layer.alert("原密码填写错误，请重试！");
                    break;
            }
            $('#oldpwd-tip').removeClass('ok');
            $('#oldpwd-tip').removeClass('err');
            $('#oldpwd-tip .input-tip-inner').html('<p></p>');
            $('#passwordagain-tip').removeClass('ok');
            $('#passwordagain-tip').removeClass('err');
            $('#password-tip').removeClass('ok');
            $('#password-tip').removeClass('err');
            $('#passwordagain-tip .input-tip-inner').html('<p></p>');
            $('#password-state .password-state-inner').html('<span>密码需由8位数字、字母或符号组成，至少含有2种及以上的字符</span>');
        }
    }, 'json');
}

//密码强度
jQuery.fn.passwordStrength = function(options) {
    var pass = document.getElementById("password");
    if (pass == null) {
        return;
    }
    document.getElementById("password").maxLength = 16;
    //var element = this;
    $(this).live(
            'keyup',
            function() {
                var pass = $.trim($(this).val());
                var level_score = 0;
                var rating = 0;
                var numericTest = /[0-9]/;
                var lowerCaseAlphaTest = /[a-z]/;
                var upperCaseAlphaTest = /[A-Z]/;
                var symbolsTest = /[\\.,!@#$%^&*()}{:<>|]/;
                if (numericTest.test(pass)) {
                    level_score++;
                }
                if (lowerCaseAlphaTest.test(pass)
                        || upperCaseAlphaTest.test(pass)) {
                    level_score++;
                }
                if (symbolsTest.test(pass)) {
                    level_score++;
                }
                if (pass.length > 0 && pass.length <= 8) {
                    rating = 1;
                } else if (level_score < 3 && pass.length > 8) {
                    rating = 2;
                } else if (level_score = 3 && pass.length > 8) {
                    rating = 3;
                }
                if (rating == 1) {
                    document.getElementById('pwd_s').value = 1;
                    $('#password-state .password-state-inner span')
                            .attr('class', '');
                    $('#password-state .password-state-inner span').text(" ").addClass(
                            'reg_mes mes_pass_weak').text(" ");
                } else if (rating == 2) {
                    $('#password-state .password-state-inner span')
                            .attr('class', '');
                    $('#password-state .password-state-inner span').text(" ").addClass(
                            'reg_mes mes_pass_in');
                    document.getElementById('pwd_s').value = 2;
                } else if (rating == 3) {
                    $('#password-state .password-state-inner span')
                            .attr('class', '');
                    $('#password-state .password-state-inner span').text(" ").addClass(
                            'reg_mes mes_pass_strong');
                    document.getElementById('pwd_s').value = 3;
                }
            });

    $(this).live('blur', function() {
        var psw = $("#password").val();
        if (psw.indexOf(" ") >= 0) {
            $('#password-tip').removeClass('ok');
            $('#password-tip').addClass('err');
            $('#password-tip .input-tip-inner').html('<p>密码中请不要包含空格</p>');
            $('#password-tip .input-tip-inner').show();
        }

        if (psw === '') {
            $('#password-tip').removeClass('ok');
            $('#password-tip').addClass('err');
            $('#password-tip .input-tip-inner').html('<p>请输入密码</p>');
            $('#password-tip .input-tip-inner').show();
        }
        else if (psw.length < 8) {
            $('#password-tip').removeClass('ok');
            $('#password-tip').addClass('err');
            $('#password-tip .input-tip-inner').html('<p>请输入符合提示规则的密码</p>');
            $('#password-tip .input-tip-inner').show();
        }
        else if (psw.length > 16) {
            $('#password-tip').removeClass('ok');
            $('#password-tip').addClass('err');
            $('#password-tip .input-tip-inner').html('<p>请输入16位以下的密码</p>');
            $('#password-tip .input-tip-inner').show();
        }
    });

    /*Observe KeyDown event to clear the result*/
    $(this).live('keydown', function() {
    });

    return this;
};


$(document).ready(function() {
    $("#password").passwordStrength();

    //当前密码和确认密码输入框点击去掉灰色
    $('.txt-grey').each(function() {
        $(this).data("txt", $.trim($(this).val()));
    }).focus(function() {
        if ($.trim($(this).val()) === $(this).data("txt")) {
            $(this).val("");
            $(this).css("color", "#666");
        }
    }).blur(function() {
        if ($.trim($(this).val()) === "" && !$(this).hasClass("txt-grey")) {
            $(this).val($(this).data("txt"));
            $(this).css("color", "#bbb");
        }
    });
});