<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\CinemaBranch;
use App\Movies;

class MovieController extends Controller
{
    //

    private MovieRepositoryInterface $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository) 
    {
        $this->movieRepository = $movieRepository;
    }

    public function index(){
        
        return view('adminPanel');
    }

    public function create()
    {

        return view('movies.create');

    }

    public function store(Request $request)
    {
      
        // $movie = Movies::create([
        //     'title'=> $request->input('title'),
        //     'branch_id' => $request->input('branch'),
        //     'showtime' => json_encode($request->input('showtime'))
        // ]);

        $movieDetails = $request->all();

    return response()->json([
                'data' => $this->movieRepository->createMovie($movieDetails) ,'success' => 'Movie created successfully'
           ]);

    }



    public function getMovies()
    {
        return response()->json([$this->movieRepository->getAllMovies()]);
       
    }

    public function getBranches() {

        return response()->json([$this->movieRepository->getBranches()]);
    }
}
