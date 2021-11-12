<section class="containerFilter">
    <div class="wrap w90 center">
        <form method="get" class="itemsFlex alignCenter">
            <?php 
                if(isset($_POST['filter'])){
                    $api = new \models\moviesModel;
                    $response = $api->getMovieFilter($_GET['infos']);
                }
            ?>
            <select name="infos" class="inputStyle w20 textCenter marginRightSmall w30DeviceSmall">
                <option value="popular">Popular</option>
                <option value="top_rated">Mais votados</option>
                <option value="upcoming">Próximos</option>
                <option value="now_playing">Agora jogando</option>
            </select>
            <button type="submit" name="filter" class="w20 w30DeviceSmall">Filter</button>
        </form>
    </div>
</section>


<section class="containerMovies containerResultMovies marginTopSmall">
    <div class="wrap w90 center">
        <div class="itemsFilter">
            <ul class="listMovies itemsFlex flexWrap">
            <?php
                $api = new \models\moviesModel;
                @$response = $api->getMovieFilter($_GET['infos']);
                foreach($response->results as $key => $value){
                    if(isset($_POST['addWitchList'])){
                        \models\usersModel::witchList($_SESSION['id'],  $_POST['movie_id'], $_POST['name'], $_POST['image']);
                    }
            ?>
                <li class="positionRelative">
                    <form method="post">
                            <button type="submit" name="addWitchList" class="iconButton"><i class="ri-bookmark-fill"></i></button>
                        <a href="<?php echo BASE ?>movie/<?php echo $response->results[$key]->id ?>" class="box itemsFlex alignCenter justCenter w100 h100">
                            <div class="col w100">
                                <figure class="imgDefaultMovie">
                                    <img src="<?php echo BASE_IMAGES_MOVIES . $response->results[$key]->backdrop_path ?>" />
                                </figure>
                                <div class="row textCenter">
                                    <h4 class="marginDownSmallIn limitLineClampOne"><?php echo $response->results[$key]->title ?></h4>
                                    <p>Lenguage: <?php echo $response->results[$key]->original_language ?></p>
                                </div>
                            </div>
                        </a>
                        <input type="hidden" name="name" value="<?php echo $value->title ?>" />
                        <input type="hidden" name="movie_id" value="<?php echo $value->id ?>" />
                        <input type="hidden" name="image" value="<?php echo $value->backdrop_path ?>" />
                    </form>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</section>