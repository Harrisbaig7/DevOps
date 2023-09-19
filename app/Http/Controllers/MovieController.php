<?php
namespace App\Http\Controllers;
use App\Models\Movies;
use App\Models\Review;
use App\Models\Shows;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;
class MovieController extends Controller{
public function show(){
$movielist = Movies::all();
return view('admin.viewMovies');
}
public function search(Request $request){
if ($request->ajax()){
$query = $request->get('query');
if ($query != ''){
$data = Movies::where('movie_name', 'LIKE', '%'.$query.'%')->get();
}else{
$data = Movies::all();
}
}
$output = '';
$coverurl = asset('covers/');
foreach($data as $movie){
$output.='
<tr>
<td>'.$movie->id.'</td>
<td>'.$movie->movie_name.'</td>
<td>'.$movie->ratings.'</td>
<td>'.$movie->year.'</td>
<td><img src="'.$coverurl.'/'.$movie->movie_cover.'" alt=""></td>
<td><a href="/admin/'.$movie->id.'/edit"><i class="fas fa-edit"></i></a>&emsp;
<a href="/admin/'.$movie->id.'/delete"><i class="fas fa-trash-alt"></i></a>&emsp;
<a href="/admin/'.$movie->id.'/review">Reviews</a>
<a href="/admin/'.$movie->id.'/show">Screen</a>
</td>
</tr>';
}
return response()->json(['data'=>$output]);
}
public function addMovie(Request $request){
$movie = new Movies();
if ($request->hasFile('movie_cover')){
$file = $request->file('movie_cover');
$extension = $file->getClientOriginalExtension();
$filename = time().'.'.$extension;
$movie->movie_cover = $filename;
$file->move('covers/', $filename);
}else{
$movie->movie_cover = 'defaultImg.png';
}
$movie->movie_name = $request->input('movie_name');
$movie->movie_description = $request->input('movie_description');
$movie->ratings = $request->input('ratings');
$movie->year = $request->input('year');
$movie->save();
return redirect('/admin/viewMovies')->with('status', 'Movie Added Successfully');
}
public function edit($id){
$movie = Movies::find($id);
return view('admin.editMovies', compact('movie'));
}
public function update(Request $request, $id){
$movie = Movies::find($id);
if ($request->hasFile('movie_cover')){
$filepath = 'covers/'.$movie->movie_cover;
if (File::exists($filepath) && $movie->movie_cover != 'defaultImg.png'){
File::delete($filepath);
}
$file = $request->file('movie_cover');
$extension = $file->getClientOriginalExtension();
$filename = time().'.'.$extension;
$movie->movie_cover = $filename;
$file->move('covers/', $filename);
}
$movie->movie_name = $request->input('movie_name');
$movie->movie_description = $request->input('movie_description');
$movie->ratings = $request->input('ratings');
$movie->year = $request->input('year');
$movie->update();
return redirect('/admin/viewMovies')->with('status', 'Movie Updated Successfully');
}
public function delete($id){
$movie = Movies::find($id);
$movie->delete();
return redirect('/admin/viewMovies')->with('status', 'Movie Deleted Successfully');
}
public function review($id){
$reviews = Review::where('movie_id', $id)->get();
$movie = Movies::find($id);
return view('/admin/reviewsMovies', compact('reviews', 'movie'));
}
public function addreview(Request $request, $id, $user_id){
$review = new Review();
$review->user_id = $user_id;
$review->movie_id = $id;
$review->movie_review = $request->input('movie_review');
$review->save();
return redirect('/home')->with('status', 'Review Added Successfully');
}
public function moviedetails($id){
$movie = Movies::find($id);
$user = Auth::user();
return view('/detailsMovie', compact('movie', 'user'));
}
public function adminaddreview(Request $request, $id, $user_id){
$review = new Review();
$review->user_id = $user_id;
$review->movie_id = $id;
$review->movie_review = $request->input('movie_review');
$review->save();
return redirect('/admin/home')->with('status', 'Review Added Successfully');
}
public function adminmoviedetails($id){
$movie = Movies::find($id);
$user = Auth::user();
return view('/admin/detailsMovie', compact('movie', 'user'));
}
public function viewshow(){
$showlist = Shows::all();
$movielist = Movies::all();
return view('admin.viewShows', compact('showlist', 'movielist'));
}
public function movie_show($id){
$movie = Movies::find($id);
return view('admin.addShows', compact('movie'));
}
public function addshow(Request $request, $id){
$show = new Shows();
$show->movie_id = $id;
$show->movie_seats = $request->input('movie_seats');
$show->show_day = $request->input('show_day');
$show->movie_time = $request->input('movie_time');
$show->save();
return redirect('/admin/viewShows')->with('status', 'Show Added Successfully');
}
public function deleteshow($id){
$show = Shows::find($id);
$show->delete();
return redirect('/admin/viewShows')->with('status', 'Show Deleted Successfully');
}
public function usershow(){
$movielist = Movies::all();
return view('viewMovie', compact('movielist'));
}
}
