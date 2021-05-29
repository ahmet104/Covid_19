<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Context;
use App\Core\Facade\Security;
use App\Storage;
use Lang;
use Response;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = Auth::user();
        // $Storge_context =Context::where('id' ,$user->current_storage )->first();
        // $context = Context::where('id' ,1 )->first();
        // $sec = Security::checkCapability($user, 'data:insert', $context);
        // if($sec || Security::checkCapability($user, 'data:insert', $Storge_context)){
        //     return view('createentityopj');
        // }else{
        //          return view('alert' , ['alert' => "You Do Not Have Permission To Enter this Page"]);

        // }
        return view('upload.uploadform');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // dd($request);

        $request_data = $request->all();
        $file_key = array_keys($request_data)[0];
        request()->validate([
            $file_key  => 'required|mimes:doc,docx,pdf,jpg,jpeg,png,txt|max:2048',
        ]);

        if ($files = $request->file($file_key)) {

            //store file into document folder
            $file = $request->$file_key->store('public/documents');
            $user = Auth::user();
            $storage =Storage::where('context_id' ,$user->current_storage )->first();
            $client = DB::getMongoClient();
            if($storage->name)
            {
                $name = $storage->name;
                $db = $client->$name;
            }else{
                return Response()->json([
                    "success" => false,
                    "file" => '',
                    "file_view"=>''

                ]);
            }
            $collection = $db->file;
            $file_opj = $collection->insertOne(["file_path" => $file,"input_name"=> $file_key,"related_id"=>""]);
            $file = (string)$file_opj->getInsertedId();
            return Response()->json([
                "success" => true,
                "file" => (string)$file_opj->getInsertedId(),
                "file_view"=>'<li class="d-flex align-items-center">'.  str_replace('_', ' ', $file_key) .'<a id="'.$file.'" class="ml-3" href="javascript:;" onclick="delete_file(this.id)"><i class="uil uil-trash-alt cred"></i></a><a id="'.$file.'" class="ml-1" href="javascript:;" onclick="delete_file(this.id)"><i class="uil uil-eye cprimary"></i></a></li>'
            ]);

        }
        return Response()->json([
            "success" => false,
            "file" => '',
            "file_view"=>''

        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $storage =Storage::where('context_id',$user->current_storage)->first();
        $client = DB::getMongoClient();
        if($storage->name)
        {
            $name = $storage->name;
            $db = $client->$name;
        }else{
            return;
        }
        $collection = $db->file;
        $id_obj = new \MongoDB\BSON\ObjectID($id);
        $file_document = $collection->findOne(['_id'=>$id_obj]);
        if($file_document)
        {
            $file_path = storage_path('app/') . $file_document->file_path;
            return Response::download($file_path);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {


        $user = Auth::user();
        $storage =Storage::where('context_id',$user->current_storage)->first();

        $client = DB::getMongoClient();
        if($storage->name)
        {
            $name = $storage->name;
            $db = $client->$name;
        }else{
            return Response()->json([
                "success" =>    false,
                "msg" => 'the current storage: ' .$name.' is not exsist',
            ]);
        }

        $collection = $db->file;
        $id_obj = new \MongoDB\BSON\ObjectID($id);



        $file_document = $collection->findOne(['_id'=>$id_obj]);

        if($file_document)
        {
            $input_name = $file_document->input_name;
            $collection->findOneAndDelete(['_id'=>$id_obj]);
            return Response()->json([
                "success" => true,
                "input_id" => "#".$input_name,
                "file_view"=> '<form id="' . $input_name . '" method="POST" enctype="multipart/form-data" class="laravel-ajax-file-upload" action="javascript:void(0)" >
                                <ul id="' .$input_name . '_uploadded_view" class="menu-list">

                                </ul>

                                <div class="d-flex align-items-end">
                                    <div class="' . $input_name . '_upload_div form-group mb-0">
                                        <label class="d-block">' .str_replace('_', ' ', $input_name) . '</label>
                                        <div class="custom-file">
                                            <input type="file" name="' .$input_name . '" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div id="progress-wrp">
                                            <div class="' . $input_name . '-progress-bar progress-bar"></div >
                                            <div class="' . $input_name . '-status status">0%</div>
                                        </div>
                                    </div>

                                    <div class="' . $input_name . '_upload_div mx-4">
                                      <button type="submit" onclick="upload_file()" class="btn bgreen">Upload</button>
                                    </div>
                                </div>

                            </form>'
            ]);
            //echo json_encode(array('success'=>'true'));
        }else{
            return Response()->json([
                "success" => false,
                "msg" => 'file is not exsist!',

            ]);


        }

    }
}
