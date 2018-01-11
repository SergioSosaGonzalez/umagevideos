<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="container">
                <div class="row">
                    <h1 class="col-md-7 col-sm-12">Categorias</h1>
                    <h3 class="col-md-5 col-sm-12"><a data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Agregar categoria</a> </h3>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                    <table id="categoryTable" style="text-align: center" class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Permalink</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($consulta as $key): ?>
                            <tr id="<?=$key->getCatid()?>">
                                <td class="categoryName"><?=$key->getName()?></td>
                                <td class="categoryPermalink"><?=$key->getPermalink()?></td>
                                <td>
                                    <button class="btn btn-sm btn-default" onclick="seeSubcategory('<?=$key->getCatid()?>')"><span class="fa fa-eye"></span></button>
                                    <button class="btn btn-sm btn-warning" onclick="getDatasCategory('<?=$key->getCatid()?>')" data-toggle="modal" data-target="#myModal2"><span class="fa fa-arrow-up"></span></button>
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
            <form id="newCategory">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <label >Nombre:</label>
                        <input type="text" name="category" class="form-control  cPCategory">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label >Permalink:</label>
                            <input type="text" name="categoryPermalink" id="categoryPermalink" class="form-control" readonly>
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
            <form id="editCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" name="idCategory" value="">
                            <div class="col-md-6">
                                <label >Nombre:</label>
                                <input type="text" name="editCategory" class="form-control cPEditCategory">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label >Permalink:</label>
                                <input type="text" name="editCategoryPermalink" id="editCategoryPermalink" class="form-control" readonly>
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