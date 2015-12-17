jQuery(document).ready(function ($) {
    var $form_modal = $('.cd-user-modal'),
            $form_login = $form_modal.find('#cd-login'),
            $form_signup = $form_modal.find('#cd-signup'),
            $form_contact = $form_modal.find('#cd-contact'),
            $form_forgot_password = $form_modal.find('#cd-reset-password'),
            $form_modal_tab = $('.cd-switcher'),
            $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
            $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
            $tab_contact = $form_modal_tab.children('li').eq(2).children('a'),
            $forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
            $back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
            $main_nav = $('.main-nav');

    $main_nav.on('click', function (event) {
        if ($(event.target).is($main_nav)) {
            $(this).children('ul').toggleClass('is-visible');
        } else {
            $main_nav.children('ul').removeClass('is-visible');
            $form_modal.addClass('is-visible');
            //( $(event.target).is('.cd-signup') ) ? login_selected() : contact_selected();
            if ($(event.target).is('.cd-signup')) {
                login_selected();
            } else if ($(event.target).is('.cd-contact')) {
                contact_selected();
            }
        }
    });

    //close modal
    $('.cd-user-modal').on('click', function (event) {
        if ($(event.target).is($form_modal) || $(event.target).is('.cd-close-form')) {
            $form_modal.removeClass('is-visible');
        }
    });

    //close modal when clicking the esc keyboard button
    $(document).keyup(function (event) {
        if (event.which == '27') {
            $form_modal.removeClass('is-visible');
        }
    });

    //switch from a tab to another
    $form_modal_tab.on('click', function (event) {
        event.preventDefault();
        //( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
        if ($(event.target).is($tab_login)) {
            login_selected();
        } else if ($(event.target).is($tab_signup)) {
            signup_selected();
        } else if ($(event.target).is($tab_contact)) {
            contact_selected();
        }
    });


    //show forgot-password form 
    $forgot_password_link.on('click', function (event) {
        event.preventDefault();
        forgot_password_selected();
    });

    //back to login from the forgot-password form
    $back_to_login_link.on('click', function (event) {
        event.preventDefault();
        login_selected();
    });

    function login_selected() {
        $form_login.addClass('is-selected');
        $form_signup.removeClass('is-selected');
        $form_contact.removeClass('is-selected');
        $form_forgot_password.removeClass('is-selected');
        $tab_login.addClass('selected');
        $tab_signup.removeClass('selected');
        $tab_contact.removeClass('selected');
    }

    function signup_selected() {
        $form_login.removeClass('is-selected');
        $form_signup.addClass('is-selected');
        $form_contact.removeClass('is-selected');
        $form_forgot_password.removeClass('is-selected');
        $tab_login.removeClass('selected');
        $tab_signup.addClass('selected');
        $tab_contact.removeClass('selected');
    }

    function contact_selected() {
        $form_login.removeClass('is-selected');
        $form_signup.removeClass('is-selected');
        $form_contact.addClass('is-selected');
        $form_forgot_password.removeClass('is-selected');
        $tab_login.removeClass('selected');
        $tab_signup.removeClass('selected');
        $tab_contact.addClass('selected');
    }

    function forgot_password_selected() {
        $form_login.removeClass('is-selected');
        $form_signup.removeClass('is-selected');
        $form_forgot_password.addClass('is-selected');
    }

//	$form_login.find('input[type="submit"]').on('click', function(event){
//		event.preventDefault();
//		$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
//	});
//	$form_signup.find('input[type="submit"]').on('click', function(event){
//		event.preventDefault();
//		$form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
//	});


    if (!Modernizr.input.placeholder) {
        $('[placeholder]').focus(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        }).blur(function () {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        }).blur();
        $('[placeholder]').parents('form').submit(function () {
            $(this).find('[placeholder]').each(function () {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            })
        });
    }
    $('.team-random-father').click(function () {
        $(this).addClass('current');
        $('.team-money-father').removeClass('current');
        $('.team-ratio-father').removeClass('current');
        $('#team-ninja-random').show();
        $('#team-ninja-money').hide();
        $('#team-ninja-ratio').hide();
    });
    $('.team-ratio-father').click(function () {
        $(this).addClass('current');
        $('.team-random-father').removeClass('current');
        $('.team-money-father').removeClass('current');
        $('#team-ninja-random').hide();
        $('#team-ninja-money').hide();
        $('#team-ninja-ratio').show();
    });
    $('.team-money-father').click(function () {
        $(this).addClass('current');
        $('.team-ratio-father').removeClass('current');
        $('.team-random-father').removeClass('current');
        $('#team-ninja-random').hide();
        $('#team-ninja-money').show();
        $('#team-ninja-ratio').hide();
    });

    
});

jQuery.fn.putCursorAtEnd = function () {
    return this.each(function () {
        if (this.setSelectionRange) {
            var len = $(this).val().length * 2;
            this.setSelectionRange(len, len);
        } else {
            $(this).val($(this).val());
        }
    });
};

//vertical menu
$(document).ready(function () {
    $("#accordian h2").click(function () {
        $("#accordian ul ul").slideUp();
        if (!$(this).next().is(":visible"))
        {
            $(this).next().slideDown();
        }
    });
//    $("#accordian ul ul #xep-hang").click(function () {
//        $('#xep-hang').addClass('active');
//        $("#bang-xep-hang").show();
//        $("#bang-thong-tin").hide();
//
//    });
//    $("#accordian ul ul #them-nhiem-vu").click(function () {
//        $('#them-nhiem-vu').addClass('active');
// //       $("#bang-them-nhiem-vu").show();
//  //      $("#bang-xep-hang").hide();
//    });
//    $("#accordian ul ul #thong-tin").click(function () {
//        $('#thong-tin').addClass('active');
//        $("#bang-thong-tin").show();
//        $("#bang-xep-hang").hide();
//    });
//    
//    $('.submit-thongtin').click(function(e){
//        $('#thong-tin').addClass('active');
//        $("#bang-thong-tin").show();
//        $("#bang-xep-hang").hide();
//        e.preventDefault();
//    })

//hien description cua ninja
    $('.ninja-row').click(function () {
        $('.ninja-row').removeClass('current');
        $('.ninja-description').hide();
        $(this).addClass('current');
        $(this).children('.ninja-description').show();
    });
    $('.team-row').click(function () {
        $('.team-row').removeClass('current');
        $('.team-ninja-row').hide();
        $(this).addClass('current');
        $(this).children('.team-ninja-row').show();
    });
//textinput effect
    (function () {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function () {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function () {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
            // in case the input is already filled..
            if (inputEl.value.trim() !== '') {
                classie.add(inputEl.parentNode, 'input--filled');
            }

            // events:
            inputEl.addEventListener('focus', onInputFocus);
            inputEl.addEventListener('blur', onInputBlur);
        });

        function onInputFocus(ev) {
            classie.add(ev.target.parentNode, 'input--filled');
        }

        function onInputBlur(ev) {
            if (ev.target.value.trim() === '') {
                classie.remove(ev.target.parentNode, 'input--filled');
            }
        }
    })();
    //time
    $('#datetimepicker_dark').datetimepicker();
    $('#datetimepicker_dark2').datetimepicker();
});

jQuery.each(jQuery('textarea[data-autoresize]'), function () {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function (el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function () {
        resizeTextarea(this);
    }).removeAttr('data-autoresize');
});

$('select').barrating('show');

//$('#example').barrating('show', {
//  theme: 'my-awesome-theme'
//  onSelect: function(value, text, event) {
//    if (typeof(event) !== 'undefined') {
//      // rating was selected by a user
//      console.log(event.target);
//    } else {
//      // rating was selected programmatically
//      // by calling `set` method
//    }
//  }
//});

