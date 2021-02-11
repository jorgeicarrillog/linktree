<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? "") }}">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Correo</label>
    <input type="email" class="form-control" name="email" id="email" {{(!empty($user))?'readonly=readonly':''}} value="{{ old('email', $user->email ?? "") }}">
</div>
