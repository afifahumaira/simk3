<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Apar;
use App\Models\Control;
use App\Models\Departemen;
use App\Models\Dokumen;
use App\Models\Hazard;
use App\Models\Hirarc;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\Laporinsiden;
use App\Models\Location;
use App\Models\Map;
use App\Models\P2k3;
use App\Models\P3k_inventories;
use App\Models\Potensibahaya;
use App\Models\Risk;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Firestore;

class FirebaseController extends Controller
{
    protected $firestore;

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
    }

    public function index()
    {
        // dd($this->firestore->database()->collection('departments')->documents()->rows());
        $data = $this->firestore
                    ->database()
                    ->collection('departments')
                    ->documents();

        $datas = [];
        foreach($data as $d) {
            $datas[$d->id()] = $d->data();
        }

        return response()->json($datas);

        // if ($data->isEmpty()) {
        //     return collect();
        // }

        // $departments = collect($data->rows());

        // return view('testfirestore', compact('departments'));
    }

    public function insertdepartment() {
        $departments = Departemen::all();

        // Set the data for the document
        foreach($departments as $dep) {
            $collection = $this->firestore->database()->collection('departments');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $dep->id,
                'name' => $dep->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertactivities() {
        $activities = Activitie::all();

        // Set the data for the document
        foreach($activities as $act) {
            $collection = $this->firestore->database()->collection('activities');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $act->id,
                'name' => $act->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertdocuments() {
        $documents = Dokumen::all();

        // Set the data for the document
        foreach($documents as $doc) {
            $collection = $this->firestore->database()->collection('documents');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $doc->id,
                'name' => $doc->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function inserthazards() {
        $hazards = Hazard::all();

        // Set the data for the document
        foreach($hazards as $hzd) {
            $collection = $this->firestore->database()->collection('hazards');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $hzd->id,
                'name' => $hzd->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function inserthirarcs() {
        $hirarcs = Hirarc::all();

        // Set the data for the document
        foreach($hirarcs as $hir) {
            $collection = $this->firestore->database()->collection('hirarcs');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $hir->id,
                'name' => $hir->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertinventories() {
        $inventories = Inventory::all();

        // Set the data for the document
        foreach($inventories as $nvt) {
            $collection = $this->firestore->database()->collection('inventories');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $nvt->id,
                'name' => $nvt->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertinvestigasis() {
        $investigasis = Investigasi::all();

        // Set the data for the document
        foreach($investigasis as $nvi) {
            $collection = $this->firestore->database()->collection('investigasis');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $nvi->id,
                'name' => $nvi->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertlaporinsidens() {
        $laporinsidens = Laporinsiden::all();

        // Set the data for the document
        foreach($laporinsidens as $lpi) {
            $collection = $this->firestore->database()->collection('laporinsidens');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $lpi->id,
                'name' => $lpi->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertlocations() {
        $locations = Location::all();

        // Set the data for the document
        foreach($locations as $loc) {
            $collection = $this->firestore->database()->collection('locations');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $loc->id,
                'name' => $loc->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertmaps() {
        $maps = Map::all();

        // Set the data for the document
        foreach($maps as $map) {
            $collection = $this->firestore->database()->collection('maps');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $map->id,
                'name' => $map->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertp2k3s() {
        $p2k3s = P2k3::all();

        // Set the data for the document
        foreach($p2k3s as $p2k3) {
            $collection = $this->firestore->database()->collection('p2k3s');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $p2k3->id,
                'name' => $p2k3->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertpotensibahayas() {
        $potensibahayas = Potensibahaya::all();

        // Set the data for the document
        foreach($potensibahayas as $pby) {
            $collection = $this->firestore->database()->collection('potensibahayas');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $pby->id,
                'name' => $pby->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertrisks() {
        $risks = Risk::all();

        // Set the data for the document
        foreach($risks as $rsk) {
            $collection = $this->firestore->database()->collection('risks');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $rsk->id,
                'name' => $rsk->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertusers() {
        $users = User::all();

        // Set the data for the document
        foreach($users as $usr) {
            $collection = $this->firestore->database()->collection('users');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $usr->id,
                'name' => $usr->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertapars() {
        $apars = Apar::all();

        // Set the data for the document
        foreach($apars as $apr) {
            $collection = $this->firestore->database()->collection('apars');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $apr->id,
                'name' => $apr->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertcontrols() {
        $controls = Control::all();

        // Set the data for the document
        foreach($controls as $ctr) {
            $collection = $this->firestore->database()->collection('controls');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $ctr->id,
                'name' => $ctr->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

    public function insertp3k_inventories() {
        $p3k_inventories = P3k_inventories::all();

        // Set the data for the document
        foreach($p3k_inventories as $p3k) {
            $collection = $this->firestore->database()->collection('p3k_inventories');

            // Create a new document with auto-generated ID
            $newDocument = $collection->newDocument();
            $newDocument->set([
                'id' => $p3k->id,
                'name' => $p3k->name
            ]);
        }

        // Insert the data into the document
        return "success";
    }

}

