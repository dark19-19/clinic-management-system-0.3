<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorDataRequest;
use App\Http\Requests\UpdateDoctorDataRequest;
use App\Http\Resources\DoctorResource;
use App\Services\DoctorService;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = DoctorService::index();
        return response()->json([
            'doctors' => DoctorResource::collection($doctors)
        ], 200);
    }

    //      Manager Functions:

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorDataRequest $request)
    {
        $doctor = DoctorService::storeData($request);
        return response()->json([
            'message' => 'Doctor data has been stored successfully',
            'doctor_data' => new DoctorResource($doctor)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function showById(int $id)
    {
        $doctor = DoctorService::showById($id);
        return response()->json([
            'doctor' => new DoctorResource($doctor)
        ], 200);
    }

    public function showByDocId(string $doc_id)
    {
        $doctor = DoctorService::showByDocId($doc_id);
        return response()->json([
            'doctor' => new DoctorResource($doctor)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorDataRequest $request)
    {
        $doctor = DoctorService::updateData($request);
        return response()->json([
            'message' => 'Data has been updated succefully',
            'doctor_data' => new DoctorResource($doctor)
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        DoctorService::destroy($id);
        return response()->json([
            'message' => 'Doctor data has been deleted'
        ], 200);
    }
}
