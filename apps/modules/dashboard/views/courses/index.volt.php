<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="container">
                <div class="row">
                    <h1 class="col-md-7 col-sm-12">Cursos Pendientes</h1>
                </div>

                <div class="row">
                    <div class=""></div>
                    <div class="col-md-9 col-sm-8">
                        <table id="categoryTable" style="text-align: center" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Temario</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($cursos as $key): ?>
                                <tr id="<?=$key->getCouid()?>" >
                                    <td class="categoryName"><?=$key->getName()?></td>
                                    <td class="categoryPermalink"><?=$key->getDescription()?></td>
                                    <td class="categoryPermalink"><a href="/dashboard/cursos/pendientes/ver-temario/<?=$key->getCouid()?>">ver temario</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="changeStatus('<?=$key->getCouid()?>')"><span class="fa fa-thumbs-o-up"></span></button>
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