<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="container">
                <div class="row">
                    <h1 class="col-md-7 col-sm-12">Cursos Autorizados</h1>
                </div>

                <div class="row">
                    <div class=""></div>
                    <div class="col-md-9 col-sm-8">
                        <table id="categoryTable" style="text-align: center" class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($cursos as $key): ?>
                            <tr id="" >
                                <td class=""><?=$key->getName()?></td>
                                <td class=""><?=$key->getDescription()?></td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="deleteCouse('<?=$key->getCouid()?>')"><span class="fa fa-times"></span></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
            </div>
        </div><!-- /.inner -->
    </div><!-- /.outer -->
</div><!-- /#content -->
<!-- Modal -->