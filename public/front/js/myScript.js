$(document).ready(function () {
    window.onload = function () {
        setTimeout(function () {
            var body = document.getElementById("thim-body"),
                thim_preload = document.getElementById("preload"),
                len = body.childNodes.length,
                class_name = body.className.replace(/(?:^|\s)thim-body-preload(?!\S)/, '').replace(/(?:^|\s)thim-body-load-overlay(?!\S)/, '');

            body.className = class_name;
            if (typeof thim_preload !== 'undefined' && thim_preload !== null) {
                for (var i = 0; i < len; i++) {
                    if (body.childNodes[i].id !== 'undefined' && body.childNodes[i].id == "preload") {
                        body.removeChild(body.childNodes[i]);
                        break;
                    }
                }
            }
        }, 500);
    };

try {
    var i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
    if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
            f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
        }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
        var u = (e.c.width(), jQuery(window).height());
        if (void 0 != e.fullScreenOffsetContainer) {
            var c = e.fullScreenOffsetContainer.split(",");
            if (c) jQuery.each(c, function (e, i) {
                u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
            }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
        }
        f = u
    } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
    e.c.closest(".rev_slider_wrapper").css({height: f})
} catch (d) {
    console.log("Failure at Presize of Slider:" + d)
}

    if($('#newClient').length>=1) {
        $('#newClient').validate({
            rules:{
                names:{required:true},
                lastnames:{required:true},
                email:{
                    required:true,
                    remote:{method:"post",url:"/validate-email"}},
                username:{required:true,remote:{method:"post",url:"/validate-email"}},
                password:{required:true}
            },
            messages:{
                names:"Rellenar campo",
                lastnames:"Rellenar campo",
                email:{
                    required:"Rellenar campo",
                    remote:"Este correo ya se esta utilizando"},
                username:{
                    required:"Rellenar campo",
                    remote:"Este nombre de usuario ya se esta utilizando"},
                password:"Rellenar campo"
            },
            submitHandler: function(form){

                $.ajax({
                    type: "post",
                    url:"/newclient",
                    data: $('#newClient').serialize(),
                    dataType:"json",
                    success: function(data){
                        alert("Datos guardados correctamente");
                        $('input[name=names]').val('');
                        $('input[name=lastnames]').val('');
                        $('input[name=email]').val('');
                        $('input[name=username]').val('');
                        $('input[name=password]').val('');
                        window.location.replace("/");
                    }
                });

            }
        });
    }

    if($('#loginform').length>=1){
    $('#loginform').validate({
            rules:{
                user_login:{required:true},
                user_password:{required:true}
            },
            messages:{
                user_login:"Rellenar campo",
                user_password:"Rellenar campo"
            },
            submitHandler: function (form) {
                 $.ajax({
                     url:"/loginclient",
                     method:"post",
                     data:$('#loginform').serialize(),
                     dataType:"json",
                     success:function (resp) {
                       if(resp.message=="correcto"){
                           window.location.replace("/user");
                       }else if (resp.message=="error"){
                           alert("contraseña o usuario incorrecto");
                       }
                     }
                     
                 });
            }
        });
    }
    $('#crearCursoButton').on('click',function () {
        $.ajax({
            url:"/instructor/crear-curso/newcourse",
            method:"post",
            data:{nada:1},
            dataType:"json",
            success:function (resp) {
                if(resp.message=="correcto"){
                    window.location.replace("/instructor/crear-curso/editar-curso/"+resp.id);
                }
            }
        })
    });
    $('#selectCategory').on('click',function () {
         var id= document.getElementById('selectCategory').value;
         $.ajax({
            url:"/instructor/consultsubcategory",
            method:"post",
            data:{catid:id},
            dataType:"json",
            success:function (resp) {
                $('#select_subcategory').html(resp.html);
            }
         });
    });
   if($('#newCourse').length>=1){
       $('#newCourse').validate({
          rules:{
              event: 'blur',
              courseTitle:{required:true},
              description:{
                  required:function (textarea) {
                      CKEDITOR.instances['description'].updateElement(); // update textarea
                      var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                      return editorcontent.length === 0;
                  }
              },
              "image-2":{required:true},
              duration:{required:true},
              price:{required:true},
              subid:{required:true}
          },
          messages:{
              courseTitle:"Rellenar campo",
              description:{required:"Rellenar campo"},
              "image-2":"Rellenar campo",
              duration:"Rellenar campo",
              price:"Rellenar campo",
              subid:"Rellenar campo"
          },
           submitHandler:function (form) {
              $('#description2').val(CKEDITOR.instances.description.getData());
              $.ajax({
                 url:"/instructor/crear-curso/updatecourse",
                 method:"post",
                 data:$('#newCourse').serialize(),
                 dataType:"json",
                 success:function (resp) {
                     //swal("Datos guardados correctamente");
                     window.location.replace("/instructor/crear-curso");
                 }
              });
           }
       });
       permalink($('.cPCourse'),'coursePermalink',$('#newCourse'));
   }

   if($('#newTopic').length>=1){
       $('#newTopic').validate({
           rules:{
               event:'blur',
               temtitle:{required:true}
           },
           messages:{
               temtitle:"Rellenar campo"
           },
           submitHandler:function (form) {
               $.ajax({
                   url:"/instructor/crear-curso/temario/newtemary",
                   method:"post",
                   data:$('#newTopic').serialize(),
                   dataType:"json",
                   success:function (resp) {
                       window.location.replace("/instructor/crear-curso/subtemario/"+resp.id);
                       swal("Datos Guardados Correctamente");
                       $('#contenidoTemario').append("<div id="+resp.id+" class=\"item-event post-3062 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry pmpro-has-access\" style=\"text-align: center\">\n" +
                           "                                    <div class=\"image\">\n" +
                           "                                        <button>Ver subtemas</button>\n" +
                           "                                    </div>\n" +
                           "                                    <div class=\"event-wrapper\">\n" +
                           "                                        <h5 class=\"title temaryTitle\">"+resp.title+"</h5>\n" +
                           "                                        <div class=\"meta\">\n" +
                           "                                            <div class=\"time\"><i class=\"fa fa-pencil\"></i><a onclick=\"consulTemary("+resp.id+");\" href=\"#\"  data-toggle=\"modal\" data-target=\"#myModalFrontEdit\">Editar</a>\n" +
                           "                                            </div>\n" +
                           "                                            <div class=\"time\"><i class=\"fa fa-times\"></i><a onclick=\"deletecourses("+resp.id+",'temid');\" href=\"#\">Eliminar</a>\n" +
                           "                                            </div>\n" +
                           "                                        </div>\n" +
                           "                                        </div>\n" +
                           "                                </div>\n" +
                           "                               ");
                   }
               });
           }
       });
       permalink($('.cPNewTopic'),'titlePermalink',$('#newTopic'));
   }

    if($('#editTopic').length>=1){
        $('#editTopic').validate({
            rules:{
                event:'blur',
                temtitle:{required:true}
            },
            messages:{
                temtitle:"Rellenar campo"
            },
            submitHandler:function (form) {
                $.ajax({
                    url:"/instructor/crear-curso/temario/edittemary",
                    method:"post",
                    data:$('#editTopic').serialize(),
                    dataType:"json",
                    success:function (resp) {
                        swal("Datos Guardados Correctamente");
                        $('#'+resp.id+" .event-wrapper .temaryTitle").text(resp.title);
                    }
                });
            }
        });
        permalink($('.cPEditTopic'),'titlePermalinkEdit',$('#editTopic'));
    }
    if($('#newSubtopic').length>=1){
        $('#newSubtopic').validate({
            rules:{
                event:'blur',
                subtemtitle:{required:true}
            },
            messages:{
                subtemtitle:"Rellenar campo"
            },
            submitHandler:function (form) {
                $.ajax({
                    url:"/instructor/crear-curso/subtemario/newsubtemary",
                    method:"post",
                    data:$('#newSubtopic').serialize(),
                    dataType:"json",
                    success:function (resp) {
                        swal("Datos Guardados Correctamente");
                        $('#contenidoSubtemario').append("<div id="+resp.id+" class=\"item-event post-3062 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry pmpro-has-access\" style=\"text-align: center\">\n" +
                            "                                    <div class=\"image\">\n" +
                            "                                        <a href='/instructor/crear-curso/subtemario/ver-video/"+resp.id+"' >Ver video</a>" +
                            "                                    </div>\n" +
                            "                                    <div class=\"event-wrapper\">\n" +
                            "                                        <h5 class=\"title temaryTitle\">"+resp.title+"</h5>\n" +
                            "                                        <div class=\"meta\">\n" +
                            "                                            <div class=\"time\"><i class=\"fa fa-pencil\"></i><a onclick=\"consultsubtemary("+resp.id+");\" href=\"#\"  data-toggle=\"modal\" data-target=\"#myModalFrontSubtemaryEdit\">Editar</a>\n" +
                            "                                            </div>\n" +
                            "                                            <div class=\"time\"><i class=\"fa fa-times\"></i><a onclick=\"deletecourses("+resp.id+",'subtemid');\" href=\"#\">Eliminar</a>\n" +
                            "                                            </div>\n" +
                            "                                        </div>\n" +
                            "                                        </div>\n" +
                            "                                </div>\n" +
                            "                               ");
                    }
                });
            }
        });
        permalink($('.cPNewSubTopic'),'subtitlePermalink',$('#newSubtopic'));
    }

    if($('#editSubtopic').length>=1){
        $('#editSubtopic').validate({
            rules:{
                event:'blur',
                subtemtitleEdit:{required:true}
            },
            messages:{
                subtemtitleEdit:"Rellenar campo"
            },
            submitHandler:function (form) {
                $.ajax({
                    url:"/instructor/crear-curso/subtemario/editsubtemary",
                    method:"post",
                    data:$('#editSubtopic').serialize(),
                    dataType:"json",
                    success:function (resp) {
                        swal("Datos Guardados Correctamente");
                        $('#'+resp.id+" .event-wrapper .subtemaryTitle").text(resp.title);
                    }
                });
            }
        });
        permalink($('.cPEditSubTopic'),'subtitlePermalinkEdit',$('#editSubtopic'));
    }


});

function becomeInstructor($id) {

    swal({
        title: '¡LEA POR FAVOR!',
        text: "En el momento que acepte tendra acceso a subir cursos, los cuales serán revisados para" +
        " su posterior publicación en esta página ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Acepto!'
       }).then((result)=>{
        if (result.value) {
            $.ajax({
                url:"/changestatus",
                method:"post",
                data:{id:$id},
                dataType:"json",
                success:function (resp) {
                    swal('¡Felicidades!, ya es un instructor');
                    window.location.replace("/instructor");
                }
            })
        }else if (result.dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
      });
}

function permalink(selector,type,form){
    selector.on('keyup',function(){
        var title = $(this).val();
        $.ajax({
            url : "/validateurl",
            type : "POST",
            data : {title:title,type:type},
            dataType : "json",
            success : function(response){
                if(response.message=="SUCCESS" && response.code==200){
                    $("#"+type).val(response.new_url);
                    //form.formValidation('revalidateField', type);
                }else{
                    alert("Ha ocurrido un error intente nuevamente.");
                }
            },
            complete: function(){
            }
        });
    });
}

function sendCourse($id,$status) {
    if($status=='INACTIVE'){
        if($('#statusCourse').text()=='Estado:Enviado'){
            swal('Ya envio su temario anteriormente, espere a que se informe que ocurrira con su curso');
        }else{
             $.ajax({
                 url:"/instructor/crear-curso/cambiar-status",
                 method:"post",
                 data:{id:$id},
                 dataType:"json",
                 success:function (resp) {
                     swal('Se ha enviado su informacion, se le informara si su curso sera aceptado, rechazado o se corregira');
                     $('#statusCourse').text('Estado:Enviado');
                 }
             });
        }
    }else if($status=='SEND'){
        swal('Ya envio su temario anteriormente, espere a que se informe que ocurrira con su curso');
    }
}
function consulTemary($id) {
    $('#temid').val($id);
    $.ajax({
        url:"/instructor/crear-curso/temario/consulttemary",
        method:"post",
        data:{temid:$id},
        dataType:"json",
        success:function (resp) {
            $("input[name=temtitleEdit]").val(resp.title);
            $("input[name=titlePermalinkEdit]").val(resp.permalink);
        }
    })
}
function deletecourses($id,$name) {
if($name=="temid"){
        swal({
            title: '¿Desea eliminar este dato?',
            text: "Ya no podra recuperar este elemento ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Acepto!'
        }).then((result)=>{
            if (result.value) {
            $.ajax({
                url:"/instructor/crear-curso/deletecourses",
                method:"post",
                data:{temid:$id},
                dataType:"json",
                success:function (resp) {
                    swal("Dato eliminado correctamente");
                    $('#'+resp.id).remove();

                }
            });
        }else if (result.dismiss === 'cancel') {
            swal(
                'Cancelado',
                'Tu dato esta a salvo',
                'error'
            )
        }
    });
}else if($name=="subtemid"){
    swal({
        title: '¿Desea eliminar este dato?',
        text: "Ya no podra recuperar este elemento ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Acepto!'
    }).then((result)=>{
        if (result.value) {
        $.ajax({
            url:"/instructor/crear-curso/deletecourses",
            method:"post",
            data:{subtemid:$id},
            dataType:"json",
            success:function (resp) {
                swal("Dato eliminado correctamente");
                $('#'+resp.id).remove();

            }
        });
    }else if (result.dismiss === 'cancel') {
        swal(
            'Cancelado',
            'Tu dato esta a salvo',
            'error'
        )
    }
});
}
}
function consultsubtemary($id){
    $('#subtemid').val($id);
    $.ajax({
        url:"/instructor/crear-curso/temario/consulttemary",
        method:"post",
        data:{subtemid:$id},
        dataType:"json",
        success:function (resp){
            $('input[name=subtemtitleEdit]').val(resp.subtitle);
            $('input[name=subtitlePermalinkEdit]').val(resp.permalink);
            $('#image-3').val(resp.video);

        }
    })


}
function subtemary($id) {
    window.location.replace("/instructor/crear-curso/subtemario/"+$id);
}
