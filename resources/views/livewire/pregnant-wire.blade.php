
<div>
<div class="card-body">
    <h5>Add New Pregnant Form</h5>
    <form wire:submit.prevent="savePregnant">
        <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">First Name</div>
                        <input type="" wire:model="FirstName" class="form-control">
                        @error('FirstName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-label">Middle Name</div>
                        <input type="" wire:model="MiddleName" class="form-control">
                        @error('MiddleName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Last Name</div>
                        <input type="" wire:model="LastName" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-label">Date of Birth</div>
                        <input type="date" wire:model="DOB" class="form-control">
                        @error('DOB')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Blood</div>
                        <input type="" wire:model="Blood" class="form-control">
                                    @error('Blood')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Urinalysis</div>
                        <input type="" wire:model="Urinalysis" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Blood Pressure</div>
                        <input type="" wire:model="BloodPressure" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Height</div>
                        <input type="" wire:model="Height" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Weight</div>
                        <input type="" wire:model="Weight" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Date</div>
                        <input type="date" wire:model="Date" class="form-control">
                        @error('DOB')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    @if($forUpdate)
                    <button class="btn btn-outline-info m-2">Update</button>
                    @else
                     <button class="btn btn-outline-primary m-2">Save</button>
                    @endif
                    </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                 <i class="fas fa-table me-1"></i>
                Pregnant List
            </div>
            <div>
                <input type="text" wire:model="searchTerm" placeholder="Search..." class="form-control">
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Blood</th>
            <th>Urinalysis</th>
            <th>Blood Pressure</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Date</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pregnants as $pregnant)
                    <tr>
                        <td>{{ $pregnant->FirstName }}</td>
                        <td>{{ $pregnant->MiddleName }}</td>
                        <td>{{ $pregnant->LastName }}</td>
                        <td>{{ $pregnant->DOB }}</td>
                        <td>{{ $pregnant->Blood }}</td>
                        <td>{{ $pregnant->Urinalysis }}</td>
                        <td>{{ $pregnant->BloodPressure }}</td>
                        <td>{{ $pregnant->Height }}</td>
                        <td>{{ $pregnant->Weight }}</td>
                        <td>{{ $pregnant->Date }}</td>
                        <td>
                            <button class="btn btn-outline-info m-2"
                             wire:click="update('{{ $pregnant->id }}')">
                            Edit</button>

                            <button class="btn btn-outline-primary m-2"
                            wire:click="delete('{{ $pregnant->id }}')">
                            Remove</button>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    {{ $pregnants->links() }}
    </div>
    </hr>
    
</div>

<div>
    <form wire:submit.prevent="upload" enctype="multipart/form-data">
        <div>
            <input type="file" wire:model="file" id="file-input">
            <button wire:click="upload" class="btn btn-primary">Upload</button>
            <div wire:loading wire:target="upload">Uploading...</div>
            <div wire:loading wire:target="upload" wire:poll="upload" class="mt-2">
                <progress max="100" wire:model="progress"></progress>
                {{ $progress }}% Uploaded
            </div>
            @error('file')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </form>
</div>