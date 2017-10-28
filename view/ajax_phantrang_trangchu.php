
<?php 
$foods = $data["foods"];
$PagerHTMl = $data["pager"];
foreach($foods as $f): ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="blog-item item swin-transition" style = "height:400px">
            <div class="block-img"><img style="width : 200px; height :200px" src="public/assets/images/hinh_mon_an/<?=$f->image?>" alt="" class="img img-responsive">
                <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">vnđ  </span><?=number_format($f->price)?></span></div>
                <div class="group-btn"><a href="detail-food.php?alias=<?=$f->url?>&id=<?=$f->id?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
            </div>
            <div class="block-content">
                <h5 class="title"><a href="detail-food.php?alias=<?=$f->url?>&id=<?=$f->id?>"><?=$f->name?></a></h5>
                <div class="product-info">
                <?=$f->summary?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?=$PagerHTMl?>