<section class="theme-slider section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col">
                <div class="slide-1 no-arrow">
                    <?php
                    $banner = Requests::post($api_endpoint . "banner/all", $header);
                    // $banner = json_decode($banner->body, TRUE);
                    $banner = json_decode($banner->body, TRUE);
                    $banner = $banner['data'];

                    // $banner = $data_agent['data'];
                    foreach ($banner as $banner_show) {
                    ?>
                    <div>
                        <div class="slider-banner p-center slide-banner-1">
                            <div class="slider-img">
                                <img src="<?= $banner_show['image'] ?>" class=" bg-img" alt="slider">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>