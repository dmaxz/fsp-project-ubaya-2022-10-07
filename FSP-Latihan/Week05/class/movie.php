<?php
include("Koneksi.php");

class Movie extends Koneksi
{
    protected $movie_id;

    protected $title;

    protected $budget;

    protected $homepage;

    protected $overview;

    protected $popularity;

    protected $release_date;

    protected $revenue;

    protected $runtime;

    protected $movie_status;

    protected $tagline;

    protected $vote_average;

    protected $vote_count;

    public function __construct($movie_id=null, $title=null, $budget=null, $homepage=null, $overview=null, $popularity=null, $release_date=null, $revenue=null, $runtime=null, $movie_status=null, $tagline=null, $vote_average=null, $vote_count=null)
    {
        $this->movie_id = $movie_id;
        $this->title = $title;
        $this->budget = $budget;
        $this->homepage = $homepage;
        $this->overview = $overview;
        $this->popularity = $popularity;
        $this->release_date = $release_date;
        $this->revenue = $revenue;
        $this->runtime = $runtime;
        $this->movie_status = $movie_status;
        $this->tagline = $tagline;
        $this->vote_average = $vote_average;
        $this->vote_count = $vote_count;
    }

    public function select()
    {
        $sql = "select * from movie where ";
        is_null($this->movie_id)? : $sql = "$sql movie_id like %$this->movie_id%";
        is_null($this->title)? : $sql = "$sql title like %$this->title%";
        is_null($this->budget)? : $sql = "$sql budget like %$this->budget%";
        is_null($this->homepage)? : $sql = "$sql homepage like %$this->homepage%";
        is_null($this->overview)? : $sql = "$sql overview like %$this->overview%";
        is_null($this->popularity)? : $sql = "$sql popularity like %$this->popularity%";
        is_null($this->release_date)? : $sql = "$sql release_date like %$this->release_date%";
        is_null($this->revenue)? : $sql = "$sql revenue like %$this->revenue%";
        is_null($this->runtime)? : $sql = "$sql runtime like %$this->runtime%";
        is_null($this->movie_status)? : $sql = "$sql movie_status like %$this->movie_status%";
        is_null($this->tagline)? : $sql = "$sql tagline like %$this->tagline%";
        is_null($this->vote_average)? : $sql = "$sql vote_average like %$this->vote_average%";
        is_null($this->vote_count)? : $sql = "$sql vote_count like %$this->vote_count%";
    }
}
