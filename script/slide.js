$.getJSON("newslist.php",function(data){
	if( ! data ) return;
	var list = "<ul>";
	for(var i=0;i<data.length;i++){
		list += "<li data-id='" + data[i].id + "'>";
		list += data[i].title;
		list += "...";
		list += data[i].date;
		list += "</li>";
	}
	list += "</ul>";
	$("#newslist").html(list);
});

//AJAX로 추가된 요소들에 대한 접근 
$("#newslist").on("click","ul > li",function(){
	var id = $(this).attr("data-id");
	$.getJSON("newsread.php?id="+id,function(data){
		if( ! data ) return;
		$("#newstitle").text(data.title);
		$("#newscontent").text(data.content);
		$("#newsdate").text(data.date);
		$("#newsview").dialog({
			title: data.title,
			width: 500,
			height: 400,
			modal: true,
			buttons: {
				"수정":function(){
					$("#title").val(data.title);
					$("#content").val(data.content);
					$("#id").val(id);
					$("#act").val("update");
					$("#newswrite").dialog({
						title: data.title,
						width: 500,
						height: 400,
						modal: true,
						buttons: {
							"저장":function(){
								var udata = {};
								udata.act = $("#act").val();
								udata.id = $("#id").val();
								udata.title = $("#title").val();
								udata.content = $("#content").val();
								$.post("newswrite.php",udata,function(result){
									if( result == "1" || result == 1  ) location.reload();
									else alert("Try Again!!!");
								});
							},
							"닫기":function(){
								$(this).dialog("close");
							}
						}
					});
					$(this).dialog("close");
				},
				"삭제":function(){
					var del = confirm("Really?");
					if( ! del ) return;
					$.post("newsdel.php",{"id":id},function(result){
						if( result == "1" || result == 1 ) location.reload();
						else alert("Try Again!!!");
					});
				},
				"닫기":function(){
					$(this).dialog("close");
				}
			}
		});
	});
});


$(".btn-write").on("click",function(event){
	event.preventDefault();
	$("#act").val("insert");
	$("#id").val("");
	$("#title").val("");
	$("#content").val("");
	$("#newswrite").dialog({
		width:500,
		height:400,
		title:"글쓰기",
		modal: true,
		buttons: {
			"저장":function(){
				var udata = {};
				udata.act = $("#act").val();
				udata.id = $("#id").val();
				udata.title = $("#title").val();
				udata.content = $("#content").val();
				$.post("newswrite.php",udata,function(result){
					if( result == "1" || result == 1 ) location.reload();
					else alert("Try Again!!!");
				});
			},
			"닫기":function(){
				$(this).dialog("close");
			}
		}
	});
});