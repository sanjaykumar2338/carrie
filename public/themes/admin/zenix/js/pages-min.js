!function(e){"use strict";var t=jQuery("#customFieldContainer .Newfild").length,r=t=parseInt(t,10);function a(){jQuery(document).on("click",".CustomFieldRemoveButton",(function(){var t=jQuery(this).attr("rel");void 0!==t&&""!=t?(url=baseUrl+"admin/content/contents/ajax_delete/"+t,e.ajax({url:url,type:"POST",dataType:"json",success:function(e){jQuery(".swaprow_"+t).css("background-color","red").fadeOut("slow",(function(){jQuery(this).remove()}))}})):jQuery(this).closest(".xrow").css("background-color","red").fadeOut("slow",(function(){jQuery(this).remove()})),0==jQuery("#AppendContainer .row").length&&jQuery("#customFieldContainer").hide("slow").remove()}))}jQuery(document).ready((function(){var n;a(),jQuery("#AddCustomField").on("click",(function(){r+=1;var e=parseInt(jQuery("#last_cf_num").val()),n=jQuery("#PageMetaName").val(),o=jQuery("#PageMetaValue").val();if(""===jQuery.trim(n)&&jQuery.trim(""===o))alert("Please fill these fields.");else{t+=1,r=e>0?e+1:r;var l='<div id="customFieldContainer"></div>';jQuery("#AppendContainer").append(l);var u='<div class="row xrow pt-3 mb-2 bg-light"> <div class="col-md-6 form-group"> <label for="PageMetaName_'+r+'">Title</label> <input type="text" name="data[PageMeta]['+r+'][title]" class="form-control" id="PageMetaName_'+r+'" value="'+n+'"> </div> <div class="col-md-6 form-group"> <label for="">Value</label> <textarea name="data[PageMeta]['+r+'][value]"" id="PageMetaValue_'+r+'" class="form-control" rows="5">'+o+'</textarea> </div> <div class="col-md-12 form-group"> <button  class="btn btn-danger btn-sm CustomFieldRemoveButton" type="button">Delete</button> </div> </div>';jQuery("#customFieldContainer").css("background-color","green").fadeIn("slow",(function(){jQuery("#customFieldContainer").append(u),jQuery("#customFieldContainer").delay(800).fadeIn(400).removeAttr("style")})),jQuery("#PageMetaName").val(""),jQuery("#PageMetaValue").val(""),jQuery("#last_cf_num").val(r)}a()})),jQuery(".allowField").on("click",(function(){var e=jQuery(this).attr("rel");if(1==jQuery(this).prop("checked")){var t=1;jQuery(".X"+e).removeClass("d-none")}else t=0,jQuery(".X"+e).addClass("d-none");var r=new Date;r.setDate(r.getDate()+30),document.cookie="isCheck_"+e+"="+t+"; expires="+r.toGMTString()+"path=/"})),n=JSON.parse(screenOptionArray),jQuery.each(n,(function(e,t){jQuery.each(t,(function(t,r){var a=function(e){for(var t=e+"=",r=decodeURIComponent(document.cookie).split(";"),a=0;a<r.length;a++){for(var n=r[a];" "==n.charAt(0);)n=n.substring(1);if(0==n.indexOf(t))return n.substring(t.length,n.length)}return""}("isCheck_"+e);1==(a=parseInt(a,10))?(jQuery(".X"+e).removeClass("d-none"),jQuery(".Allow"+e).prop("checked",!0)):0==a&&(jQuery(".X"+e).addClass("d-none"),jQuery(".Allow"+e).prop("checked",!1))}))})),jQuery(".editPermalinkContainer").hide(),jQuery(".editPermalink").on("click",(function(){var e=jQuery(".permalinkSlugSpan").text();jQuery(".permalinkSlugSpan").hide("slow"),jQuery(".editPermalink").hide("slow"),jQuery("#PageEditSlug").val(e),jQuery(".editPermalinkContainer").show("slow")})),jQuery(".editPermalinkOkButton").on("click",(function(){var t=jQuery("#PageEditSlug").val();e.ajax({headers:{"X-CSRF-TOKEN":e('meta[name="csrf-token"]').attr("content")},url:makeSlugUrl,type:"POST",data:{slug_text:t},dataType:"html",success:function(e){jQuery(".permalinkSlugSpan").text(e),jQuery("#slug").val(e),jQuery(".editPermalinkContainer").hide("slow"),jQuery(".permalinkSlugSpan").show("slow"),jQuery(".editPermalink").show("slow")}})})),jQuery(".editPermalinkCancelButton").on("click",(function(){jQuery(".editPermalinkContainer").hide("slow"),jQuery(".permalinkSlugSpan").show("slow"),jQuery(".editPermalink").show("slow")})),jQuery("#ContentTitle").slug({hide:!1})})),jQuery(document).on("change","#ContentVisibility",(function(){"PP"==jQuery(this).val()?(jQuery("#PublicPasswordTextbox").slideDown("slow").removeClass("d-none"),jQuery("#ContentPassword").focus()):(jQuery("#PublicPasswordTextbox").slideUp("slow",(function(){jQuery(this).addClass("d-none")})),jQuery("#PublicPasswordTextbox").val(" "))}))}(jQuery);