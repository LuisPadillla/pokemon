<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class CombatController extends Controller
{
    public function CombatStore() {
        $collection = (new MongoDB\Client)->pokemon->Combats;
        $combatCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $combats = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('combats.Index', ['combats' => $combats, 'combatCount' => $combatCount]);
    }

    //USER
//AddComments
        
public function AddComment() {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $comment = [
        "user_id" => request('userid'),
        "comment" => request('comment'),
        "date" => date("Y-m-d H:i:s")            ];
    $combat= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('combatid')) ]);
    $Comments = $combat->Comments;
    if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
        $Comments = [$comment];
    } else {
        $Comments = [$comment, ...$Comments];
    }
    $updateOneResult = $collection->updateOne([
        "_id" => new MongoDB\BSON\ObjectId(request('combatid'))
    ],[
        '$set' => [ 'Comments' => $Comments ]
    ]);

    return redirect("/combats/".request('combatid'));
}

//Admin combat
public function Index() {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combats = $collection->find();  
    return view('Admin.combats.Index', ['combats' => $combats]);
}

public function Create() {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combat = $collection->find();
    return view('Admin.combats.Create', [ "combats" => $combat ]);
}

public function Store() {
    $combat = [
        "First_pokemon" => request("First_pokemon"),
        "Second_pokemon" => request("Second_pokemon"),
        "japanese_name" => request("Winner"),
        "Rating" => [],
        "Comments" => []
    ];
    $collection = (new MongoDB\Client)->pokemon->combats;
    $insertOneResult = $collection->insertOne($combat);
    return redirect("/Admin/combats");
}

public function Edit($id) {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combat = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.combats.Edit', [ "combat" => $combat ]);
}    

public function Update(){
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combat = [
        "First_pokemon" => request("First_pokemon"),
        "Second_pokemon" => request("Second_pokemon"),
        "Winner" => request("Winner"),
        "Rating" => [],
        "Comments" => []
    ];
    $updateOneResult = $collection->updateOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("combatid"))
    ], [
        '$set' => $combat
    ]);
    return redirect('/Admin/combats/');
}

public function Delete($id) {
    $collection = (new MongoDB\Client)->pokemon->combats;
    $combat = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.combats.Delete', [ "combat" => $combat ]);
}

public function Remove(){
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $deleteOneResult = $collection->deleteOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("combatid"))
    ]);
    return redirect('/Admin/combats/');
}

public function Show($id) {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combat = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.combats.Details', [ "combat" => $combat ]);
}



//Details

public function Details($id) {
    $collection = (new MongoDB\Client)->pokemon->Combats;
    $combat = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    return view('combats.Details', [ "combat" => $combat]);
}
}