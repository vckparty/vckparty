<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Area;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\Category;
use App\Models\District;
use App\Models\Metropolitan;
use App\Models\Metrovattam;
use App\Models\Municipality;
use App\Models\Municipalityvattam;
use App\Models\Panchayat;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Townpanchayat;
use App\Models\Townvattam;
use App\Http\Requests\StorePondicheryapplicationRequest;
use App\Http\Requests\UpdatePondicheryapplicationRequest;
use App\Http\Requests\MassDestroyPondicheryapplicationRequest;
use App\Models\CategoryPondichery;
use App\Models\Districtspondichery;
use App\Models\Pondicheryapplication;
use App\Models\Pondicheryassembly;
use App\Models\SubcategoryPondichery;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Mail;
use App\Mail\MyDemoMail;
use Nexmo\Laravel\Facade\Nexmo;

class CustomController extends Controller
{
    public function welcomePage()
    {
    	return view('welcome');
    }

    public function getSubcategoryList(Request $request)
    {
        $subcategory = DB::table("subcategories")
        ->where("category_id",$request->category_id)
        ->pluck("name","id");
        return response()->json($subcategory);
    }

    public function getPostList(Request $request)
    {
        $posts = DB::table("posts")
        ->where("subcategory_id",$request->subcategory_id)
        ->pluck("name","id");
        return response()->json($posts);
    }

    public function getBlockList(Request $request)
    {
        $blocks = DB::table("blocks")
        ->where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($blocks);
    }

    public function getPanchayatList(Request $request)
    {
        $panchayats = DB::table("panchayats")
        ->where("block_id",$request->block_id)
        ->pluck("name","id");
        return response()->json($panchayats);
    }

    public function getTownpanchayatList(Request $request)
    {
        $townpanchayats = DB::table("townpanchayats")
        ->where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($townpanchayats);
    }

    public function getTownvattamList(Request $request)
    {
        $townvattams = DB::table("townvattams")
        ->where("townpanchayat_id",$request->townpanchayat_id)
        ->pluck("name","id");
        return response()->json($townvattams);
    }

    public function getMunicipalityList(Request $request)
    {
        $municipalities = DB::table("municipalities")
        ->where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($municipalities);
    }

    public function getMunicipalityvattamList(Request $request)
    {
        $municipalityvattams = DB::table("municipalityvattams")
        ->where("municipality_id",$request->municipality_id)
        ->pluck("name","id");
        return response()->json($municipalityvattams);
    }

    public function getMetropolitanList(Request $request)
    {
        $metropolitans = DB::table("metropolitans")
        ->where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($metropolitans);
    }

    public function getAreaList(Request $request)
    {
        $areas = DB::table("areas")
        ->where("metropolitan_id",$request->metropolitan_id)
        ->pluck("name","id");
        return response()->json($areas);
    }

    public function getMetrovattamList(Request $request)
    {
        $metrovattams = DB::table("metrovattams")
        ->where("area_id",$request->area_id)
        ->pluck("name","id");
        return response()->json($metrovattams);
    }

    public function getPandiSubcategoryList(Request $request)
    {
        $subcategorypondicherys = DB::table("subcategory_pondicheries")
        ->where("categorypondichery_id",$request->categorypondichery_id)
        ->pluck("name","id");
        return response()->json($subcategorypondicherys);
    }

    public function getPandiSubsubcategoryList(Request $request)
    {
        $subcategorypondicherys = DB::table("subsubcategories")
        ->where("subcategorypondichery_id",$request->subcategorypondichery_id)
        ->pluck("name","id");
        return response()->json($subcategorypondicherys);
    }

	public function socialmedia()
    {
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = Subcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applying_posts = Post::where('subcategory_id',1)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blocks = Block::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayats = Panchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townpanchayats = Townpanchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townvattams = Townvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalities = Municipality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalityvattams = Municipalityvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metropolitans = Metropolitan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metrovattams = Metrovattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('socialmedia-application-form', compact('categories', 'subcategories', 'applying_posts', 'districts', 'blocks', 'panchayats', 'townpanchayats', 'townvattams', 'municipalities', 'municipalityvattams', 'metropolitans', 'areas', 'metrovattams'));
    }

    public function postApp(Request $request)
	{
		$application = new Application;
        $application->name = $request->input('name');
        if ($request->input('category_id') == "Select") {
            $application->category_id = "";
        } else {
            $application->category_id = $request->input('category_id');    
        }
        if ($request->input('subcategory_id') == "Select") {
            $application->subcategory_id = "";
        } else {
            $application->subcategory_id = $request->input('subcategory_id');    
        }
        if ($request->input('post_id') == "Select") {
            $application->applying_post_id = "";
        } else {
            $application->applying_post_id = $request->input('post_id');    
        }
        if ($request->input('district_id') == "Select") {
            $application->district_id = "";
        } else {
            $application->district_id = $request->input('district_id');    
        }
        if ($request->input('block_id') === "Select") {
            $application->block_id = "";
        } else {
            $application->block_id = $request->input('block_id');    
        }
        if ($request->input('panchayat_id') == "Select") {
            $application->panchayat_id = "";
        } else {
            $application->panchayat_id = $request->input('panchayat_id');    
        }
        if ($request->input('townpanchayat_id') == "Select") {
            $application->townpanchayat_id = "";
        } else {
            $application->townpanchayat_id = $request->input('townpanchayat_id');    
        }
        if ($request->input('townvattam_id') == "Select") {
            $application->townvattam_id = "";
        } else {
            $application->townvattam_id = $request->input('townvattam_id');    
        }
        if ($request->input('municipality_id') == "Select") {
            $application->municipality_id = "";
        } else {
            $application->municipality_id = $request->input('municipality_id');    
        }
        if ($request->input('municipalityvattam_id') == "Select") {
            $application->municipalityvattam_id = "";
        } else {
            $application->municipalityvattam_id = $request->input('municipalityvattam_id');    
        }
        if ($request->input('metropolitan_id') == "Select") {
            $application->metropolitan_id = "";
        } else {
            $application->metropolitan_id = $request->input('metropolitan_id');    
        }
        if ($request->input('area_id') == "Select") {
            $application->area_id = "";
        } else {
            $application->area_id = $request->input('area_id');    
        }
        if ($request->input('metrovattam_id') == "Select") {
            $application->metrovattam_id = "";
        } else {
            $application->metrovattam_id = $request->input('metrovattam_id');    
        }
        $application->social_medias = $request->input('social_medias');
        $application->district_id = $request->input('district_id');
        $application->block_id = $request->input('block_id');
        $application->panchayat_id = $request->input('panchayat_id');
        $application->townpanchayat_id = $request->input('townpanchayat_id');
        $application->townvattam_id = $request->input('townvattam_id');
        $application->municipality_id = $request->input('municipality_id');
        $application->municipalityvattam_id = $request->input('municipalityvattam_id');
        $application->metropolitan_id = $request->input('metropolitan_id');
        $application->area_id = $request->input('area_id');
        $application->metrovattam_id = $request->input('metrovattam_id');
        $application->facebook = $request->input('facebook');
        $application->twitter = $request->input('twitter');
        $application->whatsapp_number = $request->input('whatsapp_number');
        $application->email = $request->input('email');
        $application->youtube_channel = $request->input('youtube_channel');
        $application->instagram = $request->input('instagram');
        $application->current_post = $request->input('current_post');
        $application->gender = $request->input('gender');
        $application->dob = $request->input('dob');
        $application->mother = $request->input('mother');
        $application->father = $request->input('father');
        $application->marrital_status = $request->input('marrital_status');
        $application->husband_wife_name = $request->input('husband_wife_name');
        $application->education = $request->input('education');
        $application->profession = $request->input('profession');
        $application->join_date = $request->input('join_date');
        $application->permanent_address = $request->input('permanent_address');
        $application->communication_address = $request->input('communication_address');
        $application->social_category = $request->input('social_category');
        $application->payment_status = $request->input('payment_status');
        $application->notes = $request->input('notes');
        

        if ($request->input('photo', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('payment_receipt', []) as $file) {
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
        }

        foreach ($request->input('documents', []) as $file) {
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $application->id]);
        }

        $application->save();

        
        $numbers = $request->input('whatsapp_number');
        $message = "உங்களது விண்ணப்பம் ஏற்றுக்கொள்ளப்பட்டது. நன்றி - தலைமையகம், விசிக.";

        TextLocal::sendMms ($numbers, $fileSource=null, $message, $sched=null, $test=false, $optouts=false);

        return redirect()->back()->with('message', 'உங்களது விண்ணப்பம் ஏற்றுக்கொள்ளப்பட்டது. நன்றி - தலைமையகம், விசிக.');

	}

    public function pondicheryApplicationForm()
    {
        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districtspondicheries = Districtspondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryassemblys = Pondicheryassembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('application-pondichery', compact('categorypondicheries', 'subcategorypondicheries', 'subsubcategories', 'districtspondicheries', 'pondicheryassemblys'));
    }

    public function postPondicheryApplicationForm(StorePondicheryapplicationRequest $request)
    {
        $pondicheryapplication = Pondicheryapplication::create($request->all());

       
        if ($request->input('photo', false)) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('payment_receipt', []) as $file) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
        }

        foreach ($request->input('documents', []) as $file) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pondicheryapplication->id]);
        }

        $myEmail = $request->input('email');

        if (!empty($myEmail)) {
      
            Mail::to($myEmail)->send(new MyDemoMail());
        }

        // Nexmo::message()->send([
        //     'to'   => '91' . $request->input('whatsapp_number'),
        //     'from' => 'Vonage APIs',
        //     'text' => 'உங்களது விண்ணப்பம் கிடைத்தது. நன்றி - தலைமையகம், விசிக.',
        //     'type' => 'unicode'
        // ]);

        return redirect()->back()->with('message', 'உங்களது விண்ணப்பம் கிடைத்தது. நன்றி - தலைமையகம், விசிக.');

    }
}
