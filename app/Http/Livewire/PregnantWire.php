<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pregnant;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;

class PregnantWire extends Component
{
    use LivewireAlert;
    public $FirstName, $MiddleName, $LastName, $DOB, $Blood, $Urinalysis, $BloodPressure, $Height, $Weight, $Date, $forUpdate;
    public $searchTerm;
    public $list;
    public $file; // Added property for file upload
    public $progress; // Added property for progress tracking

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pregnants = $this->getPregnantList()->paginate(4);
        return view('livewire.pregnant-wire', compact('pregnants'));
    }

    public function delete($id)
    {
        $delete = Pregnant::where('id', $id)->delete();
        if($delete)
         $this->alert('success','Successfuly deleted!');
    }

    public function update($id)
    {
        $info = Pregnant::where('id', $id)->first();
        
        if(isset($info)){
            $this->sessionID = $id;
            $this->forUpdate = true;
            $this->FirstName = $info->FirstName;
            $this->MiddleName = $info->MiddleName;
            $this->LastName = $info->LastName;
            $this->DOB = $info->DOB;
            $this->Blood = $info->Blood;
            $this->Urinalysis = $info->Urinalysis;
            $this->BloodPressure = $info->BloodPressure;
            $this->Height = $info->Height;
            $this->Weight = $info->Weight;
            $this->Date = $info->Date;
        }
    }

    public function savePregnant()
    {
        $validate = $this->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'DOB' => 'required',
            'Blood' => 'required',
            'Urinalysis' => 'required',
            'BloodPressure' => 'required',
            'Height' => 'required',
            'Weight' => 'required',
            'Date' => 'required',
        ]);

        if($validate){
            if($this->forUpdate){
                $data = [
                    'FirstName' => $this->FirstName,
                    'MiddleName' => $this->MiddleName,
                    'LastName' => $this->LastName,
                    'DOB' => $this->DOB,
                    'Blood' => $this->Blood,
                    'Urinalysis' => $this->Urinalysis,
                    'BloodPressure' => $this->BloodPressure,
                    'Height' => $this->Height,
                    'Weight' => $this->Weight,
                    'Date' => $this->Date,
                ];

                $update = Pregnant::where('id', $this->sessionID)
                ->update($data);
                if($update){
                    $this->alert('success', $this->FirstName.''.$this->LastName.' has been updated',['toast' => false,'position' => 'center']);
                }

            }else{
                $pregnant = new Pregnant();
                $pregnant->PregnantNo = strtoupper(uniqid());
                $pregnant->FirstName = $this->FirstName;
                $pregnant->MiddleName = $this->MiddleName;
                $pregnant->LastName = $this->LastName;
                $pregnant->DOB = $this->DOB;
                $pregnant->Blood = $this->Blood;
                $pregnant->Urinalysis = $this->Urinalysis;
                $pregnant->BloodPressure = $this->BloodPressure;
                $pregnant->Height = $this->Height;
                $pregnant->Weight = $this->Weight;
                $pregnant->Date = $this->Date;
                $pregnant->save();

                $this->alert('success', $this->FirstName.''.$this->LastName.' has been added',['toast' => false,'position' => 'center']);
            }
            
            $this->reset([
            'FirstName',
            'MiddleName',
            'LastName',
            'DOB',
            'Blood',
            'Urinalysis',
            'BloodPressure',
            'Height',
            'Weight',
            'Date',
            ]);
        }
    }
    public function getPregnantList()
    {
        $query = Pregnant::query();

        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('FirstName', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('LastName', 'LIKE', '%' . $this->searchTerm . '%');
            });
        }

        return $query->orderBy('id', 'DESC');
    }

    public function updatedFile($file)
    {
        $this->validate([
            'file' => 'required|file|max:10240', // Adjust the maximum file size as needed
        ]);
    }

    public function upload()
    {
        $this->validate([
            'file' => 'required|file|max:10240', // Adjust the maximum file size as needed
        ]);

        $this->progress = 0;

        $path = $this->file->store('link'); // Adjust the storage path as needed

        // Get the absolute path of the uploaded file
        $absolutePath = Storage::path($path);

        // Perform your upload logic here
        // You can use the $path variable to save the file path in the database or perform any other operations

        // Simulating upload progress
        for ($i = 0; $i < 10; $i++) {
            sleep(1);
            $this->progress += 10;
            $this->emit('uploadProgress', $this->progress);
        }

        // Display the absolute path of the uploaded file
        $this->alert('success', 'File uploaded successfully! Path: ' . $absolutePath, ['toast' => false, 'position' => 'center']);
    }

    public function getListeners()
    {
        return [
            'uploadProgress' => 'updateProgress',
        ];
    }

    public function updateProgress($progress)
    {
        $this->progress = $progress;
    }
}
