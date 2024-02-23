(function ($) {
    "use strict";

    var w3cms = function () {

        // handleCommentReply
        var handleCommentReply = function() {

			jQuery('.w3-comment-reply').on('click', function(event) {
				event.preventDefault();

				var parent_id = $(this).data("commentid")
				var blog_id = $(this).data('postid');
				var replyto = $(this).data('replyto');
				var parent = $(this).parents('.comment .comment-body:first');

				$("#comment_parent").val(parent_id);
				$('#commentform').trigger("reset");
				$("#cancel-comment-reply").removeClass('d-none');
				$("#reply-title").html(replyto);
				$("#ReplyFormContainer").insertAfter(parent);

			});

			jQuery('#cancel-comment-reply').on('click', function(event) {
				event.preventDefault();

				$("#comment_parent").val(0);
				$("#reply-title").empty();
				$("#cancel-comment-reply").addClass('d-none');
				$("#ReplyFormContainer").appendTo('#comments-div');
			});
		}

        // handleAjaxLoadMore
        var handleAjaxLoadMore = function() {
			jQuery('.el-ajax-load-more').on('click', function() {
				var ajax_url = baseUrl+'/admin/magic_editors/ajax_load_more';
				var order = jQuery(this).data('order');
				var orderby = jQuery(this).data('orderby');	
				var no_of_posts = jQuery(this).data('no-of-posts');	
				var post_with_images = jQuery(this).data('post_with_images');	
				var post_category_ids = jQuery(this).data('post_category_ids');	
				var ajax_container = jQuery(this).data('ajax-container');
				var ajax_view = jQuery(this).data('ajax-view');
				var data_current_page = jQuery(this).data('current-page');
				var thisObj = jQuery(this);
				var indexOf = jQuery('.el-ajax-load-more[data-ajax-container="'+ajax_container+'"]').index(this);
				var data = {};
				
				if (order != undefined) { data.order = order;	}
				if (orderby != undefined) { data.orderby = orderby;	}
				if (ajax_view != undefined) { data.ajax_view = ajax_view;	}
				if (no_of_posts != undefined) { data.no_of_posts = no_of_posts;	}
				if (post_with_images != undefined) { data.post_with_images = post_with_images;	}
				if (post_category_ids != undefined) { data.post_category_ids = post_category_ids;	}
				if (data_current_page != undefined) { data.page = data_current_page;	}
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'Post',
					url: ajax_url,
					data: data,
					success : function(response)
					{
						if (response.html) {

							jQuery('.' + ajax_container).eq(indexOf).append(response.html);
							
					        // Check if there are more pages to load
					        if (response.has_more_pages) {
								data_current_page++;
					            thisObj.data('current-page',data_current_page);
								
					        } else {
					            // No more posts to load
					            $(thisObj).text('No More Posts');
					            $(thisObj).prop('disabled', true).addClass('disabled');
					        }

						}
						else {
				          	alert('Failed to load more posts.');
				        }
					}
				});
			});
		}

        /* handleFooterBlogs ============ */
		/*For changing the design of this recent blogs in footer*/
		var handleFooterBlogs = function(){
			var ft = $('.footer-top');
			ft.find('h6.widget-title').removeClass('widget-title').addClass('m-b30 footer-title');
		}
        
        /* Function ============ */
        return {
            init: function () {
                handleCommentReply();
                handleAjaxLoadMore();
                handleFooterBlogs();
            },
        }
    }();

    /* Document.ready Start */
    jQuery(document).ready(function () {
        w3cms.init();
    });

})(jQuery);