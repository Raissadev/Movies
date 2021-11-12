<?php

    namespace models;
    

    class moviesModel{

        private $headers = [
            'Authorization: Bearer **************',
            'Content-Type: application/json;charset=utf-8'
        ];
        private $key;
        private $url;
        private $endpoint;
        private $account;

        public function __construct(){
            $this->key = 'SUA API KEY';
            $this->url = 'https://api.themoviedb.org/3';
            $this->account = $_SESSION['id'];
        }

        public function getMoviesTopsRateds(){
            $this->endpoint = '/movie/top_rated';
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
            
        }

        public function getMoviesLatest(){
            $this->endpoint = '/movie/now_playing';
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
        }

        public function getMovieFilter($infos){
            $infos = isset($_GET['infos']) ? $_GET['infos'] : 'popular';
            $this->endpoint =  '/movie/'.$infos;
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
        }

        
        public function getMovie($movie){
            $this->endpoint =  '/'.$movie;
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
        }

        public function getMovieVideo($movie){
            $this->endpoint =  '/'.$movie.'/videos';
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;

        }

        public function searchMovie($name){
            $this->endpoint =  '/search/movie';
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&query='.$name);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
        }

        public function getMoviesLatestIn(){
            $this->endpoint = '/movie/latest';
            $ch = curl_init($this->url . $this->endpoint . '?apy_key='. $this->key . '&language=en-US');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

            $response = json_decode(curl_exec($ch));
                
            curl_close($ch);
            
            return $response;
            
        }

    }

?>
