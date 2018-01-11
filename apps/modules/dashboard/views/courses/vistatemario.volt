<html>
<head>
    <title>Temario</title>
    <link rel="stylesheet" href="<?=$this->url->get('dash/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=$this->url->get('dash/css/video-js.css')?>">
    <script src="<?=$this->url->get('dash/js/videojs-ie8.min.js')?>"></script>
    <style>
        .container{
            border: solid;
        }
        html {
            min-height: 100%;
            position: relative;
        }
        body {
            margin: 0;
            margin-bottom: 40px;
        }
        footer {
            background-color: black;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            color: white;
        }
    </style>
</head>
<body>
<h2>Temario de: <?=$nombreCurso?></h2>
<div class="container">
    <div class="row" style="text-align: center">
        <div class="col-md-12 col-sm-6"  style="text-align: center">
            <table class="table" style="text-align: center">
                <thead>
                <tr  style="text-align: center">
                    <th>Numero</th>
                    <th>Tema</th>
                    <th>Subtemas</th>
                    <th>Ver videos</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($temario as $key):
                           $consultaSubtemario = \Modules\Models\CdSubtemary::find("temid=".$key->getTemid())?>
                <tr>
                    <td>1</td>
                    <td><?=$key->getTitle()?></td>
                    <td>
                        <?php foreach($consultaSubtemario as $cnv): ?>
                            <?=$cnv->getSubtitle()?></br>
                        <?php endforeach;?>
                    </td>
                    <td>
                     <?php foreach($consultaSubtemario as $cnv2): ?>
                        <?php $video = \Modules\Models\CdVideos::findFirst('sutemid='.$cnv2->getSutemid());?>
                        <a onclick="changeUrl('showVideo','/front/courses_images/<?=$video->getVideo()?>')" data-toggle="modal" data-target="#myModalVideo">Ver video</a></br>
                     <?php endforeach;?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="myModalVideo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="color:black; text-align: center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar categoría</h4>
            </div>
                <div class="modal-body">
                    <div class="container" style="width: 100%;border: none">
                        <div class="row">
                            <div class="col-md-12" id="video-content">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<footer>

</footer>
<script src="<?=$this->url->get('dash/js/jquery.min.js')?>"></script>
<script src="<?=$this->url->get('dash/js/bootstrap.min.js')?>"></script>
<script src="<?=$this->url->get('dash/js/video.js')?>"></script>
<script>
    function changeUrl($id,$url) {
        $('#my-video').remove();
        $('#video-content').append("<video id=\"my-video\" class=\"video-js\" controls preload=\"auto\" style=\"width: 100%;height: 50%\"\n" +
            "poster=\"MY_VIDEO_POSTER.jpg\" data-setup=\"{}\">\n" +
            "<source src="+$url+" type=\"video/mp4\">"+
            "</video>");
        //document.getElementById($id).src=$url;
    }
</script>
</body>
</html>
<?php exit(); ?>