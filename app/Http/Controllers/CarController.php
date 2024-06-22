<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarCreateRequest;
use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use function Laravel\Prompts\search;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /* public function index(){
        
        $cars = Car::all();
        return view('cars', ['cars' => $cars]);
    } */

    public function index(Request $request)
    {
        $search = $request->input('search');
        $cars = Car::query();

        if ($search) {
            $cars->where('model', 'like', "%{$search}%")
                ->orWhereHas('manufacturer', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        }

        $cars = $cars->get();

        return view('cars.cars', ['cars' => $cars, 'search' => $search]);
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();

        return view('cars.create', ['manufacturers' => $manufacturers, 'success' => false]);
    }

    public function store(CarCreateRequest $request)
    {
        $car = new Car([
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'salesperson_email' => $request->input('salesperson_email'),
            'manufacturer_id' => $request->input('manufacturer_id'),
        ]);

        $car->save();

        $manufacturers = Manufacturer::all();

        return view('cars.create', ['manufacturers' => $manufacturers, 'success' => true]);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.show', ['car' => $car]);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);

        $manufacturers = Manufacturer::all();

        return view('cars.edit', ['car' => $car, 'manufacturers' => $manufacturers, 'success' => false]);
    }

    /* public function update(CarCreateRequest $request, $id)
    {
        $car = Car::findOrFail($id);

        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->salesperson_email = $request->input('salesperson_email');
        $car->manufacturer_id = $request->input('manufacturer_id');

        $car->save();

        $manufacturers = Manufacturer::all();

        return view('cars.cars', ['car' => $car, 'success' => true, 'manufacturers' => $manufacturers]);
        //return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    } */

    public function update(CarCreateRequest $request, $id)
    {
        $car = Car::findOrFail($id);

        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->salesperson_email = $request->input('salesperson_email');
        $car->manufacturer_id = $request->input('manufacturer_id');

        $car->save();

        $manufacturers = Manufacturer::all();

        return view('cars.edit', ['car' => $car, 'success' => true, 'manufacturers' => $manufacturers]);
    }

    public function delete(Car $car)
    {
        //$car = Car::findOrFail($id);
        $car->delete();

        //return redirect('/');
        return response()->noContent(); // returns 204
    }
}
