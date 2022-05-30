<?php
namespace App\Interfaces;

interface MovieRepositoryInterface 
{
    public function getAllMovies();
    public function getBranches();
    public function createMovie(array $movieDetails);
}

?>