<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\NotificationCollection;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::paginate();
        return ( new NotificationCollection($notifications))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        $notification = Notification::create($request->validated());
        return (new NotificationResource($notification))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        if (!$notification) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new NotificationResource($notification))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        if (!$notification) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $notification->update($request->validated());
        return ( new NotificationResource($notification))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        if (!$notification) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $notification->delete();
        if ($notification->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
