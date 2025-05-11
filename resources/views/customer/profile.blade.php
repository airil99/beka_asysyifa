@extends('layouts.app')

@section('content')
<div class="main-top">
    <h2>Profile</h2>
    <p>Update your personal information below.</p>
</div>

<div class="profile-container">
    <div class="card">
        <div class="card-content">
            <div class="card-info">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" 
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" 
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" 
                               value="{{ old('phone', $user->phone) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" 
                               value="{{ old('dob', $user->dob) }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-update">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Container Styling */
.profile-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.card {
    background-color: white; 
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 600px;
    padding: 30px;
}

.card-content {
    display: flex;
    flex-direction: column;
}

.card-info {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #00838f;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-top: 8px;
    box-sizing: border-box;
    background-color: #e0f7fa;
}

textarea {
    height: 100px;
    resize: none;
}

.form-actions {
    text-align: right;
    margin-top: 20px;
}

.btn-update {
    background-color: #00897b; 
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-update:hover {
    background-color: #00695c; 
}

/* Alert Messages */
.alert {
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.alert-success {
    background-color: #dff0d8;
    color: #3c763d;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}
</style>
@endsection
