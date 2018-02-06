<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="container">
                <div class="row">
                    <h1 class="col-md-7 col-sm-12">Cursos Pendientes</h1>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9 col-sm-8">
                        <table id="categoryTable" style="text-align: center" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Resumen</th>
                                    <th>Temario</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $contador =0; ?>
                            <?php foreach($cursos as $key): ?>
                                <?php $descripcionArray[]= wordwrap($key->getSummary(),50,"<br>",1);
                            ?>
                                <tr id="<?=$key->getCouid()?>" >
                                    <td><?=$key->getName()?></td>
                                    <td><?=$descripcionArray[$contador]?></td>
                                    <td><a href="/dashboard/cursos/pendientes/ver-temario/<?=$key->getCouid()?>">ver temario</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="changeStatus('<?=$key->getCouid()?>')"><span class="fa fa-thumbs-o-up"></span></button>
                                    </td>
                                </tr>
                            <?php $contador++; ?>
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