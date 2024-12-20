<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        
        return view('backend.index',compact('user'));
    }
        public function exportdata(){
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();

                $sheet->setCellValue('A1','Id');
                $sheet->setCellValue('B1','site');
                $sheet->setCellValue('C1','reference');
                $sheet->setCellValue('D1','user');
                $sheet->setCellValue('E1','payment');
                $sheet->setCellValue('F1','paymenttype');
                $sheet->setCellValue('G1','date');
                $sheet->setCellValue('H1','description');
                $sheet->setCellValue('I1','amount');
                $data = User::all();

                $row = 5;
                foreach ($data as $item) {
                    $sheet->setCellValue('A' . $row, $item->id);
                    $sheet->setCellValue('B' . $row, $item->site);
                    $sheet->setCellValue('C' . $row, $item->reference);
                    $sheet->setCellValue('B' . $row, $item->user);
                    $sheet->setCellValue('D' . $row, $item->payment);
                    $sheet->setCellValue('E' . $row, $item->paymettype);
                    $sheet->setCellValue('F' . $row, $item->date);
                    $sheet->setCellValue('G' . $row, $item->description);
                    $sheet->setCellValue('H' . $row, $item->amount);
                    $row++;
                }

                $writer = new Xlsx($spreadsheet);
    $fileName = 'User_Data.xlsx';
    $filePath = storage_path($fileName);

    // Save to storage and return file as download
    $writer->save($filePath);

    return response()->download($filePath)->deleteFileAfterSend(true);
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
       $data = $request->validate([
            'site' => 'required|max:20',
            'reference' => 'required|max:20',
            'user' => 'required|max:20',
            'payment' => 'required|max:20',
            'paymenttype' => 'required|max:20',
            'date' => 'required|max:20',
            'description' => 'required|max:20',
            'amount' => 'required|max:20',
        ]);
        // dd($data);
        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // dd($user);
         return view('backend.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
      $data =  $request->validate([
            'site' => 'required|max:20',
            'reference' => 'required|max:20',
            'user' => 'required|max:20',
            'payment' => 'required|max:20',
            'paymenttype' => 'required|max:20',
            'date' => 'required|max:20',
            'description' => 'required|max:20',
            'amount' => 'required|max:20',
        ]);
        $user->update($data);
        // dd($user);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
