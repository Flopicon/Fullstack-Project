<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return $addresses;
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'recipient_name' => 'required|string|max:255',
                'phone'          => 'required|string|max:20',
                'address_line'   => 'required|string',
                'city'           => 'required|string|max:100',
                'province'       => 'required|string|max:100',
                'postal_code'    => 'required|string|max:20',
                'is_default'     => 'boolean',
                'user_id'        => 'required|exists:users,id',
            ]);

            $address = Address::create($validate);
            return $address;
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        $address = Address::findOrFail($id);
        return $address;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'recipient_name' => 'sometimes|string|max:255',
            'phone'          => 'sometimes|string|max:20',
            'address_line'   => 'sometimes|string',
            'city'           => 'sometimes|string|max:100',
            'province'       => 'sometimes|string|max:100',
            'postal_code'    => 'sometimes|string|max:20',
            'is_default'     => 'sometimes|boolean',
            'user_id'        => 'sometimes|exists:users,id',
        ]);

        $address = Address::findOrFail($id);
        $address->update($validate);
        return $address;
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id)->delete();
    }
}
