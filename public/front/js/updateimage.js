$(document).ready(function () {
    Dropzone.autoDiscover=false;
    if($('#courseImage').length>=1){
        var course_mainImage = new Dropzone('#courseImage',{
            url:"/uploadimage",
            uploadImages:false,
            maxFileSize:5,
            maxFile:1,
            parallelUploads:1,
            addRemoveLinks:true,
            dictResponseError:"No se puede subir esta imagen",
            autoProcessQueue:true,
            thumbnailWidth:138,
            thumbnailHeight:120,
            acceptedFiles:"image/*",
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
            resize: function (file) {
                var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                    srcRatio = file.width / file.height;
                if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                    info.trgHeight = this.options.thumbnailHeight;
                    info.trgWidth = info.trgHeight * srcRatio;
                    if (info.trgWidth > this.options.thumbnailWidth) {
                        info.trgWidth = this.options.thumbnailWidth;
                        info.trgHeight = info.trgWidth / srcRatio;
                    }
                } else {
                    info.trgHeight = file.height;
                    info.trgWidth = file.width;
                }
                return info;
            },
            sending:function (file,xhr,formData) {
                formData.append('file-post',2);
                formData.append("agreement",$("#name-agreement").val());
            },
            success:function (file,response) {
                var name_image=response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                file.previewElement.accessKey = name_image.name;
                $("#image-2").val(name_image.name);
            },
            removedfile:function (file) {
                file.previewElement.remove();
                name = file.previewElement.accessKey;
                $.ajax({
                    url: "/deleteimage",
                    type: "post",
                    data: { "imagePrincipal":name},
                    dataType:"json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $(file.previewElement).remove();
                            $("#image-2").val('');
                        }else{
                            $(file.previewElement).remove();
                        }
                    },
                    error : function(){
                        alert("Ha ocurrido un error");
                    }
                });
            }
        });
        if($('#image-2').val().length>0){
        var mockFile = { name: "Click para remover la imagen", size: 12345};
        course_mainImage.emit("addedfile",mockFile);
        image_load1 = "/front/courses_images/"+$("#image-2").val();
        course_mainImage.emit("thumbnail", mockFile,image_load1);
        course_mainImage.element.lastChild.accessKey=$("#image-2").val();
        }
    }
    if($('#courseVideo').length>=1){
        var course_videoIntroduction = new Dropzone('#courseVideo',{
            url:"/uploadvideo",
            uploadImages:false,
            maxFileSize:5,
            maxFile:1,
            parallelUploads:1,
            addRemoveLinks:true,
            dictResponseError:"No se puede subir esta imagen",
            autoProcessQueue:true,
            thumbnailWidth:138,
            thumbnailHeight:120,
            acceptedFiles:"video/*",
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
            resize: function (file) {
                var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                    srcRatio = file.width / file.height;
                if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                    info.trgHeight = this.options.thumbnailHeight;
                    info.trgWidth = info.trgHeight * srcRatio;
                    if (info.trgWidth > this.options.thumbnailWidth) {
                        info.trgWidth = this.options.thumbnailWidth;
                        info.trgHeight = info.trgWidth / srcRatio;
                    }
                } else {
                    info.trgHeight = file.height;
                    info.trgWidth = file.width;
                }
                return info;
            },
            sending:function (file,xhr,formData) {
                formData.append('file-post',2);
                formData.append("agreement",$("#name-agreement").val());
            },
            success:function (file,response) {
                var name_image=response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                file.previewElement.accessKey = name_image.name;
                $("#video_introduction").val(name_image.name);
            },
            removedfile:function (file) {
                file.previewElement.remove();
                name = file.previewElement.accessKey;
                $.ajax({
                    url: "/deleteimage",
                    type: "post",
                    data: { "videoIntroduction":name},
                    dataType:"json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $(file.previewElement).remove();
                            $("#course_videoIntroduction").val('');
                        }else{
                            $(file.previewElement).remove();
                        }
                    },
                    error : function(){
                        alert("Ha ocurrido un error");
                    }
                });
            }
        });
        if($('#video_introduction').val().length>0){
            var mockFile = { name: "Click para remover la imagen", size: 12345};
            course_videoIntroduction.emit("addedfile",mockFile);
            image_load1 = "/media/videos/"+$("#video_introduction").val();
            course_videoIntroduction.emit("thumbnail", mockFile,image_load1);
            course_videoIntroduction.element.lastChild.accessKey=$("#video_introduction").val();
        }
    }

    if($('#subtemaryVideo').length>=1){
        var video_subtemary = new Dropzone('#subtemaryVideo',{
            url:"/uploadvideo",
            uploadImages:false,
            maxFileSize:2000,
            maxFile:1,
            parallelUploads:1,
            addRemoveLinks:true,
            dictResponseError:"No se puede subir esta imagen",
            autoProcessQueue:true,
            thumbnailWidth:138,
            thumbnailHeight:120,
            acceptedFiles:"video/*",
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
            resize: function (file) {
                var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                    srcRatio = file.width / file.height;
                if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                    info.trgHeight = this.options.thumbnailHeight;
                    info.trgWidth = info.trgHeight * srcRatio;
                    if (info.trgWidth > this.options.thumbnailWidth) {
                        info.trgWidth = this.options.thumbnailWidth;
                        info.trgHeight = info.trgWidth / srcRatio;
                    }
                } else {
                    info.trgHeight = file.height;
                    info.trgWidth = file.width;
                }
                return info;
            },
            sending:function (file,xhr,formData) {
                formData.append('file-post',2);
                formData.append("agreement",$("#name-agreement").val());
            },
            success:function (file,response) {
                var name_image=response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                file.previewElement.accessKey = name_image.name;
                $("#image-2").val(name_image.name);
            },
            removedfile:function (file) {
                file.previewElement.remove();
                name = file.previewElement.accessKey;
                $.ajax({
                    url: "/deleteimage",
                    type: "post",
                    data: { "videoIntroduction":name},
                    dataType:"json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $(file.previewElement).remove();
                            $("#image-2").val('');
                        }else{
                            $(file.previewElement).remove();
                        }
                    },
                    error : function(){
                        alert("Ha ocurrido un error");
                    }
                });
            }
        });
        if($('#image-2').val().length>0){
            var mockFile = { name: "Click para remover la imagen", size: 12345};
            video_subtemary.emit("addedfile",mockFile);
            image_load1 = "/media/videos/"+$("#image-2").val();
            video_subtemary.emit("thumbnail", mockFile,image_load1);
            video_subtemary.element.lastChild.accessKey=$("#image-2").val();
        }
    }

});
$(document.body).on("click",".editVideo",function (e) {
    e.preventDefault();
    var sutemid=$(this).attr("data-sutemid");
    $("#myModalFrontSubtemaryEdit").modal();
    editSubtopic(sutemid);
});
function editSubtopic($id) {
    var video_subtemaryEdit = new Dropzone('#subtemaryVideoEdit',{
        url:"/uploadvideo",
        uploadImages:false,
        maxFileSize:2000,
        maxFile:1,
        parallelUploads:1,
        addRemoveLinks:true,
        dictResponseError:"No se puede subir esta imagen",
        autoProcessQueue:true,
        thumbnailWidth:138,
        thumbnailHeight:120,
        acceptedFiles:"video/*",
        previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
        resize: function (file) {
            var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                srcRatio = file.width / file.height;
            if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                info.trgHeight = this.options.thumbnailHeight;
                info.trgWidth = info.trgHeight * srcRatio;
                if (info.trgWidth > this.options.thumbnailWidth) {
                    info.trgWidth = this.options.thumbnailWidth;
                    info.trgHeight = info.trgWidth / srcRatio;
                }
            } else {
                info.trgHeight = file.height;
                info.trgWidth = file.width;
            }
            return info;
        },
        sending:function (file,xhr,formData) {
            formData.append('file-post',2);
            formData.append("agreement",$("#name-agreement").val());
        },
        success:function (file,response) {
            var name_image=response;
            $(".dz-preview").addClass("dz-success");
            $("div.progress").remove();
            file.previewElement.id=name_image.idGal;
            file.previewElement.accessKey = name_image.name;
            $("#image-3").val(name_image.name);
        },
        removedfile:function (file) {
            file.previewElement.remove();
            name = file.previewElement.id;
            $.ajax({
                url: "/deleteimage",
                type: "post",
                data: { "videoEdit":name},
                dataType:"json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $(file.previewElement).remove();
                        $("#image-3").val('');
                    }else{
                        $(file.previewElement).remove();
                    }
                },
                error : function(){
                    alert("Ha ocurrido un error");
                }
            });
        }
    });
    $('input[name=image-3]').each(function () {
        var sutemid=$(this).attr("data-subtemid");
        if(sutemid==$id){
            var mockFile = { name: "Click para remover la imagen", size: 12345};
            video_subtemaryEdit.emit("addedfile",mockFile);
            image_load1 = "/media/videos/"+$(this).val();
            video_subtemaryEdit.emit("thumbnail", mockFile,image_load1);
            video_subtemaryEdit.element.lastChild.id=$(this).attr('data-vidid');
        }
    });
    $('#myModalFrontSubtemaryEdit').on('hidden.bs.modal',function () {
        video_subtemaryEdit.destroy();
        $(".dz-preview.dz-image-preview").remove();
    });

}
$(document.body).on("click","div#contenidoSubtemario  div  .event-wrapper  .time  a.materiaDidactico ",function(e){
    e.preventDefault();
    $this = $(this);
    id = $this.attr("data-id");
    $('#myModalFrontMaterial').modal();
    material(id);
});
function material(id){
    var video_material = new Dropzone('#didacticMaterial',{
        url:"/uploadfiles",
        uploadImages:false,
        maxFileSize:2000,
        maxFile:10,
        parallelUploads:1,
        addRemoveLinks:true,
        dictResponseError:"No se puede subir esta archivo",
        autoProcessQueue:true,
        thumbnailWidth:138,
        thumbnailHeight:120,
        previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
        resize: function (file) {
            var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                srcRatio = file.width / file.height;
            if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                info.trgHeight = this.options.thumbnailHeight;
                info.trgWidth = info.trgHeight * srcRatio;
                if (info.trgWidth > this.options.thumbnailWidth) {
                    info.trgWidth = this.options.thumbnailWidth;
                    info.trgHeight = info.trgWidth / srcRatio;
                }
            } else {
                info.trgHeight = file.height;
                info.trgWidth = file.width;
            }
            return info;
        },
        sending:function (file,xhr,formData) {
            formData.append('file-post',$('#subtemidfile').val());
            formData.append("agreement",$("#name-agreement").val());
        },
        success:function (file,response) {
            var name_image=response;
            $(".dz-preview").addClass("dz-success");
            $("div.progress").remove();
            file.previewElement.id=name_image.idGal;
            file.previewElement.accessKey = 1;
            $('#archivos').append('<input type="hidden" value="'+name_image.name+'" name="image-4" data-sutemid="'+name_image.sutemid+'" data-id="'+name_image.idGal+'"> ');

        },
        removedfile:function (file) {
            file.previewElement.remove();
            name = file.previewElement.id;
            if (file.previewElement.accessKey!=1){
                $.ajax({
                    url: "/deleteimage",
                    type: "post",
                    data: { "fileid":name},
                    dataType:"json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $(file.previewElement).remove();
                            $('#archivos .filid-'+response.filid).remove();
                        }else{
                            $(file.previewElement).remove();
                        }
                    },
                    error : function(){
                        alert("Ha ocurrido un error");
                    }
                });
            }

        }
    });
    $("#archivos input[name=\"image-4\"]").each(function() {
        var value = $(this).attr("data-id"); // get values
        var sutemid=$(this).attr("data-sutemid")
        console.log(value);
        console.log(id);
        if(sutemid==id){
            var mockFile = { name: "Click para remover la imagen", size: 12345};
            video_material.emit("addedfile",mockFile);
            video_material.element.lastChild.id=value;
            image_load = "/media/archivos/"+$(this).val();
            video_material.emit("thumbnail", mockFile,image_load);
        }
    });

    $('#myModalFrontMaterial').on('hidden.bs.modal',function () {

        video_material.destroy();
        $(".dz-preview.dz-image-preview").remove();
        console.log(1);
    });
}