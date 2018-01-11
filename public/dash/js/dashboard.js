$(document).ready(function () {
       if($('#categoryTable').length>=1){
           $('#categoryTable').dataTable();
       }
        if($('#subcategoryTable').length>=1){
                   $('#subcategoryTable').dataTable();
               }

       if($('#newCategory').length>=1){
           $('#newCategory').formValidation({
               framework:'bootstrap',
               icon: {
                   valid: 'glyphicon glyphicon-ok',
                   invalid: 'glyphicon glyphicon-remove',
                   validating: 'glyphicon glyphicon-refresh'
               },
               fields:{
                   category:{
                       validators:{
                           notEmpty:{
                               message:"Rellenar campo"
                           }
                       }
                   }
               }
           }).on("success.form.fv",function (e) {
               e.preventDefault();
               $.ajax({
                   url:"/dashboard/newcategory",
                   method:"post",
                   data:$(this).serialize(),
                   dataType:"json",
                   success:function (resp) {
                       alert("Datos guardados correctamente");
                       $('#categoryTable').append("<tr id="+resp.id+">" +
                           "<td class='categoryName'>"+resp.name+"</td>" +
                           "<td class='categoryPermalink'>"+resp.permalink+"</td>"+
                           "<td>" +
                           "<button class=\"btn btn-sm btn-default\" ><span class=\"fa fa-eye\"></span></button>\n" +
                           "<button class=\"btn btn-sm btn-warning\" onclick=\"getDatasCategory("+resp.id+")\" data-toggle=\"modal\" data-target=\"#myModal2\"><span class=\"fa fa-arrow-up\"></span></button>\n" +
                           "<button class=\"btn btn-sm btn-danger\"><span class=\"fa fa-times\"></span></button></td>"+
                           "</tr>");
                   }
               })
           });
           permalink($(".cPCategory"),"categoryPermalink",$('#newCategory'));
       }
       if($('#newSubCategory').length>=1){
        $('#newSubCategory').formValidation({
            framework:'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                subcategory:{
                    validators:{
                        notEmpty:{
                            message:"Rellenar campo"
                        }
                    }
                }
            }
        }).on("success.form.fv",function (e) {
            e.preventDefault();
            $.ajax({
                url:"/dashboard/newsubcategory",
                method:"post",
                data:$(this).serialize(),
                dataType:"json",
                success:function (resp) {
                    alert("Datos guardados correctamente");
                    $('#subcategoryTable').append("<tr id="+resp.id+">" +
                        "<td class='subcategoryName'>"+resp.name+"</td>" +
                        "<td class='subcategoryPermalink'>"+resp.permalink+"</td>"+
                        "<td>" +
                        "<button class=\"btn btn-sm btn-warning\" onclick=\"getDatasSubcategory("+resp.id+")\" data-toggle=\"modal\" data-target=\"#myModal2\"><span class=\"fa fa-arrow-up\"></span></button>\n" +
                        "<button class=\"btn btn-sm btn-danger\"><span class=\"fa fa-times\"></span></button></td>"+
                        "</tr>");
                }
            })
        });
        permalink($(".cPSubCategory"),"subcategoryPermalink",$('#newSubCategory'));
    }

       if($('#editCategory').length>=1){
        $('#editCategory').formValidation({
            framework:'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                editCategory:{
                    validators:{
                        notEmpty:{
                            message:"Rellenar campo"
                        }
                    }
                }
            }
        }).on("success.form.fv",function (e) {
            e.preventDefault();
            $.ajax({
                url:"/dashboard/editcategory",
                method:"post",
                data:$(this).serialize(),
                dataType:"json",
                success:function (resp) {
                    alert("Datos guardados correctamente");
                    $('#'+resp.id+" .categoryName").text(resp.name);
                    $('#'+resp.id+" .categoryPermalink").text(resp.permalink);

                }
            })
        });
        permalink($(".cPEditCategory"),"editCategoryPermalink",$('#editCategory'));
    }
       if($('#editSubCategory').length>=1){
        $('#editSubCategory').formValidation({
            framework:'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                editSubCategory:{
                    validators:{
                        notEmpty:{
                            message:"Rellenar campo"
                        }
                    }
                }
            }
        }).on("success.form.fv",function (e) {
            e.preventDefault();
            $.ajax({
                url:"/dashboard/editsubcategory",
                method:"post",
                data:$(this).serialize(),
                dataType:"json",
                success:function (resp) {
                    alert("Datos guardados correctamente");
                    $('#'+resp.id+" .subcategoryName").text(resp.name);
                    $('#'+resp.id+" .subcategoryPermalink").text(resp.permalink);

                }
            })
        });
        permalink($(".cPEditSubCategory"),"editSubCategoryPermalink",$('#editSubCategory'));
    }
});

function getDatasCategory($id) {
     $("input[name=idCategory]").val($id);
     $.ajax({
         url:"/dashboard/seecategory",
         method:"post",
         data:{idcategory:$id},
         dataType:"json",
         success:function (resp) {
             $("input[name=editCategory]").val(resp.name);
             $("input[name=editCategoryPermalink]").val(resp.permalink);
         }
     })
}

function getDatasSubcategory($id) {
    $("input[name=idSubcategory]").val($id);
    $.ajax({
        url:"/dashboard/seecategory",
        method:"post",
        data:{idsubcategory:$id},
        dataType:"json",
        success:function (resp) {
            $("input[name=editSubCategory]").val(resp.name);
            $("input[name=editSubCategoryPermalink]").val(resp.permalink);
        }
    })
}

function seeSubcategory($id) {
    window.location.replace("/dashboard/category/subcategory/"+$id);
}
function permalink(selector,type,form){
    selector.on('keyup',function(){
        var title = $(this).val();
        $.ajax({
            url : "/dashboard/validateurl",
            type : "POST",
            data : {title:title,type:type},
            dataType : "json",
            success : function(response){
                if(response.message=="SUCCESS" && response.code==200){
                    $("#"+type).val(response.new_url);
                    form.formValidation('revalidateField', type);
                }else{
                    alert("Ha ocurrido un error intente nuevamente.");
                }
            },
            complete: function(){
            }
        });
    });
}

function changeStatus($id) {
    swal({
        title: '¿Estas seguro que quieres cambiar el estado a activo?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si,estoy seguro',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.value) {

        $.ajax({
            url:"/dashboard/operations-dashboard",
            method:"post",
            data:{id_courses:$id},
            dataType:"json",
            success:function (resp) {
                swal('Estado cambiado a activo');
                $('#'+resp.id).remove();
            }
        })

    }
})
}
function deleteCouse($id) {
    swal({
        title: '¿Estas seguro que quieres eliminar este curso?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si,estoy seguro',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.value) {

        $.ajax({
            url:"/dashboard/operations-dashboard",
            method:"post",
            data:{id_courses_delete:$id},
            dataType:"json",
            success:function (resp) {
                swal('Curso eliminado correctamente');
                $('#'+resp.id).remove();
            }
        })

    }
})
}