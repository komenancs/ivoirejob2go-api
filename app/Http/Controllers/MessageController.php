<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate();
        return ( new MessageCollection($messages))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $message = Message::create($request->validated());
        return (new MessageResource($message))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        if (!$message) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        return ( new MessageResource($message))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, Message $message)
    {
        if (!$message) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $message->update($request->validated());
        return ( new MessageResource($message))->additional($this->getResponseTemplate(Response::HTTP_OK, "Modifié"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        if (!$message) {
            return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément correspondant.");
        }
        $message->delete();
        if ($message->trashed()) {
            return $this->getSuccessResponse(null, Response::HTTP_OK, "Suppression effectuée.");
        } else {
            return $this->getErrorResponse(Response::HTTP_NOT_MODIFIED, "Aucun élément supprimé.");
        }
    }
}
