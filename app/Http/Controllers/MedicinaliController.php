<?php

namespace MedicAppServer\Http\Controllers;

class MedicinaliController extends Controller {

    public function index() {
        return view('medicinali.medicinali');
    }
}
