<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class ClassificationController extends Controller
{
    public function ClassificationStore() {
        $collection = (new MongoDB\Client)->pokemon->Classifications;
        $classificationCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $classifications = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('classifications.Index', ['classifications' => $classifications, 'classificationCount' => $classificationCount]);
    }

    //USER
//AddComments
        
public function AddComment() {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $comment = [
        "user_id" => request('userid'),
        "comment" => request('comment'),
        "date" => date("Y-m-d H:i:s")            ];
    $classification= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('classificationid')) ]);
    $Comments = $classification->Comments;
    if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
        $Comments = [$comment];
    } else {
        $Comments = [$comment, ...$Comments];
    }
    $updateOneResult = $collection->updateOne([
        "_id" => new MongoDB\BSON\ObjectId(request('classificationid'))
    ],[
        '$set' => [ 'Comments' => $Comments ]
    ]);

    return redirect("/classifications/".request('classificationid'));
}

//Details

public function Details($id) {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    return view('classifications.Details', [ "classification" => $classification]);
}


//Admin
public function Index() {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classifications = $collection->find();  
    return view('Admin.classifications.Index', ['classifications' => $classifications]);
}

public function Create() {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = $collection->find();
    return view('Admin.classifications.Create', [ "classifications" => $classification ]);
}

public function Store() {
    $classification = [
        "abilities" => request("abilities"),
        "fication" => request("fication"),
        "japanese_name" => request("japanese_name"),
        "type2" => request("type2"),
        "Rating" => [],
        "Comments" => []
    ];
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $insertOneResult = $collection->insertOne($classification);
    return redirect("/Admin/classifications");
}

public function Edit($id) {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.classifications.Edit', [ "classification" => $classification ]);
}    

public function Update(){
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = [
        "abilities" => request("abilities"),
        "fication" => request("fication"),
        "japanese_name" => request("japanese_name"),
        "type2" => request("type2"),
        "Rating" => [],
        "Comments" => []
    ];
    $updateOneResult = $collection->updateOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("classificationid"))
    ], [
        '$set' => $classification
    ]);
    return redirect('/Admin/classifications/');
}

public function Delete($id) {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.classifications.Delete', [ "classification" => $classification ]);
}

public function Remove(){
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $deleteOneResult = $collection->deleteOne([
        "_id" => new \MongoDB\BSON\ObjectId(request("classificationid"))
    ]);
    return redirect('/Admin/classifications/');
}

public function Show($id) {
    $collection = (new MongoDB\Client)->pokemon->Classifications;
    $classification = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
    return view('Admin.classifications.Details', [ "classification" => $classification ]);
}

}
