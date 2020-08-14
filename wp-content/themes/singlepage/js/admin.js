jQuery(document).ready(function($){
								
								$(".groupTitle").click(function(){
									var group = $(this).parents(".toggle_option_group");
									if(group.hasClass("group_close")){
									group.removeClass("group_close").addClass("group_open");
									$(this).addClass("open");
									}else{
									group.removeClass("group_open").addClass("group_close");
									$(this).removeClass("open");
										}
																});
								});