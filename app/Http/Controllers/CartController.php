<?php

namespace App\Http\Controllers;

use App\Models\data_alat;
use Illuminate\Http\Request;

class CartController extends Controller
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


    public function dataalatCart()
    {
        return view('mahasiswa.cart');
    }

    public function dataalatCartDosen()
    {
        return view('dosen.cartDosen');
    }

    public function addtoCart(Request $request, $id)
    {
        $data_alat = data_alat::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // Cek apakah jumlah item dalam keranjang kurang dari 5
        if(count($cart) < 5) {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "nama_alat" => $data_alat->nama_alat,
                    "id_alat" => $data_alat->id,
                    "stok" => $data_alat->stok,
                    "quantity" => 1,
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Alat has been added to cart!');
        } else {
            return redirect()->back()->with('error', 'Sorry, you can only add up to 5 items in the cart.');
        }
    }

    public function addtoCartDosen(Request $request, $id)
    {
        $data_alat = data_alat::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // Cek apakah jumlah item dalam keranjang kurang dari 5
        if(count($cart) < 5) {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "nama_alat" => $data_alat->nama_alat,
                    "id_alat" => $data_alat->id,
                    "stok" => $data_alat->stok,
                    "quantity" => 1,
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Alat has been added to cart!');
        } else {
            return redirect()->back()->with('error', 'Sorry, you can only add up to 5 items in the cart.');
        }
    }
    

    public function deleteCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }

    public function deleteCartDosen(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('id');
        $selectedQuantity = $request->input('quantity');
    
        // Lakukan logika untuk mengubah quantity berdasarkan productId
        // Contoh:
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $selectedQuantity;
        }
        session()->put('cart', $cart);
    
        // Berikan respon sesuai kebutuhan Anda
        return response()->json(['success' => true]);
    }

    public function updateCartDosen(Request $request)
    {
        $productId = $request->input('id');
        $selectedQuantity = $request->input('quantity');
    
        // Lakukan logika untuk mengubah quantity berdasarkan productId
        // Contoh:
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $selectedQuantity;
        }
        session()->put('cart', $cart);
    
        // Berikan respon sesuai kebutuhan Anda
        return response()->json(['success' => true]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
