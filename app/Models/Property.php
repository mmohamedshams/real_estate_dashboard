<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
}
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() {
        return Property::all();
    }

    public function store(Request $request) {
        $property = new Property();
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->location = $request->location;
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $property->image = $imagePath;
        }
        $property->save();
        return response()->json($property, 201);
    }

    public function show($id) {
        return Property::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $property = Property::findOrFail($id);
        $property->update($request->all());
        return response()->json($property, 200);
    }

    public function destroy($id) {
        $property = Property::findOrFail($id);
        $property->delete();
        return response()->json(null, 204);
    }
}
