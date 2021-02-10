<div class="mb-3">
    <label for="type" class="form-label">Red Social</label>
    <select name="type" id="type" class="form-control">
        <option value="">-- seleccionar --</option>
        <option {{ ("instagram"==old('label', $socialNetwork->type ?? ""))?'selected':'' }} value="instagram">Instagram</option>
        <option {{ ("youtube"==old('label', $socialNetwork->type ?? ""))?'selected':'' }} value="youtube">Youtube</option>
        <option {{ ("linkedin"==old('label', $socialNetwork->type ?? ""))?'selected':'' }} value="linkedin">Linkedin</option>
        <option {{ ("github"==old('label', $socialNetwork->type ?? ""))?'selected':'' }} value="github">Github</option>
        <option {{ ("facebook"==old('label', $socialNetwork->type ?? ""))?'selected':'' }} value="facebook">Facebook</option>
    </select>
</div>
<div class="mb-3">
    <label for="url" class="form-label">Enlace</label>
    <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $socialNetwork->url ?? "") }}">
</div>  
