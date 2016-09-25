<h1>동문갤러리</h1>
<form class="localupload">
        <div class="photobox">
            <input type="file" name="photo" id="photo"  ondragover="dragover()" ondragleave="dragleave()" multiple>
        </div>
        <div id="preview"></div>
        <div id="bigimg">
            <h2 id="filename"></h2>
            <a style="display:none;" id="downloadLink" href="#" download="#"></a>
            <div id="imgpart">
                
            </div>
        </div>
</form>
<script>
    var images = [];
    var originalw,originalh;
    $("#photo").change(function(){
        var files = this.files;
        for( var i=0; i<files.length; i++ ){
            var imgtype = files[i].type;
            if( imgtype=="image/jpeg" || imgtype=="image/gif" || imgtype=="image/png" ) readFile(files[i]); 
        }
        $(".photobox").css({"background-color":"pink"});
    });

    function getNewSize(box,w,h){
        var newsize = {"width":0,"height":0};
        if( w > h ) {
            newsize.width = box;
            newsize.height = (h * box)/w;
        } else if( h > w ) {
            newsize.width = (w * box) / h;
            newsize.height = box;
        } else {
            newsize.width = box;
            newsize.height = box;
        }
        return newsize;
    }
    function readFile(file){
        if( ! file ) return;
        var reader = new FileReader();
        reader.onload = function(event){
            var src = event.target.result;
            var img = new Image();
            img.onload = function(){
                var newsize = getNewSize(200,this.width,this.height);
                originalw=this.width;
                originalh=this.height;
                this.width = newsize.width;
                this.height = newsize.height;
                

                addPhoto(src,200,newsize.width,newsize.height,images.length);
                var image = {
                    "src":src,
                    "width":newsize.width,
                    "height":newsize.height,
                    "name":file.name
                };
                images.push(image); 
                var data = JSON.stringify(images);
                localStorage.setItem("images",data);            
            };
            img.src = src;
        }
        reader.readAsDataURL(file);
    }

    function dragover(event){
        $(".photobox").css({"background-color":"red"});
    }

    function dragleave(event){
        $(".photobox").css({"background-color":"pink"});
    }

    window.onload = function(){
        var data = localStorage.getItem("images");
        if( data ) {
            var json = JSON.parse(data);    
            for(var i=0;i<json.length;i++){
                images.push(json[i]);
            }
            if( images ) {
                for(var j=0;j<images.length;j++){

                    addPhoto(images[j].src,200,images[j].width,images[j].height,j);
                    //$("#preview").prepend(img);
                }
            }
        }
    }

    function addPhoto(src,box,width,height,index){
        var left, top;
        if( width > height ) {
            left = 0;
            top = (box/2) - (height/2);
        } else if ( width < height ){
            left = (box/2) - (width/2);
            top = 0;
        } else {
            left = 0;
            top = 0;
        }
       
        var html = "<div>";
        html += "<div class='btn-x' data-index='" + index + "'>X</div>";
        html += "<img src='" + src + "' width='" + width + "' height='" + height + "' style='left:" + left + "px;top:" + top + "px;'  class='imgs' data-index='" + index + "'>";
        html += "</div>";
        $("#preview").append(html);
        
     
    }
    
    $("#preview").on("click",".btn-x",function(){
        var index = $(this).attr("data-index");
        images.splice(index,1);
        var data = JSON.stringify(images);
        localStorage.setItem("images",data); 
        $(this).parent("div").remove();
        var btns = $("#preview > div > .btn-x");
        for(var k =0;k< images.length;k++){

            $(btns[k]).attr("data-index",k);
        }
        console.log(btns);
        alert(index);
    });
    $("#preview ").on("click",".imgs",function(){
        
        var index = $(this).attr("data-index");
        
        $("#filename").text(images[index].name);
         // $("#imgpart").html("<img src='"+images[index].src+"' width='"+images[index].width+" height='"+images[index].height+"'>");
         var bigsize=getNewSize(400,originalw,originalh);
         $("#imgpart").html("<img src='"+images[index].src+"' width='"+bigsize.width+" height='"+bigsize.height+"'>");

        $("#bigimg").dialog({
            title: images[index].name,
            width: 500,
            height: 500,
            modal: true,
            show: {
                effect: "slide",//Blind,Bounce,Clip,Drop,explode,fade,fold,highlight,puff,slide,pulsate,scale,shake,size,toggle
                delay: 500,
                duration: 1000
                
            },
            hide: {
                effect: "slide",
                delay: 500,
                duration: 1000
                
            },
            open: function( event, ui ) {
                $(this).css({"background-color":"gray"});
                 $(this).animate({"opacity":"1"},1500);
            },
            beforeClose: function( event, ui ) {
                $(this).css({"background-color":"pink"});
                $(this).animate({"opacity":"0.0"},1500);
            },
            focus: function(event, ui){

                $(this).css({"background-color":"#009688;"});
            },
            resizable: true,
            draggable: false,
            buttons: {

                         "다운로드":{
                                text: "다운로드",
                               id: "downbtn"+index,
                               click: function(){
                                 $('#downloadLink').prop('href', images[index].src); 
                                $('#downloadLink').prop('download', images[index].name);
                                $('#downloadLink')[0].click();
                                }   
                            },
                        "삭제":function(){
                               
                                $(this).dialog("close");
                                
                                images.splice(index,1);
                                var data = JSON.stringify(images);
                                localStorage.setItem("images",data);

                                var btns = $("#preview > div > .btn-x");
                                for(var k =0;k< images.length;k++){

                                    $(btns[k]).attr("data-index",k);
                                }
                                location.reload();
                            },
                         "닫기":function(){
                                $(this).dialog("close");
                            }

                        },
                        classes: {
                            "ui-dialog": "hi"
                          }



            

        });
            
    });

</script>