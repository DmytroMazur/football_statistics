<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Controllers\admin\CityController;
use App\Http\Requests\StorePost;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{

    protected $city;
    public function __construct(CityController $cityController)
    {
         $this->city = $cityController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->getPosts();

        return view('admin/post/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCities = $this->city->getCities();        
        
        foreach($allCities as $city ){
            $postSelect[$city->id] = $city->name;
        }

        return view('admin/post/show', ['postSelect'=> $postSelect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $request->validated();
        
        $description = $this->getDescription($request->input('description'));
        
        $title = $request->get('title');
        
        $cityId = $request->get('city_id');
           
        Post::updateOrCreate(
            [
                'title' => $title,
            ],[
                'description'  => $description,
                'city_id'  => $cityId 
            ]
        );

        return redirect()->route('post_index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $postSelect =array();
        
        $post = $this->getPost($id);

        $postSelect[$post->city->id] = $post->city->name; 
        
        $allCities = $this->city->getCities();        
        
        foreach($allCities as $city ){
            if($city->id != $post->city->id){
                $postSelect[$city->id] = $city->name;
            }
        }

       //return view('admin/city/show', ['city' => $city, 'countrySelect' => $countrySelect]);

        return view('admin/post/show', ['post' => $post, 'postSelect'=> $postSelect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $postId = $request->get('id');
        $deleteCity = $this->getPost($postId)->delete();
    
        return 'true';
    }
    private function getPosts(){
        return Post::all();
    }

    private function getPost($id){
        
        return Post::findOrFail($id);
        
    }

    private function getDescription($description){
        
        $detail = $description;
        
        $dom = new \DomDocument();
        
        $dom->loadHtml($detail, LIBXML_HTML_NODEFDTD);    
        
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            
            $data = $img->getAttribute('src');
            
            if(count(explode(';', $data)) > 1){

                list($type, $data) = explode(';', $data);

                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);

                $image_name= "/upload/" . time().$k.'.png';

                $path = public_path() . $image_name;
                
                file_put_contents($path, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', '/public'.$image_name);
            }
        }

       return $dom->saveHTML();

    }
}
