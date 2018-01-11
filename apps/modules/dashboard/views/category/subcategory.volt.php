<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="container">
                <div class="row">
                    <h1 class="col-md-7 col-sm-12">Subcategorias</h1>
                    <h3 class="col-md-5 col-sm-12"><a data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Agregar subcategoria</a> </h3>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <table id="subcategoryTable" style="text-align: center" class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Permalink</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($subcategory as $key): ?>
                            <tr id="<?=$key->getSubid()?>">
                                <td class="subcategoryName"><?=$key->getName()?></td>
                                <td class="subcategoryPermalink"><?=$key->getPermalink()?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="getDatasSubcategory('<?=$key->getSubid()?>')" data-toggle="modal" data-target="#myModal2"><span class="fa fa-arrow-up"></span></button>
                                    <button class="btn btn-sm btn-danger"><span class="fa fa-times"></span></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </div><!-- /.inner -->
    </div><!-- /.outer -->
</div><!-- /#content -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="color:black; text-align: center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear categoría</h4>
            </div>
            <form id="newSubCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="<?=$catid?>" name="catid">
                                <label >Nombre:</label>
                                <input type="text" name="subcategory" class="form-control  cPSubCategory">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label >Permalink:</label>
                                <input type="text" name="subcategoryPermalink" id="subcategoryPermalink" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" >Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="color:black; text-align: center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar categoría</h4>
            </div>
            <form id="editSubCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" name="idSubcategory" value="">
                            <div class="col-md-6">
                                <label >Nombre:</label>
                                <input type="text" name="editSubCategory" class="form-control cPEditSubCategory">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label >Permalink:</label>
                                <input type="text" name="editSubCategoryPermalink" id="editSubCategoryPermalink" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" >Editar</button>
                </div>
            </form>
        </div>

    </div>
</div>