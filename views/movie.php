<?php

    $api = new \models\moviesModel;
    $id_movie = $_GET['url'];
    $response = $api->getMovie($id_movie);
    if(isset($_POST['addWitchList'])){
        \controllers\usersController::witchList($_SESSION['id'],  $_POST['movie_id'], $_POST['name'], $_POST['image']);
    }
?>

<section class="bannerMovie moviePageBanner marginDownDefault">
    <div class="wrap w90 center">
        <figure class="banner w100 itemsFlex alignEnd" style="background-image:url('<?php echo BASE_IMAGES_MOVIES . $response->backdrop_path ?>');">
            <div class="row w100">
                <div class="marginDownSmall">
                    <h2><?php echo $response->title ?></h2>
                </div>
                <div class="itemsFlex alignCenter">
                    <a href="<?php echo BASE; ?>to-watch/movie/<?php echo $response->id ?>" class="button buttonBgRad w15 marginRightSmall w30DeviceSmall">Ver</a>
                    <form method="post">
                        <button type="submit" name="addWitchList" class="iconAdd"><i class="ri-add-line"></i></button>
                        <input type="hidden" name="name" value="<?php echo $response->title ?>" />
                        <input type="hidden" name="movie_id" value="<?php echo $response->id ?>" />
                        <input type="hidden" name="image" value="<?php echo $response->backdrop_path ?>" />
                    </form>
                </div>
            </div>
        </figure>
    </div>
</section>

<section class="infosContainer marginDownSmall">
    <div class="wrap w90 center itemsFlex justSpaceBetween flexWrap">
        <div class="box w70 itemsFlex flexWrap w100DeviceSmall">
            <div class="w100">
                <h5 class="marginDownSmallIn"><?php echo $response->original_title ?></h5>
                <p><?php echo $response->overview ?></p>
            </div>
            <div class="itemsFlex flexWrap alignEnd w100 marginTopSmallIn">
            <?php
                foreach($response->genres as $key => $value){
            ?>
                <p class="marginRightSmall"><?php echo $value->name ?></p>
            <?php } ?>
            </div>
        </div>

        <div class="box w25 w100DeviceSmall">
            <h5 class="marginDownSmallIn">Companys</h5>
            <?php
                foreach($response->production_companies as $key => $value){
            ?>
            <div class="itemsFlex alignCenter justSpaceBetween">
                <p><?php echo $value->name ?></p>
                <img src="<?php echo BASE_IMAGES_MOVIES . $value->logo_path ?>" />
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="infosContainer marginDownSmall">
    <div class="wrap w90 center itemsFlex justSpaceBetween flexWrap">
        <div class="box w70 itemsFlex flexWrap w100DeviceSmall">
            <div class="w100">
                <h5 class="marginDownSmallIn"><?php echo $response->status ?></h5>
                <p><?php echo $response->tagline ?></p>
            </div>
        </div>

        <div class="box w25 w100DeviceSmall">
            <h5 class="marginDownSmallIn">Vote Average</h5>
            <div class="itemsFlex alignCenter">
                <i class="ri-star-fill marginRightSmall"></i>
                <p><?php echo $response->vote_average ?></p>
            </div>
        </div>
    </div>
</section>

<section class="infosContainer containerMovies marginDownSmall" id="trailers">
    <div class="wrap w90 center">
        <div class="title marginDownSmall">
            <h2>Trailers</h2>
        </div>
        <div class="positionRelative itemsFlex alignCenter">
        <a class="iconArrow leftAction"><i class="ri-arrow-left-s-line"></i></a>
            <div class="slide">
                <ul class="itemsFlex flexRow slideUl">
                    <li class="box w100 itemsFlex flexRow">
                        <?php
                            $responseVideo = $api->getMovieVideo($id_movie);
                            foreach($responseVideo->results as $key => $value){
                        ?>
                        <div class="w80 marginRightSmall">
                            <iframe src="https://www.youtube.com/embed/<?php echo $responseVideo->results[$key]->key ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        <a class="iconArrow rightAction"><i class="ri-arrow-right-s-line"></i></a>
        </div>
    </div>
</section>
