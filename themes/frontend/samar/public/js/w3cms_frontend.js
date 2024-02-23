(function ($) {
    "use strict";

    var w3cms = function () {
        /* Countdown ============ */
        var handleCountDown = function () {
            
            /* Website Launch Date */
            var WebsiteLaunchDate = new Date();
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            WebsiteLaunchDate.setMonth(WebsiteLaunchDate.getMonth() + 1);
            var dateParts = dynamicDate.split('-');
            WebsiteLaunchDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
            WebsiteLaunchDate = WebsiteLaunchDate.getDate() + " " + monthNames[WebsiteLaunchDate.getMonth()] + " " + WebsiteLaunchDate.getFullYear();
            /* Website Launch Date END */

            if ($(".countdown").length) {
                    $('.countdown').countdown({ date: WebsiteLaunchDate + ' 00:00' }, function () {
                        $('.countdown').text('we are live');
                    });
            }
            /* Time Countr Down Js End */
        }


        /* Handle Support ============ */
        var handleCommentReply = function () {
            jQuery('.w3-comment-reply').on('click', function (event) {
                event.preventDefault();

                var parent_id = $(this).data("commentid")
                var blog_id = $(this).data('postid');
                var replyto = $(this).data('replyto');
                var parent = $(this).parents('.comment .comment-body:first');

                $("#comment_parent").val(parent_id);
                $('#commentform').trigger("reset");
                $("#cancel-comment-reply").removeClass('d-none');
                $("#reply-title").parent().removeClass('d-none').addClass('d-block');
                $("#reply-title").html(replyto);
                $("#ReplyFormContainer").insertAfter(parent);

            });

            jQuery('#cancel-comment-reply').on('click', function (event) {

                event.preventDefault();

                $("#comment_parent").val(0);
                $("#reply-title").empty();
                $("#reply-title").parent().removeClass('d-block').addClass('d-none');
                $("#cancel-comment-reply").addClass('d-none');
                $("#ReplyFormContainer").appendTo('#comments-div');
            });
        }

        /* Function ============ */
        return {
            init: function () {
                handleCountDown();
                handleCommentReply();
            },
        }
    }();

    /* Document.ready Start */
    jQuery(document).ready(function () {
        w3cms.init();
    });

})(jQuery);