<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class PocketmonsterController extends Controller
{
    public function PocketmonsterStore() {
        $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
        $classificationCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $pocketmonsters = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('pocketmonsters.Index', ['pocketmonsters' => $pocketmonsters, 'classificationCount' => $classificationCount]);
    }

    //USER
//AddComments
        
public function AddComment() {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $comment = [
        "user_id" => request('userid'),
        "comment" => request('comment'),
        "date" => date("Y-m-d H:i:s")            ];
    $pocketmonster= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('pocketmonsterid')) ]);
    $Comments = $pocketmonster->Comments;
    if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
        $Comments = [$comment];
    } else {
        $Comments = [$comment, ...$Comments];
    }
    $updateOneResult = $collection->updateOne([
        "_id" => new MongoDB\BSON\ObjectId(request('pocketmonsterid'))
    ],[
        '$set' => [ 'Comments' => $Comments ]
    ]);

    return redirect("/pocketmonsters/".request('pocketmonsterid'));
}

//Details

public function Details($id) {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    return view('pocketmonsters.Details', [ "pocketmonster" => $pocketmonster]);
}


//Admin
public function Index() {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonsters = $collection->find();  
    return view('Admin.pocketmonsters.Index', ['pocketmonsters' => $pocketmonsters]);
}

public function Create() {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = $collection->find();
    return view('Admin.pocketmonsters.Create', [ "pocketmonsters" => $pocketmonster ]);
}

public function Store() {
    $pocketmonster = [
        "name" => request("name"),
        "pokedex_number" => request("pokedex_number"),
        "generation" => request("generation"),
        "Rating" => [],
        "Comments" => []
    ];
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $insertOneResult = $collection->insertOne($pocketmonster);
    return redirect("/Admin/pocketmonsters");
}

public function Edit($id) {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.pocketmonsters.Edit', [ "pocketmonster" => $pocketmonster ]);
}    

public function Update(){
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = [
        "name" => request("name"),
        "pokedex_number" => request("pokedex_number"),
        "generation" => request("generation"),
        "Rating" => [],
        "Comments" => []
    ];
    $updateOneResult = $collection->updateOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("pocketmonsterid"))
    ], [
        '$set' => $pocketmonster
    ]);
    return redirect('/Admin/pocketmonsters/');
}

public function Delete($id) {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.pocketmonsters.Delete', [ "pocketmonster" => $pocketmonster ]);
}

public function Remove(){
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $deleteOneResult = $collection->deleteOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("pocketmonsterid"))
    ]);
    return redirect('/Admin/pocketmonsters/');
}

public function Show($id) {
    $collection = (new MongoDB\Client)->pokemon->Pocketmonsters;
    $pocketmonster = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.pocketmonsters.Details', [ "pocketmonster" => $pocketmonster ]);
}

}