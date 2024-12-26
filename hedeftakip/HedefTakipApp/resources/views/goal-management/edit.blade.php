<div>
    <label for="kategori_id">Kategori Seçin:</label>
    <select name="kategori_id" id="kategori_id" class="form-control">
        <option value="">Kategori Seç</option>
        @foreach($kategoriler as $kategori)
            <option value="{{ $kategori->id }}" {{ isset($hedef) && $hedef->kategori_id == $kategori->id ? 'selected' : '' }}>
                {{ $kategori->ad }}
            </option>
        @endforeach
    </select>
</div>
