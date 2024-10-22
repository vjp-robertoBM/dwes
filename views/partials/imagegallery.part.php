<div class="row popup-gallery">
    <?php
    for ($i = 0; $i < 12; $i++) {
        echo '<div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">
            <img class="img-responsive" src="'.$arrayImg[$i]->getUrlPortfolio().'" alt="'.$arrayImg[$i]->getDescripcion().'">
            <div class="behind">
                <div class="head text-center">
                    <ul class="list-inline">
                        <li>
                            <a class="gallery" href="'.$arrayImg[$i]->getUrlGallery().'" data-toggle="tooltip" data-original-title="Quick View">
                                <i class="fa fa-eye"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                <i class="fa fa-heart"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                                <i class="fa fa-download"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                                <i class="fa fa-info"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row box-content">
                    <ul class="list-inline text-center">
                        <li><i class="fa fa-eye"></i> '.$arrayImg[$i]->getNumVisualizaciones().'</li>
                        <li><i class="fa fa-heart"></i> '.$arrayImg[$i]->getNumLikes().'</li>
                        <li><i class="fa fa-download"></i> '.$arrayImg[$i]->getNumDownloads().'</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
</div>
<nav class="text-center">
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#" aria-label="suivant">
                <span aria-hidden="true">&raquo;</span>
            </a></li>
    </ul>
</nav>