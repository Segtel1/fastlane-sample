<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Movies;
use App\CinemaBranch;

class MovieRepository implements MovieRepositoryInterface 
{
    public function getAllMovies() 
    {
        return Movies::with('cinema_branches')->get();
    }

    public function getBranches() 
    {
        return CinemaBranch::all();
    }

    public function createMovie(array $movieDetails) 
    {
        // return Movies::create($orderDetails);
        return Movies::create([
            'title'=> $movieDetails['title'],
            'branch_id' => $movieDetails['branch'],
            'showtime' => json_encode($movieDetails['showtime'])
        ]);
    }
}