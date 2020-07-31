<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MovesetController extends Controller
{
    public function MovesetStore() {
        $collection = (new MongoDB\Client)->pokemon->Movesets;
        $movesetCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $movesets = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('movesets.Index', ['movesets' => $movesets, 'movesetCount' => $movesetCount]);
    }

    //USER
//AddComments
        
public function AddComment() {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $comment = [
        "user_id" => request('userid'),
        "comment" => request('comment'),
        "date" => date("Y-m-d H:i:s")            ];
    $moveset= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('movesetid')) ]);
    $Comments = $moveset->Comments;
    if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
        $Comments = [$comment];
    } else {
        $Comments = [$comment, ...$Comments];
    }
    $updateOneResult = $collection->updateOne([
        "_id" => new MongoDB\BSON\ObjectId(request('movesetid'))
    ],[
        '$set' => [ 'Comments' => $Comments ]
    ]);

    return redirect("/movesets/".request('movesetid'));
}

//Details

public function Details($id) {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $moveset = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    return view('movesets.Details', [ "moveset" => $moveset]);
}

//Admin
public function Index() {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $movesets = $collection->find();  
    return view('Admin.movesets.Index', ['movesets' => $movesets]);
}

public function Create() {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $moveset = $collection->find();
    return view('Admin.movesets.Create', [ "movesets" => $moveset ]);
}

public function Store() {
    $moveset = [
        "Name" => request("Name"),
        "Type" => request("Type"),
        "Effect" => request("Effect"),
        "Rating" => [],
        "Comments" => []
    ];
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $insertOneResult = $collection->insertOne($moveset);
    return redirect("/Admin/movesets");
}

public function Edit($id) {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $moveset = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.movesets.Edit', [ "moveset" => $moveset ]);
}    

public function Update(){
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $moveset = [
        "Name" => request("Name"),
        "Type" => request("Type"),
        "Effect" => request("Effect"),
        "Rating" => [],
        "Comments" => []
    ];
    $updateOneResult = $collection->updateOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("movesetid"))
    ], [
        '$set' => $moveset
    ]);
    return redirect('/Admin/movesets/');
}

public function Delete($id) {
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $moveset = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.movesets.Delete', [ "moveset" => $moveset ]);
}

public function Remove(){
    $collection = (new MongoDB\Client)->pokemon->Movesets;
    $deleteOneResult = $collection->deleteOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("movesetid"))
    ]);
    return redirect('/Admin/movesets/');
}
}
